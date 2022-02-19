<table border="5">
    <thead>
    <tr>
        <th>STT</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Genre</th>
        <th>Author</th>
        <th>Publisher</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($books as $key=>$book):?>
    <tr>
        <td><?php echo $key+1 ?></td>
        <td><?php echo $book->name ?></td>
        <td><?php echo $book->quantity ?></td>
        <td><?php echo $book->genre ?></td>
        <td><?php echo $book->author ?></td>
        <td><?php echo $book->publisher ?></td>
        <td><a href="index.php?page=book-detail&id=<?php echo $book->id ?>">Detail</a></td>
        <td><a href="index.php?page=book-edit&id=<?php echo $book->id ?>">Edit</a></td>
        <td><a onclick="return confirm('Are you sure?')" href="index.php?page=book-delete&id=<?php echo $book->id ?>">Delete</a></td>
    </tr>
    <?php endforeach;?>
    </tbody>


</table>
