<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Info</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($authors as $key=> $author):?>
    <tr>
        <td><?php echo $key + 1?></td>
        <td><?php echo $author->name?></td>
        <td><?php echo $author->info?></td>
        <td><a onclick="return confirm('Are you sure?')" href="index.php?page=authors-delete&id=<?php echo $author->id?>">Delete</a></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>