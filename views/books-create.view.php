<?php require_once 'partials/header.view.php' ?>

    <h1>Create a new Book</h1>

    <form action="/books" method="POST">

        <div class="form-group">
            <label for="title">Book title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="author_id">Book author</label>
            <select name="author_id" id="author_id" class="form-control">
                <?php foreach ($authors as $author) : ?>
                    <option value="<?= $author->id ?>"><?= $author->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mt-3 mb-3">
            <button type="submit" class="btn btn-danger">Create</button>
        </div>
    </form>


<?php require_once 'partials/footer.view.php' ?>