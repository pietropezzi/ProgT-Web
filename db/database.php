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
	    $query = "SELECT name FROM users WHERE email = ? AND password = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param('ss', $email, $password);
		$stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
	}
}
?>