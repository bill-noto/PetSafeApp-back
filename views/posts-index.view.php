<?php require_once 'partials/header.view.php' ?>

<!--Hero-->

<div class="h-2/4 py-8 bg-gradient-to-b from-black to-grey-200">
    <div class="xl:w-4/5 xl:mx-auto">
        <div class="text-center text-white mb-8 mx-8">
            <h1 class="text-2xl sm:text-xl font-bold">Welcome, <?= $_SESSION['user']->first_name ?>, these are the
                newsletter posts.</h1>
        </div>
    </div>
    <div class="h-auto xl:mx-auto">

        <!--Sidenav-->

        <aside class="mx-4 h-full flex justify-center">
            <div class="text-center m-3">
                <a href="/admin/posts/create"
                   class="bg-white mx-auto block transform transition-all hover:bg-gray-200 hover:scale-125 border border-black p-2">Create
                    a Post</a>
            </div>
            <div class="text-center m-3">
                <a href="/admin/logs"
                   class="bg-white mx-auto block transform transition-all hover:bg-gray-200 hover:scale-125 border border-black p-2">Go
                    to Logs</a>
            </div>
        </aside>
        <!--POSTS -->

        <?php foreach ($posts as $post) : ?>
            <div class="xl:w-4/5 xl:mx-auto text-white">
                <div class="text-center my-10 mx-8">
                    <h1 class="text-2xl sm:text-xl font-bold"><?= $post->title ?></h1>
                    <h2 class="text-xl sm:text-xl font-bold"><?= $post->author ?>
                        , <?= $post->create_time ?></h2>
                    <p class="mt-4 w-4/5 mx-auto sm:text-sm"><?= $post->body ?></p>
                </div>
                <a class="mx-auto block transform transition-all bg-gray-100 hover:bg-gray-200 hover:scale-125 border border-black w-1/3 sm:w-full text-center text-blue-900"
                   href="/admin/posts/edit?id=<?= $post->id ?>">Edit</a>
            </div>
            <hr class="my-10">
        <?php endforeach; ?>

    </div>

</div>

<?php require_once 'partials/footer.view.php' ?>
