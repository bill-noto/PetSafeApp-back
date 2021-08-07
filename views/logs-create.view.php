<?php require_once 'partials/header.view.php' ?>

    <div class="h-2/4 py-10 bg-gradient-to-b from-black to-grey-200">
        <div class="xl:w-4/5 xl:mx-auto">
            <div class="text-center text-white mb-8 mx-8">
                <h1 class="text-2xl sm:text-xl font-bold">Welcome, <?= $_SESSION['user']->first_name ?>, create a
                    log.</h1>
            </div>
            <div class="w-4/5 lg:w-3/5 xl:w-3/5 bg-white border border-primary mx-auto p-4">
                <div class="block text-center">

                    <form action="/admin/logs" method="POST"
                          class="mx-auto w-3/5 inline-block">

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
                            <input type="text" name="client" id="client" class="px-1.5 mx-2.5 w-full sm:block mb-3">
                        </div>

                        <div class="w-full">
                            <label for="date_requested">Date: </label>
                            <input type="date" name="date_requested" id="date"
                                   class="px-1.5 mx-2.5 w-full sm:block mb-3">
                        </div>

                        <div class="w-full">
                            <label for="time_requested">Time: </label>
                            <input type="time" name="time_requested" id="time" min="08:00" max="16:00"
                                   class="px-1.5 mx-2.5 w-full sm:block mb-3">
                        </div>

                        <div class="w-full">
                            <label for="extra_information">Details: </label>
                            <input type="text" name="extra_information" id="extra_information" value="-"
                                   class="px-1.5 mx-2.5 w-full sm:block mb-3">
                        </div>

                        <div class="py-4">
                            <button type="button"
                                    id="submission"
                                    class="mx-auto block transform transition-all hover:bg-gray-200 hover:scale-125 border border-black w-1/3">
                                Check
                            </button>
                        </div>

                        <div class="py-4">
                            <button type="submit"
                                    id="submit"
                                    class="hidden mx-auto block transform transition-all hover:bg-gray-200 hover:scale-125 border border-black w-1/3">
                                Create
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Modal of success or Failure-->
    <div id="modal" class="fixed w-3/5 h-auto top-1/3 lModal bg-white p-6 border rounded-2xl z-50 mx-4 hidden">
        <div>
            <h1 id="plc" class="text-center">Place Holder</h1>
            <p id="plct" class=""></p>
        </div>
        <button id="modalClose" class="block mx-auto mt-4 sm:mt-4 md:mt-8 border w-3/5 border-black">Close</button>
    </div>
    <div id="overlay" class="fixed w-full h-full left-0 top-0 z-20 bg-black opacity-70 hidden"></div>


<?php require_once 'partials/footer.view.php' ?>