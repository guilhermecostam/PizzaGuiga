<?php
include("config.php");
include("verifica.php");
$codigo = $_GET['codigo'];
//if(!isset($_GET['codigo'])) header("location: cliente.php");
if(isset($_POST['nome'])) {
 $nome = $_POST['nome'];
 $codigocliente = $_POST['codigocliente'];
 $mesa = $_POST['mesa'];
 
 $consulta = $MySQLi->query("UPDATE TB_CLIENTES set CLI_NOME = '$nome', CLI_MESA = '$mesa'
 where CLI_CODIGO = $codigocliente");
 header("Location: cliente.php");
}
$consulta3 = $MySQLi->query("SELECT * FROM TB_CLIENTES WHERE CLI_CODIGO = $codigo");
$resultado3 = $consulta3->fetch_assoc();
?>

<?php include("design_cabecalho.php"); ?>
	<h3>Editar Clientes</h3>
 	<form action="?" method="POST">

 	      Código:<input type="text" name="codigocliente"   value="<?php echo $resultado3['CLI_CODIGO']; ?>" READONLY STYLE="pointer-events: none;background: #ccc;"><br>

        Nome do cliente:<input type="text" class="form-control" name="nome" value="<?php echo $resultado3['CLI_NOME']; ?>"><br>
      
        Mesa ocupada:<input type="text" class="form-control" name="mesa" value="<?php echo $resultado3['CLI_MESA']; ?>"><br>

       <button type="submit" class="btn btn-primary">Salvar</button>

  </form>
  <?php include("design_rodape.php"); ?>
