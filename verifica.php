<?php
session_start();
if(!isset($_SESSION['codigocliente'])){
	header("Location: login.php");
}