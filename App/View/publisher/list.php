<a href="index.php?page=publisher-create">Create Publisher</a>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th colspan="4">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($publishers as $key=> $publisher):?>
        <tr>
            <td><?php echo $key + 1?></td>
            <td><?php echo $publisher->name?></td>
            <td><?php echo $publisher->info?></td>
            <td><a onclick="return confirm('Are you sure?')" href="index.php?page=publisher-delete&id=<?php echo $publisher->id?>">Delete</a></td>
            <td><a href="index.php?page=publisher-detail&id=<?php echo $publisher->id?>"> Detail</a></td>
            <td><a href="index.php?page=publisher-update&id=<?php echo $publisher->id?>">Update</a></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>