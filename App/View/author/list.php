<a href="index.php?page=author-create">Create Author</a>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Info</th>
        <th colspan="4">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($authors as $key=> $author):?>
    <tr>
        <td><?php echo $key + 1?></td>
        <td><?php echo $author->name?></td>
        <td><?php echo $author->info?></td>
        <td><a onclick="return confirm('Are you sure?')" href="index.php?page=author-delete&id=<?php echo $author->id?>">Delete</a></td>
        <td><a href="index.php?page=author-detail&id=<?php echo $author->id?>"> Detail</a></td>
        <td><a href="index.php?page=author-update&id=<?php echo $author->id ?>">Update</a></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>