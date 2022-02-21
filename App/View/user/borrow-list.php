<a href="index.php?page=user-create">Create</a>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th colspan="2">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $key => $user): ?>
        <tr>
            <td><?php echo $key + 1 ?></td>
            <td><?php echo $user->username ?></td>
            <td><a href="index.php?page=user-detail&id=<?php echo $user->id ?>">Detail</a></td>
            <td><a href="index.php?page=borrow-register&id=<?php echo $user->id ?>">Borrow</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>