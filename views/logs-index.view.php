<?php require_once 'partials/header.view.php' ?>

<div class="h-2/4 py-8 bg-gradient-to-b from-black to-grey-200">
    <div class="xl:w-4/5 xl:mx-auto">
        <div class="text-center text-white mb-8 mx-8">
            <h1 class="text-2xl sm:text-xl font-bold">Welcome, <?= $_SESSION['user']->first_name ?>.</h1>
        </div>
    </div>
    <div class="flex">

        <!--Sidenav-->
        <aside class="bg-white w-1/6 mx-4 h-full border border-black">
            <div class="text-center m-3">
                <a href="/admin/logs/create"
                   class="mx-auto block transform transition-all hover:bg-gray-200 hover:scale-125 border border-black w-4/5">Add
                    a Task</a>
            </div>
            <div class="text-center m-3">
                <a href="/admin/posts"
                   class="mx-auto block transform transition-all hover:bg-gray-200 hover:scale-125 border border-black w-4/5">Go
                    to Posts</a>
            </div>

        </aside>

        <!---->
        <table class="bg-white mx-4 p-4 w-5/6 h-auto border border-black">
            <thead class="border border-black">
            <tr class="border border-black">
                <th class="border border-black p-6">Date</th>
                <th class="border border-black p-6">Service</th>
                <th class="border border-black p-6">For:</th>
                <th class="border border-black p-6">Details</th>
                <th class="border border-black p-6">Amount in</th>
                <th class="border border-black p-6">Actions</th>
            </tr>
            </thead>
            <tbody class="border border-black">
            <?php foreach ($logs as $log) : ?>
                <tr class="border border-black">
                    <td class="border border-black text-center p-6"><?= $log->date_requested ?></td>
                    <td class="border border-black text-center p-6"><?= $log->service ?></td>
                    <td class="border border-black text-center p-6"><?= $log->customer ?> <?= $log->last_name ?></td>
                    <td class="border border-black text-center p-6"><?= $log->extra_information ?></td>
                    <td class="border border-black text-center p-6">$<?= $log->amount_in ?>.00</td>
                    <td class="border border-black text-center p-6"><a class="underline hover:text-blue-900"
                                                                       href="admin/logs/edit?id=<?= $log->id ?>">Edit</a>
                        |
                        <a class="underline hover:text-red-900" href="admin/logs/delete?id=<?= $log->id ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'partials/footer.view.php' ?>
