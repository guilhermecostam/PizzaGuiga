<?php
include("config.php");
include("verifica.php");

$codigo = $_GET['codigo'];

if(isset($_POST['preco'])) {
 $preco = $_POST['preco'];
 $sabor = $_POST['sabor'];
 $codigopizza = $_POST['codigopizza'];
 $tamanho = $_POST['tamanho'];
 
 $consulta = $MySQLi->query("UPDATE TB_PIZZAS set PIZ_SABOR = '$sabor', PIZ_TAMANHO = '$tamanho', PIZ_PRECO='$preco'
 where PIZ_CODIGO = $codigopizza");
 header("Location:pizza.php");
}
$consulta3 = $MySQLi->query("SELECT * FROM TB_PIZZAS WHERE PIZ_CODIGO = $codigo");
$resultado3 = $consulta3->fetch_assoc();
?>

  <?php include("design_cabecalho.php"); ?>
	<h3>Pizza</h3>
 	<form action="?" method="POST">
          Código:<input type="text" name="codigopizza"  value="<?php echo $resultado3['PIZ_CODIGO']; ?>" READONLY STYLE = "pointer-events: none;background: #ccc;"><br>

          Sabor:<input type="text" class="form-control" name="sabor" value="<?php echo $resultado3['PIZ_SABOR']; ?>"><br>

          Tamanho:<input type="text" class="form-control" name="tamanho" value="<?php echo $resultado3['PIZ_TAMANHO']; ?>"><br>

          Preço:<input type="text" class="form-control" name="preco" value="<?php echo $resultado3['PIZ_PRECO']; ?>"><br>

       <button type="submit" class="btn btn-primary">Salvar</button>
       
 </form>
 <?php include("design_rodape.php"); ?>
