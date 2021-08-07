<?php require_once 'partials/header.view.php' ?>

    <div class="h-2/4 py-10 bg-gradient-to-b from-black to-grey-200">
        <div class="xl:w-4/5 xl:mx-auto">
            <div class="text-center text-white mb-8 mx-8">
                <h1 class="text-2xl sm:text-xl font-bold">Welcome, <?= $_SESSION['user']->first_name ?>, edit log from
                    <?= date('d-m-Y', $log->date_requested) ?>, done for <?= $log->client ?>.</h1>
            </div>
            <div class="w-4/5 lg:w-3/5 xl:w-3/5 bg-white border border-primary mx-auto p-4">
                <div class="block text-center">
                    <form action="/admin/logs/update" method="POST" class="mx-auto w-3/5 inline-block">

                        <input type="hidden" name="id" value="<?= $log->id ?>">

                        <div class="w-full">
                            <label for="service_id">Service: </label>
                            <select name="service_id" id="service_id"
                                    class="px-1.5 mx-2.5 w-full sm:block mb-3 border border-black">
                                <?php foreach ($services as $service) : ?>
                                    <option value="<?= $service->id ?>"><?= $service->service ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="w-full">
                            <label for="client">For:</label>
                            <input type="text" name="client" id="client" class="px-1.5 mx-2.5 w-full sm:block mb-3"
                                   value="<?= $log->client ?>">
                        </div>

                        <div class="w-full">
                            <label for="date_requested">Date: </label>
                            <input type="date" name="date_requested" id="date_requested"
                                   class="px-1.5 mx-2.5 w-full sm:block mb-3"
                                   value="<?= date('Y-m-d', $log->date_requested) ?>">
                        </div>

                        <div class="w-full">
                            <label for="time_requested">Time: </label>
                            <input type="time" name="time_requested" id="time_requested" min="08:00" max="16:00"
                                   class="px-1.5 mx-2.5 w-full sm:block mb-3" value="<?= $log->time_requested ?>">
                        </div>

                        <div class="w-full">
                            <label for="extra_information">Details: </label>
                            <input type="text" name="extra_information" id="extra_information"
                                   value="<?= $log->extra_information ?>"
                                   class="px-1.5 mx-2.5 w-full sm:block mb-3">
                        </div>

                        <div class="w-full">
                            <label for="amount_in">Amount Paid: </label>
                            <input type="text" name="amount_in" id="amount_in"
                                   value="<?= $log->amount_in ?>"
                                   class="px-1.5 mx-2.5 w-full sm:block mb-3">
                        </div>

                        <div class="w-full">
                            <p for="complete">Complete: </p>
                            <label for="notComplete">No </label>
                            <input type="checkbox" id="notComplete" value="0" name="complete"
                                   class="px-1.5 mx-1.5 sm:mx-auto sm:block mb-3">
                            <label for="complete">Yes </label>
                            <input type="checkbox" id="complete" value="1" name="complete"
                                   class="px-1.5 mx-1.5 sm:mx-auto sm:block mb-3">
                        </div>

                        <div class="mt-3 mb-3">
                            <button type="submit"
                                    class="mx-auto block transform transition-all hover:bg-gray-200 hover:scale-125 border border-black w-1/3 sm:w-full">
                                Update
                            </button>
                        </div>
                        <div class="mt-9 mb-3">
                            <a class="mx-auto block transform transition-all hover:bg-gray-200 hover:bg-red-300 hover:scale-125 border border-black w-1/3 sm:w-full"
                               href="/admin/logs/delete?id=<?= $log->id ?>">
                                Delete
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php require_once 'partials/footer.view.php' ?>