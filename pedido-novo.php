<?php
include("config.php");
include("verifica.php");
if(isset($_POST['ped_cli'])){ 
  $ped_cli=$_POST['ped_cli'];
  $ped_piz=$_POST['ped_piz'];
  $ped_dt=br_us($_POST['ped_dt']);
  $ped_fnlz=$_POST['ped_fnlz'];
  $consulta=$MySQLi->query("insert into TB_PEDIDOS (PED_CLI_CODIGO,PED_PIZ_CODIGO,PED_DATA,PED_FINALIZADO)
  values($ped_cli,$ped_piz,'$ped_dt','$ped_fnlz')");
  header("Location:pedido.php");
}
$consulta3 = $MySQLi->query("SELECT * FROM TB_CLIENTES");
$consulta4 = $MySQLi->query("SELECT * FROM TB_PIZZAS");

?>

<?php include("design_cabecalho.php"); ?>
  <h3>Pedidos</h3>

  <form action="?" method="POST">
        Clientes:<select name = "ped_cli" class="form-control">
           <?php while($resultado3 = $consulta3->fetch_assoc()) { ?>
          <option value = "<?php echo $resultado3['CLI_CODIGO']; ?>" 
             ?><?php echo $resultado3['CLI_NOME'];?>
         </option>
           <?php } ?>
       </select>

       Pizzas:<select name = "ped_piz" class="form-control">
          <?php while($resultado4 = $consulta4->fetch_assoc()) { ?>
           <option value = "<?php echo $resultado4['PIZ_CODIGO']; ?>" 
              ?><?php echo $resultado4['PIZ_SABOR']." do tamanho:  ".$resultado4['PIZ_TAMANHO']; ?>
           </option>
             <?php } ?>
        </select>

          Data do pedido:<input type="date"  id="input3" name="ped_dt" class="form-control">

          Pedido finalizado:<input type="text"  id="input4" name="ped_fnlz" class="form-control">

        <input type="submit" value="Inserir!" class="btn btn-primary">
    </form>
    <?php include("design_rodape.php"); ?>