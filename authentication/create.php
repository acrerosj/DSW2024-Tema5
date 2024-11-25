<?php
require 'control.php';
control(3);
require 'connection.php';

if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['level'])) {
  try {
    $stmtCreate = $link->prepare('INSERT INTO users (username, password, name, level) VALUES (:username, :pw, :name, :level)');
    $stmtCreate->bindParam(':username', $_POST['username']);
    $encryp_pw = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmtCreate->bindParam(':pw', $encryp_pw);
    $stmtCreate->bindParam(':name', $_POST['name']);
    $stmtCreate->bindParam(':level', $_POST['level']);
    $stmtCreate->execute();
  } catch (PDOException $e)  {
    die ('Error al crear el usuario: ' . $e->getMessage());
  }
} else {
  die ('Error en los datos');
}