<?php require_once 'partials/header.view.php' ?>

    <h1>Edit a Book - <?= $book->title ?></h1>


    <form action="/books/update" method="POST">

    <!--     <div class="form-group">
            <label for="id">ID</label>
            <input type="text" name="id" id="id" class="form-control" value="<?/*= $book->id */?>" disabled>
        </div>-->

        <input type="hidden" name="id" value="<?= $book->id ?>">

        <div class="form-group">
            <label for="title">Book title</label>
            <input type="text" name="title" id="title" class="form-control" value="<?= $book->title ?>">
        </div>

        <div class="form-group">
            <label for="author">Book author</label>
            <input type="text" name="author" id="author" class="form-control" value="<?= $book->author ?>">
        </div>

        <div class="mt-3 mb-3">
            <button type="submit" class="btn btn-danger">Update</button>
        </div>
    </form>


<?php require_once 'partials/footer.view.php' ?>