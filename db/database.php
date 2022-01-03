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

	/* da mettere $amount per prendere una quantità precisa di prodotti */
	public function getProducts(){
		$query = "SELECT nome, venditore, prezzo, breve_descrizione FROM prodotti ORDER BY nome";
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);
	}
}
?>