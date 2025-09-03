<footer class="leading-6 text-gray-800 mt-12 mb-0 bg-white">
    <div class="px-4 mx-auto max-w-6xl leading-6 sm:px-6">
        <div class="py-8 text-gray-800 md:py-12">
            <!-- Top area -->
            <div class="flex flex-col justify-center items-center mb-4 md:mb-6 md:flex-row md:justify-between" >
                <div class="flex-shrink-0 mr-4">
                    <!-- Logo -->
                    <a class="inline-flex mb-8 cursor-pointer md:mb-0" href="{{ route('home') }}" aria-label="Cruip" >
                        {{ env('APP_NAME') }}
                    </a>
                </div>
                <!-- Social links -->
{{--                <div class="flex items-center mb-4 md:order-2 md:mb-0 md:ml-4">--}}
{{--                    <div class="text-xl leading-normal text-slate-500" style='' >--}}
{{--                        Follow us--}}
{{--                    </div>--}}
{{--                    <ul class="inline-flex p-0 my-0 mr-0 ml-4" style="list-style: none;">--}}
{{--                        <li class="text-left" style="list-style: outside none none;">--}}
{{--                            <a class="flex justify-center items-center text-slate-500 bg-slate-100 rounded-full duration-150 ease-in-out cursor-pointer" href="#0" aria-label="Twitter" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter; list-style: outside none none;" >--}}
{{--                                <svg class="block w-8 h-8 align-middle" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" style="fill: currentcolor; list-style: outside none none;" >--}}
{{--                                    <path d="m13.063 9 3.495 4.475L20.601 9h2.454l-5.359 5.931L24 23h-4.938l-3.866-4.893L10.771 23H8.316l5.735-6.342L8 9h5.063Zm-.74 1.347h-1.457l8.875 11.232h1.36l-8.778-11.232Z" class="" style="list-style: outside none none;" ></path>--}}
{{--                                </svg>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="mr-0 ml-3 text-left" style="list-style: outside none none;" >--}}
{{--                            <a class="flex justify-center items-center text-slate-500 bg-slate-100 rounded-full duration-150 ease-in-out cursor-pointer" href="#0" aria-label="Github" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter; list-style: outside none none;" >--}}
{{--                                <svg class="block w-8 h-8 align-middle" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" style="fill: currentcolor; list-style: outside none none;" >--}}
{{--                                    <path d="M16 8.2c-4.4 0-8 3.6-8 8 0 3.5 2.3 6.5 5.5 7.6.4.1.5-.2.5-.4V22c-2.2.5-2.7-1-2.7-1-.4-.9-.9-1.2-.9-1.2-.7-.5.1-.5.1-.5.8.1 1.2.8 1.2.8.7 1.3 1.9.9 2.3.7.1-.5.3-.9.5-1.1-1.8-.2-3.6-.9-3.6-4 0-.9.3-1.6.8-2.1-.1-.2-.4-1 .1-2.1 0 0 .7-.2 2.2.8.6-.2 1.3-.3 2-.3s1.4.1 2 .3c1.5-1 2.2-.8 2.2-.8.4 1.1.2 1.9.1 2.1.5.6.8 1.3.8 2.1 0 3.1-1.9 3.7-3.7 3.9.3.4.6.9.6 1.6v2.2c0 .2.1.5.6.4 3.2-1.1 5.5-4.1 5.5-7.6-.1-4.4-3.7-8-8.1-8z" class="" style="list-style: outside none none;" ></path>--}}
{{--                                </svg>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="mr-0 ml-3 text-left" style="list-style: outside none none;" >--}}
{{--                            <a class="flex justify-center items-center text-slate-500 bg-slate-100 rounded-full duration-150 ease-in-out cursor-pointer" href="#0" aria-label="Telegram" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter; list-style: outside none none;" >--}}
{{--                                <svg class="block w-8 h-8 align-middle" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" style="fill: currentcolor; list-style: outside none none;" >--}}
{{--                                    <path d="M22.968 10.276a.338.338 0 0 0-.232-.253 1.192 1.192 0 0 0-.63.045s-14.019 5.038-14.82 5.596c-.172.121-.23.19-.259.272-.138.4.293.573.293.573l3.613 1.177a.388.388 0 0 0 .183-.011c.822-.519 8.27-5.222 8.7-5.38.068-.02.118 0 .1.049-.172.6-6.606 6.319-6.64 6.354a.138.138 0 0 0-.05.118l-.337 3.528s-.142 1.1.956 0a30.66 30.66 0 0 1 1.9-1.738c1.242.858 2.58 1.806 3.156 2.3a1 1 0 0 0 .732.283.825.825 0 0 0 .7-.622s2.561-10.275 2.646-11.658c.008-.135.021-.217.021-.317a1.177 1.177 0 0 0-.032-.316Z" class="" style="list-style: outside none none;" ></path>--}}
{{--                                </svg>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>

            <!-- Bottom area -->
            <div class="text-center md:flex md:items-center md:justify-between text-slate-800">
                <!-- Left links -->
{{--                <div class="mb-2 text-sm font-medium md:order-1 md:mb-0" style="line-height: 1.5715;" >--}}
{{--                    <ul class="inline-flex flex-wrap p-0 m-0" style="list-style: none; line-height: 1.5715;" >--}}
{{--                        <li class="px-2" style="content: normal; list-style: outside none none;" >--}}
{{--                            <a class="text-gray-500 cursor-pointer hover:underline" href="#0" style="list-style: outside none none;" >Terms</a >--}}
{{--                        </li>--}}
{{--                        <li class="px-2" style="content: normal; list-style: outside none none;" >--}}
{{--                            <a class="text-gray-500 cursor-pointer hover:underline" href="#0" style="list-style: outside none none;" >Privacy</a >--}}
{{--                        </li>--}}
{{--                        <li class="px-2" style="content: normal; list-style: outside none none;" >--}}
{{--                            <a class="text-gray-500 cursor-pointer hover:underline" href="#0" style="list-style: outside none none;" >Guidelines</a >--}}
{{--                        </li>--}}
{{--                        <li class="px-2" style="content: normal; list-style: outside none none;" >--}}
{{--                            <a class="text-gray-500 cursor-pointer hover:underline" href="#0" style="list-style: outside none none;" >Why Choose Us?</a >--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

                <!-- Copyright -->
                <div class="text-sm text-gray-500" style="line-height: 1.5715;">
                    @ {{ env('APP_NAME') }} {{ date('Y') }} | All rights reserved
                </div>
            </div>
        </div>
    </div>
</footer>
