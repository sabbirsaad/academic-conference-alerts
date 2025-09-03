<!-- Site branding -->
<div class="flex-shrink-0 mr-4 text-slate-900">
    <!-- Logo -->
    <a class="block cursor-pointer font-bold" href="{{ route('home') }}" aria-label="{{ env('APP_NAME') }} logo">
        {{ env('APP_NAME') }}
    </a>
</div>

<!-- Desktop navigation -->
<nav class="hidden md:flex md:flex-grow">
    <!-- Desktop menu links -->
    <ul class="flex flex-wrap flex-grow justify-end items-center p-0 m-0 text-slate-900" style="list-style: none;" >
        <li class="text-left" style="list-style: outside none none;">
            <a class="flex items-center py-2 px-3 duration-150 ease-in-out cursor-pointer lg:px-5 text-stone-500" href="" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter; list-style: outside none none;" >
                Events by Country
            </a >
        </li>
        <li class="text-left" style="list-style: outside none none;">
            <a class="flex items-center py-2 px-3 duration-150 ease-in-out cursor-pointer lg:px-5 text-stone-500" href="" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter; list-style: outside none none;" >
                Events by Category
            </a >
        </li>
        <!-- 1st level: hover -->
        <li class="relative text-left" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" style="list-style: outside none none;" >
    </ul>

    <!-- Desktop sign in links -->
    <ul class="flex flex-wrap flex-grow justify-end items-center p-0 m-0 text-slate-900" style="list-style: none;" >
        <li class="text-left" style="list-style: outside none none;">
            <a class="flex items-center py-3 px-5 font-medium duration-150 ease-in-out cursor-pointer text-stone-500" href="" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter; list-style: outside none none;" >Sign in</a >
        </li>
        <li class="text-left" style="list-style: outside none none;">
            <a class="inline-flex justify-center items-center py-2 px-4 ml-3 font-medium leading-snug text-gray-200 rounded border border-transparent border-solid duration-150 ease-in-out cursor-pointer bg-zinc-900" href="" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter; box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px; list-style: outside none none;" >
                <span class="leading-5" style="list-style: outside none none;" >Sign up</span >
                <svg class="block flex-shrink-0 ml-2 -mr-1 w-3 h-3 leading-5 align-middle text-neutral-400" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="fill: currentcolor; list-style: outside none none;" >
                    <path d="M11.707 5.293L7 .586 5.586 2l3 3H0v2h8.586l-3 3L7 11.414l4.707-4.707a1 1 0 000-1.414z" fill-rule="nonzero" class="" style="list-style: outside none none;" ></path>
                </svg>
            </a>
        </li>
    </ul>
</nav>

<!-- Mobile menu -->
<div class="flex md:hidden" x-data="{ expanded: false }">
    <!-- Hamburger button -->
    <button class="p-0 m-0 text-center normal-case bg-transparent bg-none cursor-pointer" :class="{ 'active': expanded }" @click.stop="expanded = !expanded" aria-controls="mobile-nav" :aria-expanded="expanded" aria-expanded="false" style="font-size: 128%;" >
        <span class="border-gray-200 border-solid sr-only">Menu</span>
        <svg class="block w-6 h-6 align-middle" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="fill: currentcolor;" >
            <rect y="4" width="24" height="2" class=""></rect>
            <rect y="11" width="24" height="2" class=""></rect>
            <rect y="18" width="24" height="2" class=""></rect>
        </svg>
    </button>

    <!-- Mobile navigation -->
    <nav id="mobile-nav" class="hidden overflow-scroll absolute left-0 top-full z-20 pb-16 w-full h-screen bg-white" @click.outside="expanded = false" @keydown.escape.window="expanded = false" x-show="expanded" x-transition:enter="chrse csszi c6gcv c6mr6" x-transition:enter-start="cl77d cluip" x-transition:enter-end="cozgg ckqdz" x-transition:leave="chrse csszi c6gcv" x-transition:leave-start="cozgg" x-transition:leave-end="cl77d" style="display: none;" >
        <ul class="py-2 px-5 m-0 text-slate-900" style="list-style: none;">
            <li class="text-left" style="list-style: outside none none;">
                <a class="flex py-2 cursor-pointer text-stone-500" href="" style="list-style: outside none none;" >Pricing</a > </li>
            <li class="text-left" style="list-style: outside none none;">
                <a class="flex py-2 cursor-pointer text-stone-500" href="" style="list-style: outside none none;" >About us</a > </li>
            <li class="text-left" style="list-style: outside none none;">
                <a class="flex py-2 cursor-pointer text-stone-500" href="" style="list-style: outside none none;" >Tutorials</a >
            </li>
            <li class="text-left" style="list-style: outside none none;">
                <a class="flex py-2 cursor-pointer text-stone-500" href="" style="list-style: outside none none;" >Blog</a >
            </li>
            <li class="py-2 my-2 text-left border-gray-200 border-solid border-x-0 border-y" style="border-width: 0px; list-style: outside none none;" >
                <span class="flex py-2 text-stone-500" style="list-style: outside none none;" >Resources</span >
                <ul class="py-0 pr-0 pl-4 m-0" style="list-style: none;">
                    <li class="" style="list-style: outside none none;">
                        <a class="flex py-2 text-sm font-medium leading-5 cursor-pointer text-stone-500" href="" style="list-style: outside none none;" >Documentation</a >
                    </li>
                    <li class="" style="list-style: outside none none;">
                        <a class="flex py-2 text-sm font-medium leading-5 cursor-pointer text-stone-500" href="" style="list-style: outside none none;" >Support center</a >
                    </li>
                    <li class="" style="list-style: outside none none;">
                        <a class="flex py-2 text-sm font-medium leading-5 cursor-pointer text-stone-500" href="" style="list-style: outside none none;" >404</a >
                    </li>
                </ul>
            </li>
            <li class="text-left" style="list-style: outside none none;">
                <a class="flex justify-center py-2 w-full font-medium cursor-pointer text-stone-500" href="/dashboard" style="list-style: outside none none;" >Sign in</a >
            </li>
            <li class="text-left" style="list-style: outside none none;">
                <a class="inline-flex justify-center items-center py-2 px-4 my-2 w-full font-medium leading-snug text-gray-200 rounded border border-transparent border-solid duration-150 ease-in-out cursor-pointer bg-zinc-900" href="{{ route('join') }}" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter; box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px; list-style: outside none none;" >
                    <span class="leading-5" style="list-style: outside none none;" >Sign up</span >
                    <svg class="block flex-shrink-0 ml-2 -mr-1 w-3 h-3 leading-5 align-middle text-neutral-400" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="fill: currentcolor; list-style: outside none none;" >
                        <path d="M11.707 5.293L7 .586 5.586 2l3 3H0v2h8.586l-3 3L7 11.414l4.707-4.707a1 1 0 000-1.414z" fill="#999" fill-rule="nonzero" class="" style="list-style: outside none none;" ></path>
                    </svg>
                </a>
            </li>
        </ul>
    </nav>
</div>
