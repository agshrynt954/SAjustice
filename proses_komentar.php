<?php
include 'database.php';
class komentar {
private $db;
public function __construct() {
$this->db = new Database();
}
// CREATE
public function tambahkomentar($id, $pesan, $no_telephone, $nama, $email) {
$sql = "INSERT INTO komentar (id, pesan, no_telephone, nama, email)
VALUES ('$id', '$pesan', '$no_telephone', '$nama', $$email)";
return $this->db->conn->query($sql);
}
// READ
public function tampilkomentar() {
$sql = "SELECT * FROM komentar";
return $this->db->conn->query($sql);
}
// UPDATE
public function editMahasiswa($id, $pesan, $no_telephone, $nama, $email) {
$sql = "UPDATE komentar SET
pesan='$pesan',
no_telephone ='$no_telephone',
nama ='$nama',
email ='$email',
WHERE id='$id'";
return $this->db->conn->query($sql);
}
// DELETE
public function hapusMahasiswa($id) {
$sql = "DELETE FROM komentar WHERE id ='$id'";
return $this->db->conn->query($sql);
}
}
?>