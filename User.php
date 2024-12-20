<?php
include_once 'pendaftaran/database.php';
class User {
private $db;
public function __construct() {
$this->db = new Database();
}
// Login user
public function login($username, $password) {
$query = "SELECT * FROM users WHERE username = '$username'";
$result = $this->db->conn->query($query);
if ($result->num_rows > 0) {
$user = $result->fetch_assoc();
if (password_verify($password, $user['password'])) {
return $user;
} else {
return false;
}
} else {
return false;
}
}
// Register user baru
public function register($username, $password, $role) {
$passwordHash = password_hash($password, PASSWORD_BCRYPT);
$query = "INSERT INTO users (username, password, role) VALUES
('$username', '$passwordHash', '$role')";
return $this->db->conn->query($query);
}
}
?>
