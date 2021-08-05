<?php require_once 'partials/header.view.php' ?>

<!--Hero-->

<div class="h-2/4 py-8 bg-gradient-to-b from-black to-grey-200">
    <div class="xl:w-4/5 xl:mx-auto">
        <div class="text-center text-white mb-8 mx-8">
            <h1 class="text-2xl sm:text-xl font-bold">Welcome, <?= $_SESSION['user']->first_name ?>, these are due.</h1>
        </div>
    </div>
    <div class="xl:flex justify-around h-auto xl:mx-auto">

        <!-- Logs Table -->

        <table id="due" class="bg-white mx-4 p-4 w-5/6 lg:w-4/6 md:w-4/6 sm:w-4/6 mx-auto h-auto border border-black">
            <thead class="border border-black">
            <tr class="border border-black">
                <th class="border border-black p-6 md:p-3 sm:p-2">Date</th>
                <th class="border border-black p-6 md:p-3 sm:p-2">Service</th>
                <th class="border border-black p-6 md:p-3 sm:p-2">For:</th>
                <th class="border border-black p-6 md:p-3 sm:p-2">Details</th>
                <th class="border border-black p-6 md:p-3 sm:p-2">Amount in</th>
                <th class="border border-black p-6 md:p-3 sm:p-2">Actions</th>
            </tr>
            </thead>
            <tbody class="border border-black">
            <?php foreach ($logs as $log) : ?>
                <?php if (!$log->complete) : ?>
                    <tr class="border border-black">
                        <td class="border border-black text-center p-6 md:p-3 sm:p-2"><?= $log->date_requested ?></td>
                        <td class="border border-black text-center p-6 md:p-3 sm:p-2"><?= $log->service ?></td>
                        <td class="border border-black text-center p-6 md:p-3 sm:p-2"><?= $log->customer ?> <?= $log->last_name ?></td>
                        <td class="border border-black text-center p-6 md:p-3 sm:p-2"><?= $log->extra_information ?></td>
                        <td class="border border-black text-center p-6 md:p-3 sm:p-2">$<?= $log->amount_in ?>.00</td>
                        <td class="border border-black text-center p-6 md:p-3 sm:p-2"><a class="underline hover:text-blue-900"
                                                                           href="admin/logs/edit?id=<?= $log->id ?>">Edit</a>
                            |
                            <a class="underline hover:text-red-900"
                               href="admin/logs/delete?id=<?= $log->id ?>">Delete</a>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Past Logs Table -->

        <table id="complete" class="bg-white mx-4 p-4 w-5/6 h-auto hidden border border-black">
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
                <?php if ($log->complete) : ?>
                    <tr class="border border-black">
                        <td class="border border-black text-center p-6"><?= $log->date_requested ?></td>
                        <td class="border border-black text-center p-6"><?= $log->service ?></td>
                        <td class="border border-black text-center p-6"><?= $log->customer ?> <?= $log->last_name ?></td>
                        <td class="border border-black text-center p-6"><?= $log->extra_information ?></td>
                        <td class="border border-black text-center p-6">$<?= $log->amount_in ?>.00</td>
                        <td class="border border-black text-center p-6"><a class="underline hover:text-blue-900"
                                                                           href="admin/logs/edit?id=<?= $log->id ?>">Edit</a>
                            |
                            <a class="underline hover:text-red-900"
                               href="admin/logs/delete?id=<?= $log->id ?>">Delete</a>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
        <!--Sidenav-->

        <aside class="xl:w-1/6 mx-4 h-full lg:flex lg:justify-center md:flex md:justify-center sm:flex sm:justify-center">
            <div class="text-center m-3">
                <a href="/admin/logs/create"
                   class="bg-white mx-auto block transform transition-all hover:bg-gray-200 hover:scale-125 border border-black p-2">Add
                    a Task</a>
            </div>
            <div class="text-center m-3">
                <a href="/admin/posts"
                   class="bg-white mx-auto block transform transition-all hover:bg-gray-200 hover:scale-125 border border-black p-2">Go
                    to Posts</a>
            </div>
            <div class="text-center m-3">
                <button type="button"
                        class="bg-white w-full block transform transition-all hover:bg-gray-200 hover:scale-125 border border-black p-2">
                    Past Logs
                </button>
            </div>
        </aside>
    </div>

</div>

<?php require_once 'partials/footer.view.php' ?>
