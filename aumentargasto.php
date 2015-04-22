<?php
$l=$_POST['l'];
?>
<tr>
    <td class="der"><?php echo $l?></td>
    <td><input type="text" name="g[<?php echo $l?>][Detalle]" class="form-control"></td>
    <td><input type="number" name="g[<?php echo $l?>][Total]" class="form-control der gtotal" value="0" min="0" step="0.1"></td>
</tr>