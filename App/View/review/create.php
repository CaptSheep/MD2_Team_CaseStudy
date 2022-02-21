<form method="post">
    <input type="text" name="content" placeholder="Nhập Content">
    <select name="name" id="">
        <?php foreach ($books as $book): ?>
            <option value="<?php echo $book->id?>"><?php echo $book->name?></option>
        <?php endforeach; ?>
    </select>
    <button>Create</button>
</form>