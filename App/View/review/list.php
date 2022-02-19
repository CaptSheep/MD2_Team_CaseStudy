<a href="index.php?page=review-create">Create Review</a>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Content</th>
        <th>Book_id</th>
        <th colspan="4">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($reviews as $key => $review): ?>
        <tr>
            <td><?php echo $key + 1 ?></td>
            <td><?php echo $review->content ?></td>
            <td><?php echo $review->book_id ?></td>
            <td onclick="return confirm('Are you sure?')"><a href="index.php?page=review-delete&id=<?php echo $review->id ?>">Delete</a></td>
            <td><a href="index.php?page=review-detail&id=<?php echo $review->id ?>">Detail</a></td>
            <td><a href="index.php?page=review-edit&id=<?php echo $review->id ?>">Edit</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>