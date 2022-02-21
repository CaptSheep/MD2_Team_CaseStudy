<div class="container mt-3">
    <div class="row">
        <div class="col-8">
            <div class="row">
                <?php foreach ($books as $book): ?>
                    <div class="col-4">
                        <div class="card" style="width: 100%;">
                            <img class="card-img-top" src="uploads/default-book.jpeg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $book->name ?></h5>
                                <a href="index.php?page=add-book-borrow&id=<?php echo $book->id ?>" class="btn btn-primary">ADD</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <?php echo $user->username ?>
                </div>
                <ul class="list-group list-group-flush">
                    <?php foreach ($borrow as $book): ?>
                        <li class="list-group-item"><?php echo $book->name?> || <?php echo $book->quantity?></li>
                    <?php endforeach; ?>

                </ul>
<!--                <div>-->
                    <a type="button" class="btn btn-success" href="">Borrow</a>
                    <a type="button" class="btn btn-danger" href="index.php?page=clear-borrow">Clear</a>
<!--                </div>-->
            </div>
        </div>
    </div>
</div>