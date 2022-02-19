<a href="index.php?page=user-create">Create</a>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Student_code</th>
        <th>Role_id</th>
        <th colspan="4">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $key => $user): ?>
        <tr>
            <td><?php echo $key + 1 ?></td>
            <td><?php echo $user->Student_code ?></td>
            <td><?php echo $user->Role_id ?></td>
            <td><a href="index.php?page=user-detail&id=<?php echo $user->id ?>">Detail</a></td>
            <td onclick="return confirm('Are you sure?')"><a href="index.php?page=user-delete&id=<?php echo $user->id ?>">Delete</a></td>
            <td><a href="index.php?page=user-edit&id=<?php echo $user->id ?>">Edit</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>