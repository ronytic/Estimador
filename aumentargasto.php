<?php
$l=$_POST['l'];
?>
<tr>
    <td class="der"><?php echo $l?></td>
    <td><input type="text" name="g[<?php echo $l?>][Producto]" class="form-control"></td>
    <td><input type="number" name="g[<?php echo $l?>][Total]" class="form-control der" readonly value="0"></td>
</tr>