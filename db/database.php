<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if($this->db->connect_error){
            die("Connesione fallita al db");
        }
    }
	
	public function insertUser($email, $name, $username, $password, $type, $phone){
		$query = "INSERT INTO users(email, name, username, password, type,  phone)
			  VALUES (?, ?, ?, ?, ?, ?)";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('ssssss', $email, $name, $username, $password, $type, $phone);

		return $stmt->execute();
	}

	// inserisce notifica creazione account
	public function insertNotificationNewUser($email, $type){
		$dt = date('Y-m-d H:i:s');
		$tipo = "create";
		$status = "new";

		if($type == "cliente"){	
			$data_acquisto = NULL;	
			$id = NULL;		
			$notifquery = "INSERT INTO notifiche_cliente(data, email, tipo, data_acquisto, status, order_id) VALUES(?, ?, ?, ?, ?, ?)";
			$stmtnot = $this->db->prepare($notifquery);
			$stmtnot->bind_param('sssssi', $dt, $email, $tipo, $data_acquisto, $status, $id);

			return $stmtnot->execute();
		}else{
			$prod = NULL; 
			$quantita = NULL;
			$cliente = NULL;
			$notifquery = "INSERT INTO notifiche_venditore(data, email, tipo, status, nome_prod, quantita, cliente) VALUES(?, ?, ?, ?, ?, ?, ?)";
			$stmtnot = $this->db->prepare($notifquery);
			$stmtnot->bind_param('sssssss', $dt, $email, $tipo, $status, $prod, $quantita, $cliente);

			return $stmtnot->execute();
		}

		return true;
	}

	// inserisce la notifica dopo che un cliente acquista un ordine/più ordini.
	public function insertNotificationPurchase($data, $email){
		$tipo = "acquisto";
		$data_acquisto = $data;
		$status = "new";			
		$id = NULL;

		$notifquery = "INSERT INTO notifiche_cliente(data, email, tipo, data_acquisto, status, order_id) VALUES(?, ?, ?, ?, ?, ?)";
		$stmtnot = $this->db->prepare($notifquery);
		$stmtnot->bind_param('sssssi', $data, $email, $tipo, $data_acquisto, $status, $id);

		return $stmtnot->execute();
	}

	// ritorna la password id un utente.
	public function getUserPassword($email){
		$query = "SELECT password, email FROM users WHERE email = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('s', $email);
		$stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_object();
	}

	// ritorna tutte le notifiche di un utente ordinate per data.
	public function getNotifications($email){		
		$user_data = $this->getUser($email);

		if($user_data->type == "cliente"){
			$query = "SELECT data, email, tipo, data_acquisto, status, order_id FROM notifiche_cliente WHERE email = ? ORDER BY data DESC";
		}else{
			$query = "SELECT data, email, tipo, status, nome_prod, quantita, cliente FROM notifiche_venditore WHERE email = ? ORDER BY data DESC";
		}
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$result = $stmt->get_result();

		// update to read all new since user load the notifications
		$new_status = "read";
		$old_status = "new";
		if($user_data->type == "cliente"){
			$query = "UPDATE notifiche_cliente SET status = ? WHERE email = ? AND status = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param('sss', $new_status, $email, $old_status);
		}else{
			$query = "UPDATE notifiche_venditore SET status = ? WHERE email = ? AND status = ?";
			$stmt = $this->db->prepare($query);
			$stmt->bind_param('sss', $new_status, $email, $old_status);
		}
		$stmt->execute();

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	// ritorta il numero di email non lette da un utente.
	public function getNewNotificationsAmount($email){
		$user_data = $this->getUser($email);

		if($user_data->type == "cliente"){
			$query = "SELECT COUNT(status) as amount FROM notifiche_cliente WHERE email = ? AND status = ?";
		}else{
			$query = "SELECT COUNT(status) as amount FROM notifiche_venditore WHERE email = ? AND status = ?";
		}
		$new_status = "new";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('ss', $email, $new_status);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_object();
	}

	// Cambia password di un utente
	public function updateUserPassword($email, $password){
		$query = "UPDATE users SET password = ? WHERE email = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('ss', $password, $email);

		$user_data = $this->getUser($email);
		$dt = date('Y-m-d H:i:s');
		$tipo = "password";
		$status = "new";

		/* notifica */
		if($user_data->type == "cliente"){
			$data_acquisto = NULL;
			$id = NULL;
			$notifquery = "INSERT INTO notifiche_cliente(data, email, tipo, data_acquisto, status, order_id) VALUES(?, ?, ?, ?, ?, ?)";
			$stmtnot = $this->db->prepare($notifquery);
			$stmtnot->bind_param('sssssi', $dt, $email, $tipo, $data_acquisto, $status, $id);
			$stmtnot->execute();
		}else{
			$prod = NULL; 
			$quantita = NULL;
			$cliente = NULL;
			$notifquery = "INSERT INTO notifiche_venditore(data, email, tipo, status, nome_prod, quantita, cliente) VALUES(?, ?, ?, ?, ?, ?, ?)";
			$stmtnot = $this->db->prepare($notifquery);
			$stmtnot->bind_param('sssssss', $dt, $email, $tipo, $status, $prod, $quantita, $cliente);
			$stmtnot->execute();
		}

		return $stmt->execute();
	}

	// Aggiorna i vari dati passati, se vuoti i dati rimangono invariati.
	// ATTENZIONE: prima di chiamare questa funzione è necessario che la nuova email non sia gia occupata!
	public function updateUserData($old_email, $email, $name, $username, $phone){
		$prev = $this->getUser($old_email);

		$email = empty($email) ? $prev->email : $email;
		$name = empty($name) ? $prev->name : $name;
		$username = empty($username) ? $prev->username : $username;
		$phone = empty($phone) ? $prev->phone : $phone;

		$query = "UPDATE users SET email = ?, name = ?, username = ?, phone = ? WHERE email = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('sssss', $email, $name, $username, $phone, $old_email);

		$dt = date('Y-m-d H:i:s');
		$tipo = "dati";
		$status = "new";

		if($prev->type == "cliente"){
			$data_acquisto = NULL;
			$id = NULL;
			$notifquery = "INSERT INTO notifiche_cliente(data, email, tipo, data_acquisto, status, order_id) VALUES(?, ?, ?, ?, ?, ?)";
			$stmtnot = $this->db->prepare($notifquery);
			$stmtnot->bind_param('sssssi', $dt, $email, $tipo, $data_acquisto, $status, $id);
			$stmtnot->execute();
		}else{
			$prod = NULL; 
			$quantita = NULL;
			$cliente = NULL;
			$notifquery = "INSERT INTO notifiche_venditore(data, email, tipo, status, nome_prod, quantita, cliente) VALUES(?, ?, ?, ?, ?, ?, ?)";
			$stmtnot = $this->db->prepare($notifquery);
			$stmtnot->bind_param('sssssss', $dt, $email, $tipo, $status, $prod, $quantita, $cliente);
			$stmtnot->execute();
		}

		return $stmt->execute();
	}
	
	// Ritorna tutti gli acuisti di un utente, con data di effettuazione di ogni acquisto
	public function getUserPurchases($email){
		$query = "SELECT a.data, o.id, o.venditore, o.nome, o.prezzo, o.quantita FROM ordine as o, acquisto as a WHERE a.id = o.id AND o.cliente = ? GROUP BY o.id";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('s', $email);
		$stmt->execute();
        $result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function insertProduct($nome, $venditore, $prezzo, $tipo, $quantità, $breve_descrizione, $descrizione, $immagine){
		$query = "INSERT INTO prodotti(nome, venditore, prezzo, tipo, quantita, breve_descrizione, descrizione, immagine)
		VALUES (?, ?, ?, ?, ?, ?, ?, ?)";		
  		$stmt = $this->db->prepare($query);
 		$stmt->bind_param('ssdsisss', $nome, $venditore, $prezzo, $tipo, $quantità, $breve_descrizione, $descrizione, $immagine);

		// notifica venditore
		$data = date('Y-m-d H:i:s');
		$type = "aggiunto";
		$status = "new";
		$cliente = NULL;
		$query = "INSERT INTO notifiche_venditore(data, email, tipo, status, nome_prod, quantita, cliente) VALUES(?, ?, ?, ?, ?, ?, ?)";
		$notstmt = $this->db->prepare($query);
 		$notstmt->bind_param('sssssss', $data, $venditore, $type, $status, $nome, $quantità, $cliente);
		$notstmt->execute();

  		return $stmt->execute();
	}	

	public function getProductsBySeller($venditore){
		$query = "SELECT nome, venditore, prezzo, breve_descrizione, immagine FROM prodotti WHERE venditore = ? ORDER BY nome";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('s', $venditore);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getUser($email){
		$query = "SELECT email, password, name, username, type, phone FROM users WHERE email = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_object();
	}

	public function isInCart($cliente, $venditore, $nome){
		$status = "cart";
		$query = "SELECT * FROM ordine WHERE cliente = ? AND venditore = ? AND nome = ? AND status = ? ";	
  		$stmt = $this->db->prepare($query);
 		$stmt->bind_param('ssss', $cliente, $venditore, $nome, $status);
		$stmt->execute();
		$result = $stmt->get_result();
 
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	

	public function doOrder($cliente, $venditore, $nome, $prezzo, $quantità, $status){
		$query = "INSERT INTO ordine(cliente, venditore, nome, prezzo, quantita, status)
		VALUES (?, ?, ?, ?, ?, ?)";		
  		$stmt = $this->db->prepare($query);
 		$stmt->bind_param('sssdis', $cliente, $venditore, $nome, $prezzo, $quantità, $status);

  		return $stmt->execute();
	}	

	public function getProducts(){
		$query = "SELECT nome, venditore, prezzo, breve_descrizione, immagine FROM prodotti ORDER BY nome";
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function updateQuantity($nome, $venditore, $quantita){
		$query = "UPDATE prodotti SET quantita = ? WHERE nome = ? AND venditore = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('iss', $quantita, $nome, $venditore);

		return $stmt->execute();
	}

	public function getProductsCart($cliente, $status){
		$query = "SELECT o.id, o.nome, o.prezzo, o.quantita, o.venditore, p.immagine FROM ordine as o, prodotti as p WHERE o.nome = p.nome AND cliente = ? AND status = ? GROUP BY o.id";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('ss', $cliente, $status);
		$stmt->execute();
		$result = $stmt->get_result();		

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function updateCartQuantity($nome, $venditore, $quantita, $cliente){
		$query = "UPDATE ordine SET quantita = ? WHERE nome = ?  AND venditore = ? AND cliente = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('isss', $quantita, $nome, $venditore, $cliente);

		return $stmt->execute();
	}

	public function getMaxQuantity($nome, $venditore){
		$query = "SELECT quantita FROM prodotti WHERE nome = ? AND venditore = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('ss', $nome, $venditore);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function removeToCart($cliente, $venditore, $nome, $status){
		$query = "DELETE FROM ordine WHERE cliente = ? AND venditore = ? AND nome = ? AND status = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('ssss', $cliente, $venditore, $nome, $status);

		return $stmt->execute();
	}

	public function searchProduct($nome, $venditore){
	    $query = "SELECT * FROM prodotti WHERE nome = ? AND venditore = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('ss', $nome, $venditore);
		$stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_object();
	}	

	public function buyingProduct($id, $data){
		$status = "da_spedire";
	    $query = "INSERT INTO acquisto(id, data, status)
		VALUES (?, ?, ?)";	
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('iss', $id, $data, $status);

		return $stmt->execute();
	}	

	// notifica il venditore di aver venduto 1 prodotto, a chi e quanti
	public function notifyVendorBoughtProd($nome, $venditore, $data, $quantita, $cliente){
		$tipo = "venduto";
		$status = "new";
		$query = "INSERT INTO notifiche_venditore(data, email, tipo, status, nome_prod, quantita, cliente) VALUES(?, ?, ?, ?, ?, ?, ?)";
		$notstmt = $this->db->prepare($query);
 		$notstmt->bind_param('sssssss', $data, $venditore, $tipo, $status, $nome, $quantita, $cliente);

		return $notstmt->execute();
	}

	// notifica il venditore che il prodotto passato è esaurito.
	public function notifyVendorOutOfStock($nome, $venditore, $data){
		$tipo = "esaurito";
		$status = "new";
		$quantita = NULL;
		$cliente = NULL;
		$query = "INSERT INTO notifiche_venditore(data, email, tipo, status, nome_prod, quantita, cliente) VALUES(?, ?, ?, ?, ?, ?, ?)";
		$notstmt = $this->db->prepare($query);
 		$notstmt->bind_param('sssssss', $data, $venditore, $tipo, $status, $nome, $quantita, $cliente);

		return $notstmt->execute();
	}

	public function updateOrderStatus($id){
		$status = "acquistato";
		$query = "UPDATE ordine SET status = ? WHERE id = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('si', $status, $id);

		return $stmt->execute();
	}

	public function getSellerOrder($venditore){
		$query = "SELECT o.nome, o.cliente, o.quantita, a.data, a.status, o.id FROM ordine as o, acquisto as a WHERE o.id = a.id AND venditore = ? GROUP BY o.id ORDER BY a.data";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('s', $venditore);
		$stmt->execute();
		$result = $stmt->get_result();		

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getClientOrders($cliente){
		$query = "SELECT o.cliente, o.venditore, o.nome, o.prezzo, o.quantita, o.status, p.immagine, a.data FROM ordine as o, prodotti as p, acquisto as a WHERE o.nome = p.nome 
		AND o.venditore = p.venditore AND o.id = a.id AND o.cliente = ? GROUP BY o.id ORDER BY a.data DESC";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('s', $cliente);
		$stmt->execute();
		$result = $stmt->get_result();		

		return $result->fetch_all(MYSQLI_ASSOC);
	}


	public function getUserFromPurchase($id, $data){
		$query = "SELECT a.id, a.data, o.cliente FROM acquisto as a, ordine as o WHERE o.id = a.id AND a.id = ? AND a.data = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('ss', $id, $data);
		$stmt->execute();
		$result = $stmt->get_result();		

		return $result->fetch_object();
	}

	public function updateBuyingStatus($data, $id, $status){
		$query = "UPDATE acquisto SET status = ? WHERE data = ?  AND id = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('ssi', $status, $data, $id);

		//notifica cliente aggiornamento status 
		$user = $this->getUserFromPurchase($id, $data);
		$notif_status = "new";
		$data_notifica = date("Y-m-d H:i");
		$notifquery = "INSERT INTO notifiche_cliente(data, email, tipo, data_acquisto, status, order_id) VALUES(?, ?, ?, ?, ?, ?)";
		$stmtnot = $this->db->prepare($notifquery);
		$stmtnot->bind_param('sssssi', $data_notifica, $user->cliente, $status, $data, $notif_status, $id);
		$stmtnot->execute();

		return $stmt->execute();
	}
}
?>