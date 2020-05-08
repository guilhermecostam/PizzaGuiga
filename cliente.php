<?php
include("config.php");
include("verifica.php");
if(isset($_GET['excluir'])) {
	$codigo = $_GET['excluir'];
	$consulta2 = $MySQLi->query("DELETE FROM TB_CLIENTES
	WHERE CLI_CODIGO = $codigo");
	header("Location: cliente.php");
} 
$consulta=$MySQLi->query("SELECT * FROM TB_CLIENTES");

?>
<?php include("design_cabecalho.php"); ?>
	<h2 align="center">Clientes</h2>
		<table class="table table-striped">
			<tr>
				<th>Nome</th>
				<th>Mesa</th>
				<th>Usuario / Senha</th>
				<th>Ações</th>
			</tr>

			<?php while($resultado=$consulta->fetch_assoc()){ ?>
			<tr>
	
				<td><?php echo $resultado['CLI_NOME'];?></td>
				<td><?php echo $resultado['CLI_MESA'];?></td>
				<td><?PHP echo $resultado['CLI_USUARIO']; ?> | <?PHP echo $resultado['CLI_SENHA']; ?></td>
				<td><a href="cliente-editar.php?codigo=<?PHP echo $resultado['CLI_CODIGO']; ?>"><img src="http://alunos.arioliveira.com/editar.png" width="16"> | <a href="?excluir=<?PHP echo $resultado['CLI_CODIGO']; ?>"><img src="http://alunos.arioliveira.com/excluir.png" width="16"></a></td>
 				</tr>
		
			<?php } ?>
		</table>

    <?php include("design_rodape.php"); ?>