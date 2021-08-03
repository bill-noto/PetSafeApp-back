
<!--Header-->

<header class="sticky top-0 z-50">
    <div id="head" class="flex h-24 justify-around bg-black bg-white border-b border-primary z-50">
        <div id="logo" class="flex flex-col justify-center block w-1/4">
            <h1 class="text-3xl">
                <a class="inline-block" href="http://localhost:8080/#/"><strong>Pet</strong>Safe</a>
            </h1>
            <h1 class="text-2xl ml-2">
                <a class="inline-block" href="http://localhost:8080/#/">Services</a>
            </h1>
        </div>
        <nav class="w-3/5 xl:w-2/5 sm:flex sm:items-center sm:justify-end">
            <ul class="flex xl:justify-around justify-end items-center h-full w-full sm:hidden">
                <a class="top bg-transparent p-2" href="http://localhost:8080/#/">
                    <li>HOME</li>
                </a>
                <a class="top bg-transparent p-2" href="http://localhost:8080/#/news">
                    <li>NEWS</li>
                </a>
                <a class="top bg-transparent p-2" href="http://localhost:8080/#/about">
                    <li>ABOUT</li>
                </a>
                <a class="top bg-transparent p-2" href="http://fp-petsafeapp-back.test">
                    <li>LOGIN/REGISTER</li>
                </a>
            </ul>
            <img id="burger" src="../../core/resources/assets/menu.png" width="20" height="20"
                 class="cursor-pointer hidden sm:inline-block" alt="burgerMenu">
        </nav>
    </div>

    <!--Small screen burger menu-->

    <ul id="bMenu" class="bg-white text-center h-full w-full hidden border-b border-primary">
        <li class="hover:underline bg-transparent p-2">
            <a class="w-full" href="http://localhost:8080/#/">HOME</a>
        </li>
        <li class="hover:underline bg-transparent p-2">
            <a class="w-full" href="http://localhost:8080/#/news">NEWS</a>
        </li>
        <li class="hover:underline bg-transparent p-2">
            <a class="w-full" href="http://localhost:8080/#/about">ABOUT</a>
        </li>
        <li class="hover:underline bg-transparent p-2"><a class="w-full" href="http://fp-petsafeapp-back.test">LOGIN/REGISTER</a></li>
    </ul>
</header>
