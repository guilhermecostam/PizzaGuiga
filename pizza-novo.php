<?php
include("config.php");
include("verifica.php");

if(isset($_POST['sabor'])){	
	$sabor=$_POST['sabor'];
	$tamanho=$_POST['tamanho'];
	$preco=$_POST['preco'];
	$consulta=$MySQLi->query("insert into TB_PIZZAS (PIZ_SABOR,PIZ_TAMANHO,PIZ_PRECO)
	values('$sabor','$tamanho',$preco)");
	header("Location:pizza.php");
}

?>

  <?php include("design_cabecalho.php"); ?>
	<h3>Pizzas</h3>

	<form action="?" method="POST">
    			Sabor da Pizza:<input type="text"   id="input1" name="sabor" class="form-control">
          
          Tamanho da Pizza:<input type="text"  id="input2" name="tamanho" class="form-control">
  			  
          Preço da Pizza:<input type="text"  id="input3" name="preco" class="form-control">

  			<input type="submit" value="Inserir!" class="btn btn-primary">

  	</form>
    <?php include("design_rodape.php"); ?>