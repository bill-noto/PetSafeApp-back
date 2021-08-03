<?php require_once 'partials/header.view.php' ?>

<!--Hero-->
<div class="xl:w-4/5 xl:mx-auto">
    <div class="text-center my-10 mx-8">
        <h1 class="text-2xl sm:text-xl font-bold">WELCOME</h1>
        <p class="mt-4 w-4/5 mx-auto sm:text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin
            dignissim leo sed
            velit congue semper. Nam eleifend varius lobortis. Aliquam erat volutpat. Maecenas imperdiet fringilla risus
            id ornare. Proin malesuada nunc ex, quis blandit nisi sodales in. Donec blandit ex quis pretium tempus. Sed
            et ultricies sapien.</p>
    </div>
</div>

<!--Login Form-->
<div class="h-2/4 py-10 bg-gradient-to-b from-black to-grey-200">
    <div class="w-4/5 lg:w-3/5 xl:w-3/5 bg-white border border-primary mx-auto p-4">
        <h1 class="text-center text-2xl pb-4">LOGIN</h1>
        <div class="block text-center">
            <form class="mx-auto w-3/5 inline-block text-sm" action="/" method="POST">

                <?php if ($message): ?>
                    <div class="my-4 w-4/5 mx-auto text-lg sm:text-base bg-red-400">
                        <?= $message ?>
                    </div>
                <?php endif; ?>

                <div class="w-full">
                    <input type="email" name="email" id="email" placeholder="Email (required)"
                           class="px-1.5 mx-2.5 w-full sm:block mb-3">
                </div>

                <div class="w-full">
                    <input type="password" name="password" id="password" placeholder="Password (required)"
                           class="px-1.5 mx-2.5 w-full sm:block mb-3">
                </div>

                <div class="py-4">
                    <button type="submit"
                            class="mx-auto block transform transition-all hover:bg-gray-200 hover:scale-125 border border-black w-1/3">
                        Login
                    </button>
                </div>
                <h1 class="text-center text-2xl py-4">OR</h1>
                <div class="py-4">
                    <a href="register">
                        <button type="button"
                                class="mx-auto block transform transition-all hover:bg-gray-200 hover:scale-125 border border-black w-1/3">
                            Register
                        </button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once 'partials/footer.view.php' ?>
