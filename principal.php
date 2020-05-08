<?php
include("config.php"); 
$consulta = $MySQLi->query("SELECT 
	* FROM TB_CLIENTES");
$resultado = $consulta->fetch_assoc();
?>
<?php include("design_cabecalho.php"); ?>
<h1>Bem-vindo, 
 <?PHP echo $resultado['CLI_NOME']; ?>
 </h1>
<?php include("design_rodape.php"); ?>