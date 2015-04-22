<?php
$l=$_POST['l'];
?>
<tr>
    <td class="der"><?php echo $l?></td>
    <td><input type="text" name="o[<?php echo $l?>][Producto]" class="form-control"></td>
    <td><input type="text" name="o[<?php echo $l?>][Item]" class="form-control"></td>
    <td><input type="number" name="o[<?php echo $l?>][Cantidad]" class="ocantidad form-control der" value="0" rel="<?php echo $l?>" min="0"></td>
    <td><input type="number" name="o[<?php echo $l?>][PrecioUnitario]" class="form-control der opreciounitario" value="0.00" rel="<?php echo $l?>" min="0" step="0.1"></td>
    <td><input type="number" name="o[<?php echo $l?>][PesoLibras]" class="form-control der opesolibras" value="0" rel="<?php echo $l?>" min="0" step="0.1"></td>
    <td><input type="number" name="o[<?php echo $l?>][Total]" class="form-control der ototal" readonly value="0" rel="<?php echo $l?>" min="0" step="0.1"></td>
</tr>