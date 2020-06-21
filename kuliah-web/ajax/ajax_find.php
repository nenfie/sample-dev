<?php 

require '../function.php';

$footballers = findData($_GET['keyword']);

?>

<table border="1" cellpadding="10" cellspacing="0"> 
    <tr>
        <th>#</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Action</th>
    </tr>

    <?php if(empty($footballers)) : ?>
        <tr>
            <td colspan="4"><p style="color: red; font-style: italic;">Data not found!</p></td>
        </tr>
    <?php endif; ?>

    <?php $i=1;
        foreach($footballers as $p) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><img src="img/<?= $p['image']; ?>" width=80></td>
            <td><?= $p['name']; ?></td>
            <td><a href="view.php?id=<?= $p['id']; ?>">View Detail</a></td>
        </tr>
    <?php endforeach; ?>
</table>