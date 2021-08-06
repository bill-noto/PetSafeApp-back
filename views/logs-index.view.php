<?php require_once 'partials/header.view.php' ?>

<!--Hero-->

<div class="h-2/4 py-8 bg-gradient-to-b from-black to-grey-200">
    <div class="xl:w-4/5 xl:mx-auto">
        <div class="text-center text-white mb-8 mx-8">
            <h1 class="text-2xl sm:text-xl font-bold">Welcome, <?= $_SESSION['user']->first_name ?>, these are due.</h1>
        </div>
    </div>
    <div class="xl:flex justify-around h-auto xl:mx-auto">

        <!-- Logs Table/Small Display -->

        <table id="due"
               class="bg-white sm:hidden xl:mx-4 mx-auto p-4 w-5/6 lg:w-4/6 md:w-4/6 sm:w-4/6 h-auto border border-black">
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
                        <td class="border border-black text-center p-6 md:p-3 sm:p-2"><a
                                    class="underline hover:text-blue-900"
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

        <div id="dueSmall" class="hidden sm:block">
            <div class=" bg-white border rounded mx-auto w-5/6">
                <?php foreach ($logs as $log) : ?>
                    <?php if (!$log->complete) : ?>
                        <div class="p-0.5 mt-2">
                            <h1 class="inline-block">Date: </h1>
                            <p class="inline-block"><?= $log->date_requested ?></p>
                        </div>
                        <div class="p-0.5">
                            <h1 class="inline-block">Service: </h1>
                            <p class="inline-block"><?= $log->service ?></p>
                        </div>
                        <div class="p-0.5">
                            <h1 class="inline-block">For: </h1>
                            <p class="inline-block"><?= $log->customer ?> <?= $log->last_name ?></p>
                        </div>
                        <div class="p-0.5">
                            <h1 class="inline-block">Details: </h1>
                            <p class="inline-block"><?= $log->extra_information ?></p>
                        </div>
                        <div class="p-0.5">
                            <h1 class="inline-block">Amount In: </h1>
                            <p class="inline-block">$<?= $log->amount_in ?>.00</p>
                        </div>
                        <div class="p-0.5">
                            <h1 class="inline-block">Actions: </h1>
                            <p class="inline-block"><a
                                        class="underline hover:text-blue-900"
                                        href="admin/logs/edit?id=<?= $log->id ?>">Edit</a>
                                |
                                <a class="underline hover:text-red-900"
                                   href="admin/logs/delete?id=<?= $log->id ?>">Delete</a></p>
                        </div>
                        <div>
                            <hr class="border border-black mt-2">
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Past Logs Table/Small Display -->

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

        <div id="completeSmall" class="hidden sm:block">
            <div class=" bg-white border rounded mx-auto w-5/6">
                <?php foreach ($logs as $log) : ?>
                    <?php if ($log->complete) : ?>
                        <div class="p-0.5 mt-2">
                            <h1 class="inline-block">Date: </h1>
                            <p class="inline-block"><?= $log->date_requested ?></p>
                        </div>
                        <div class="p-0.5">
                            <h1 class="inline-block">Service: </h1>
                            <p class="inline-block"><?= $log->service ?></p>
                        </div>
                        <div class="p-0.5">
                            <h1 class="inline-block">For: </h1>
                            <p class="inline-block"><?= $log->customer ?> <?= $log->last_name ?></p>
                        </div>
                        <div class="p-0.5">
                            <h1 class="inline-block">Details: </h1>
                            <p class="inline-block"><?= $log->extra_information ?></p>
                        </div>
                        <div class="p-0.5">
                            <h1 class="inline-block">Amount In: </h1>
                            <p class="inline-block">$<?= $log->amount_in ?>.00</p>
                        </div>
                        <div class="p-0.5">
                            <h1 class="inline-block">Actions: </h1>
                            <p class="inline-block"><a
                                        class="underline hover:text-blue-900"
                                        href="admin/logs/edit?id=<?= $log->id ?>">Edit</a>
                                |
                                <a class="underline hover:text-red-900"
                                   href="admin/logs/delete?id=<?= $log->id ?>">Delete</a></p>
                        </div>
                        <div>
                            <hr class="border border-black mt-2">
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <!--Sidenav-->

        <aside class="xl:w-1/6 mx-4 h-full lg:flex lg:justify-center md:flex md:justify-center sm:flex sm:justify-center">
            <div class="text-center m-3">
                <a href="/admin/logs/create"
                   class="bg-white mx-auto block transform transition-all hover:bg-gray-200 hover:scale-125 border border-black p-2">Add
                    a Log</a>
            </div>
            <div class="text-center m-3">
                <button type="button"
                        class="bg-white w-full block transform transition-all hover:bg-gray-200 hover:scale-125 border border-black p-2">
                    Past Logs
                </button>
            </div>
            <div class="text-center m-3">
                <a href="/admin/posts"
                   class="bg-white mx-auto block transform transition-all hover:bg-gray-200 hover:scale-125 border border-black p-2">Go
                    to Posts</a>
            </div>
        </aside>
    </div>

</div>

<?php require_once 'partials/footer.view.php' ?>
