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
}
?>