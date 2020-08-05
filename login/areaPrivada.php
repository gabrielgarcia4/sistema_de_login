<?php
session_start();
if(!isset($_SESSION['id_usuario']))
{
    header("location: sistemaDeLogin.php");
    exit;
}

?>
seja bem vindo
<a href="sair.php"> Sair</a>