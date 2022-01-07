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
		$stmt->bind_param('sssssi', $email, $name, $username, $password, $type, $phone);

		return $stmt->execute();
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

	// ritorna tutte le notifiche di un cliente ordinate per data.
	public function getClientNotifications($email){
		$query = "SELECT data, email, tipo, ordine FROM notifiche_cliente WHERE email = ? ORDER BY data DESC";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	// Cambia password di un utente
	public function updateUserPassword($email, $password){
		$query = "UPDATE users SET password = ? WHERE email = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('ss', $password, $email);

		$dt = date('Y-m-d H:i:s');
		$tipo = "password";
		$order = 0;

		$notifquery = "INSERT INTO notifiche_cliente(data, email, tipo, ordine) VALUES(?, ?, ?, ?)";
		$stmtnot = $this->db->prepare($notifquery);
		$stmtnot->bind_param('sssi', $dt, $email, $tipo, $order);
		$stmtnot->execute();

		return $stmt->execute();
	}

	// Aggiorna i vari dati passati, se vuoti i dati rimangono invariati.
	// ATTENZIONE: prima di chiamare questa funzione è necessario che la nuova email non sia gia occupata!
	public function updateUserData($old_email, $email, $name, $username, $phone, $type){
		$prev = $this->getUser($old_email);

		$email = empty($email) ? $prev->email : $email;
		$name = empty($name) ? $prev->name : $name;
		$username = empty($username) ? $prev->username : $username;
		$phone = empty($phone) ? $prev->phone : $phone;
		$type = empty($type) ? $prev->type : $type;

		$query = "UPDATE users SET email = ?, name = ?, username = ?, phone = ?, type = ? WHERE email = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('sssiss', $email, $name, $username, $phone, $type, $old_email);

		return $stmt->execute();
	}
	
	public function loginCheck($email, $password){
	    $query = "SELECT name, username, type FROM users WHERE email = ? AND password = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('ss', $email, $password);
		$stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_object();
	}	

	public function insertProduct($nome, $venditore, $prezzo, $tipo, $quantità, $breve_descrizione, $descrizione){
		$query = "INSERT INTO prodotti(nome, venditore, prezzo, tipo, quantita, breve_descrizione, descrizione)
		VALUES (?, ?, ?, ?, ?, ?, ?)";		
  		$stmt = $this->db->prepare($query);
 		$stmt->bind_param('ssdsiss', $nome, $venditore, $prezzo, $tipo, $quantità, $breve_descrizione, $descrizione);

  		return $stmt->execute();
	}	

	public function getProductsBySeller($venditore){
		$query = "SELECT nome, venditore, prezzo, breve_descrizione FROM prodotti WHERE venditore = ? ORDER BY nome";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('s', $venditore);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getUser($email){
		$query = "SELECT email, name, username, type, phone FROM users WHERE email = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_object();
	}

	public function doOrder($cliente, $venditore, $nome, $prezzo, $quantità, $status){
		$query = "INSERT INTO ordine(cliente, venditore, nome, prezzo, quantita, status)
		VALUES (?, ?, ?, ?, ?, ?)";		
  		$stmt = $this->db->prepare($query);
 		$stmt->bind_param('sssdis', $cliente, $venditore, $nome, $prezzo, $quantità, $status);

  		return $stmt->execute();
	}	

	/* da mettere $amount per prendere una quantità precisa di prodotti */
	public function getProducts(){
		$query = "SELECT nome, venditore, prezzo, breve_descrizione FROM prodotti ORDER BY nome";
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);
	}


	public function getProductsCart($cliente, $status){
		$query = "SELECT nome, prezzo, quantita FROM ordine WHERE cliente = ? AND status = ? ";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('ss', $cliente, $status);
		$stmt->execute();
		$result = $stmt->get_result();		

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function searchProduct($nome, $venditore){
	    $query = "SELECT * FROM prodotti WHERE nome = ? AND venditore = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('ss', $nome, $venditore);
		$stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_object();
	}	
}
?>