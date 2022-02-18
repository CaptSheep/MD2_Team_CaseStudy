
<a href="index.php?page=review-list">Review list</a>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Content</th>
        <th>Book_id</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($reviews as $key => $review):?>
    <tr>
        <td><?php echo $key+1?></td>
        <td><?php echo $review->content?></td>
        <td><?php echo $review->book_id?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>