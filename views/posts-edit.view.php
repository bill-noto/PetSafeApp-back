<?php require_once 'partials/header.view.php' ?>

    <div class="h-2/4 py-10 bg-gradient-to-b from-black to-grey-200">
        <div class="xl:w-4/5 xl:mx-auto">
            <div class="text-center text-white mb-8 mx-8">
                <h1 class="text-2xl sm:text-xl font-bold">Welcome, <?= $_SESSION['user']->first_name ?>, editing <?= $post->title ?>.</h1>
            </div>
            <div class="w-4/5 lg:w-3/5 xl:w-3/5 bg-white border border-primary mx-auto p-4">
                <div class="block text-center">
                    <form action="/admin/posts/update" method="POST" class="mx-auto w-3/5 inline-block">

                        <input type="hidden" name="id" value="<?= $post->id ?>">

                        <div class="w-full">
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" class="px-1.5 mx-2.5 w-full sm:block mb-3"
                                   value="<?= $post->title ?>">
                        </div>

                        <div class="w-full">
                            <label for="create_time">Date: </label>
                            <input type="text" name="create_time" id="create_time"
                                   class="px-1.5 mx-2.5 w-full sm:block mb-3"
                                   value="<?= $post->create_time ?>">
                        </div>

                        <div class="w-full">
                            <label for="body">Body: </label>
                            <textarea name="body" id="body"
                                      class="px-1.5 mx-2.5 w-full sm:block mb-3" ><?= $post->body ?></textarea>
                        </div>

                        <div class="mt-3 mb-3">
                            <button type="submit"
                                    class="mx-auto block transform transition-all hover:bg-gray-200 hover:scale-125 border border-black w-1/3 sm:w-full">
                                Update
                            </button>
                        </div>
                        <div class="mt-9 mb-3">
                            <a class="mx-auto block transform transition-all hover:bg-gray-200 hover:bg-red-300 hover:scale-125 border border-black w-1/3 sm:w-full"
                               href="/admin/posts/delete?id=<?= $post->id ?>">
                                Delete
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php require_once 'partials/footer.view.php' ?>