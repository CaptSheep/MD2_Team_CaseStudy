<a href="index.php?page=genre-create">Create New Genre</a>
<table border="5">
    <thead>
    <tr>
        <th>STT</th>
        <th>Name</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($genres as $key => $genre): ?>
        <tr>
            <td><?php echo $key + 1 ?></td>
            <td><?php echo $genre->name ?></td>
            <td>
                <a onclick="return confirm('Are you sure?')"
                   href="index.php?page=genre-delete&id=<?php echo $genre->id ?>">Delete</a>
                <a href=" index.php?page=genre-detail&id=<?php echo $genre->id ?>">Detail</a>
                <a href="index.php?page=genre-edit&id=<?php echo $genre->id ?>">Edit</a>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>
