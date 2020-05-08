<?php
include("config.php");
include("verifica.php");

  $codigo = $_GET['codigo'];

  if(isset($_POST['pizza'])) {
    $pedido = $_POST['pedido'];
    $cliente = $_POST['cliente'];
    $data = $_POST['data'];
    $pizza = $_POST['pizza'];
    $final=$_POST['final'];
    $consulta = $MySQLi->query("UPDATE TB_PEDIDOS SET  PED_PIZ_CODIGO=$pizza, PED_CLI_CODIGO = $cliente, PED_DATA='$data', PED_FINALIZADO = $final
    where PED_CODIGO=$pedido");
    header("location:pedido.php");
  }

  $consulta2 = $MySQLi->query("SELECT * FROM TB_PEDIDOS WHERE PED_CODIGO = $codigo");
  $resultado2 = $consulta2->fetch_assoc();
  $consulta3 = $MySQLi->query("SELECT * FROM TB_CLIENTES");
  $consulta4 = $MySQLi->query("SELECT * FROM TB_PIZZAS");

?>

  <?php include("design_cabecalho.php"); ?>
  <h3>Pedido</h3>

    <form action = "?" method = "POST">
          Código:<input type="text" name = "pedido" value = "<?php echo $resultado2['PED_CODIGO']; ?>" READONLY STYLE = "pointer-events: none;background: #ccc;" ><br>

          Clientes:<select name = "cliente" class="form-control">
           <?php while($resultado3 = $consulta3->fetch_assoc()) { ?>
          <option value = "<?php echo $resultado3['CLI_CODIGO']; ?>" <?php
             if($resultado3['CLI_CODIGO'] == $resultado2['PED_CLI_CODIGO'])
              echo " selected";
             ?>><?php echo $resultado3['CLI_NOME'];?>
         </option>
           <?php } ?>
        </select><br>

        Pizzas:<select name = "pizza" class="form-control">
          <?php while($resultado4 = $consulta4->fetch_assoc()) { ?>
           <option value = "<?php echo $resultado4['PIZ_CODIGO']; ?>" <?php
              if($resultado4['PIZ_CODIGO'] == $resultado2['PED_PIZ_CODIGO'])
               echo " selected";
              ?>><?php echo $resultado4['PIZ_SABOR']." do tamanho:  ".$resultado4['PIZ_TAMANHO']; ?>
           </option>
             <?php } ?>
        </select><br>

        Pedido Finalizado:<input type="text"  class="form-control" name="final"  value = "<?php echo $resultado2['PED_FINALIZADO']; ?>"><br>
        
        Data do pedido:<input type="date" class="form-control" name="data"  value = "<?php echo us_br($resultado2 ['PED_DATA']); ?>"><br>
  
    <button type="submit" class="btn btn-primary">Salvar</button>

    </form>
    <?php include("design_rodape.php"); ?>
