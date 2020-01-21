<table cellpadding="0" cellspacing="0">
    <tr>
        <!--th>ID</th-->
        <th>Category</th>
        <th>Name</th>
        <th>Amount</th>
    </tr>
    <?php
    $i = 0;
    foreach ($fees as $fee):
        $class = null;
        if ($i++ % 2 == 0) {
            $class = ' class="altrow"';
        }
        ?>
    <tr<?php echo $class;?>>
        <!--td><?php echo $fee['Fee']['id']; ?>&nbsp;</td-->
        <td><?php echo $fee['Fee']['category']; ?>&nbsp;</td>
        <td><?php echo $fee['Fee']['name']; ?>&nbsp;</td>
        <td><?php echo $fee['Fee']['amount']; ?>&nbsp;</td>
    </tr>
    <?php endforeach; ?>
</table>