<?php
include("config.php");
include("verifica.php");

if(isset($_GET['excluir'])) {
  $codigo = $_GET['excluir'];
  $consulta2 = $MySQLi->query("DELETE FROM TB_PEDIDOS
  WHERE PED_CODIGO = $codigo");
  header("Location:pedido.php");
} 

$consulta=$MySQLi->query("SELECT * FROM TB_PEDIDOS JOIN TB_PIZZAS ON PED_PIZ_CODIGO=PIZ_CODIGO JOIN TB_CLIENTES ON PED_CLI_CODIGO=CLI_CODIGO");
?>

<?php include("design_cabecalho.php"); ?>
	<h3>Pedidos</h3>

		<table class="table table-striped">
			<tr>

				<th>Nome do cliente</th>
				<th>Pizza pedida</th>
				<th>Data do pedido</th>
				<th>Pedido finalizado</th>
			</tr>

			<?php while( $resultado = $consulta->fetch_assoc()){ ?>
			<tr>
				<td><?php echo $resultado['CLI_NOME'];?></td>
				<td><?php echo $resultado['PIZ_SABOR'];?></td>
				<td> <?php echo us_br($resultado['PED_DATA']); ?> </td>
				<td><?php echo $resultado['PED_FINALIZADO'];?></td>
				 <td><a href="pedido-editar.php?codigo=<?PHP echo $resultado['PED_CODIGO']; ?>"><img src="http://alunos.arioliveira.com/editar.png" width="16"></a> | <a href="?excluir=<?PHP echo $resultado['PED_CODIGO']; ?>"><img src="http://alunos.arioliveira.com/excluir.png" width="16"></a></td>
      
			</tr>
			<?php } ?>
		</table>
		<?php include("design_rodape.php"); ?>