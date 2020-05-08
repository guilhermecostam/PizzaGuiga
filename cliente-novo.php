<?php
include("config.php");
include("verifica.php");
if(isset($_POST['nome'])){	
	$nome=$_POST['nome'];
	$mesa=$_POST['mesa'];
	$usuario=$_POST['usuario'];
	$senha=$_POST['senha'];
	$consulta=$MySQLi->query("insert into TB_CLIENTES (CLI_NOME, CLI_MESA, CLI_USUARIO, CLI_SENHA)
	values('$nome','$mesa','$usuario', $senha)");
	header("Location:cliente.php");
}

?>
<?php include("design_cabecalho.php"); ?>
	<h3>Clientes</h3>

	<form action="?" method="POST">
    			Nome do cliente:<input type="text"   id="input1" class="form-control" name="nome">
 
    			Mesa:<input type="text"  id="input2" class="form-control" name="mesa">

    			Nome de usuario:<input type="text"  id="input3" class="form-control" name="usuario">

    			Senha:<input type="text"  id="input4" class="form-control" name="senha">

  			  <input type="submit" value="Inserir!" class="btn btn-primary">

  	</form>
    <?php include("design_rodape.php"); ?>