<?php
require 'config.php';
session_destroy();
header('Location: beranda.php');
exit;
?>