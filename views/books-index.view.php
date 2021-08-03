<?php require_once 'partials/header.view.php' ?>

<h1>Books</h1>
<div class="text-end m-3">
    <a href="/books/create" class="btn btn-primary">Add a Book</a>
</div>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($books as $book) : ?>
        <tr>
            <td><?= $book->id ?></td>
            <td><?= $book->title ?></td>
            <td><?= $book->author_name ?></td>
            <td><a href="/books/edit?id=<?= $book->id ?>">Edit</a> | <a href="/books/delete?id=<?= $book->id ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php require_once 'partials/footer.view.php' ?>
