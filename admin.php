<?php
require 'config.php';

if (!is_admin()) {
    die('Akses ditolak');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_user'])) {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($username && $password) {
            $users[] = [
                'username' => $username,
                'password' => $password
            ];
            $message = 'Pengguna berhasil ditambahkan';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <h1>Admin Panel</h1>
    <h2>Tambah Pengguna</h2>
    <form method="POST" action="">
        <label>Username:</label><br>
        <input type="text" name="username" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br>
        <button type="submit" name="add_user">Tambah</button>
    </form>
    <?php if (isset($message)): ?>
        <p style="color:green;"><?= $message ?></p>
    <?php endif; ?>

    <h2>Daftar Pengguna</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
        </tr>
        <?php foreach ($users as $id => $user): ?>
            <tr>
                <td><?= $id ?></td>
                <td><?= $user['username'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>