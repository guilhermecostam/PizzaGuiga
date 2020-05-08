<?php
include("config.php");
include("verifica.php");
if(isset($_GET['excluir'])) {
  $codigo = $_GET['excluir'];
  $consulta2 = $MySQLi->query("DELETE FROM TB_PIZZAS
  WHERE PIZ_CODIGO = $codigo");
  header("Location: pizza.php");
} 

$consulta=$MySQLi->query("SELECT * FROM TB_PIZZAS");
?>

<?php include("design_cabecalho.php"); ?>
  <h3>Pizzas</h3>
    <table class="table table-striped">
      <tr>

        <th>Sabor</th>
        <th>Tamanho</th>
        <th>Preço</th>
        <th>Ações</th>
      </tr>

      <?php while($resultado=$consulta->fetch_assoc()){ ?>
      <tr>

        <td><?php echo $resultado['PIZ_SABOR'];?></td>
        <td><?php echo $resultado['PIZ_TAMANHO'];?></td>
        <td><?php echo $resultado['PIZ_PRECO'];?></td>
         <td><a href="pizza-editar.php?codigo=<?PHP echo $resultado['PIZ_CODIGO']; ?>"><img src="http://alunos.arioliveira.com/editar.png" width="16"> | <a href="?excluir=<?PHP echo $resultado['PIZ_CODIGO']; ?>"><img src="http://alunos.arioliveira.com/excluir.png" width="16"></a></td>
        </tr>
      <?php } ?>
    </table>

    <?php include("design_rodape.php"); ?>