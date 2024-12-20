<?php
session_start();

// Data pengguna statik
$users = [
    1 => [
        'username' => 'admin',
        'password' => 'admin123' // Simpan dalam plaintext hanya untuk contoh ini
    ]
];

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function is_admin() {
    return is_logged_in() && $_SESSION['user_id'] == 1;
}
?>