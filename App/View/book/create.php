<form action="" method="post">
    <input type="text" name="name" placeholder="Nhập tên " >
    <input type="text" name="quantity" placeholder="Nhập số lượng " >
    <select name="genre" id="">
        <?php foreach ($genres as $genre):?>
        <option value="<?php echo $genre->id ?>"><?php echo $genre->name ?></option>
        <?php endforeach; ?>
    </select>
    <select name="author" id="">
        <?php foreach ($authors as $author):?>
            <option value="<?php echo $author->id ?>"><?php echo $author->name ?></option>
        <?php endforeach; ?>
    </select>
    <select name="review" id="">
        <?php foreach ($reviews as $review):?>
            <option value="<?php echo $review->id  ?>"><?php echo $review->content  ?></option>
        <?php endforeach; ?>
    </select>
    <select name="publisher" id="">
        <?php foreach ($publishers as $publisher):?>
            <option value="<?php echo $publisher->id ?>"><?php echo $publisher->name ?></option>
        <?php endforeach; ?>
    </select>
    <button>Create</button>
</form>
