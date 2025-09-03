@extends('front-end.templates.master')

@section('seo')
    <title>{{ env('APP_NAME') }} | Academic Confererences with ScholarlyMeet.com</title>
    <meta name="description" content="{{ env('APP_NAME') }} provides list of academic conference list worldwide. It's a way to find out academic conference in every discipline in the world. ">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="index" />
    <meta itemprop="name" content="{{ env('APP_NAME') }}" />
    <meta itemprop="url" content="{{ env('APP_URL') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ env('APP_NAME') }} | Academic Confererences with ScholarlyMeet.com" />
    <meta property="og:description" content="{{ env('APP_NAME') }} provides list of academic conference list worldwide. It's a way to find out academic conference in every discipline in the world." />
    <meta property="og:image" content="{{ asset('og-image.jpg') }}" />
    <meta property="og:url" content="{{ env('APP_URL') }}" />
    <meta name="format-detection" content="telephone=no">

    <link rel="canonical" href="{{ url()->full() }}" />
@endsection

@section('main-content')

    @include('front-end.templates.partials.hero')

{{--    @include('front-end.templates.partials.used-by')--}}


    @include('front-end.templates.partials.latest-conferences')

    {{--<section class="relative tracking-normal leading-6 text-zinc-900">--}}
    {{--    <!-- Section background (needs .relative class on parent and next sibling elements) -->--}}
    {{--    <div class="absolute top-1/2 leading-6 pointer-events-none lg:mt-0 md:mt-24 bg-zinc-900" aria-hidden="true" style="inset: 0px;" ></div>--}}
    {{--    <div class="absolute inset-x-0 bottom-0 p-px m-auto w-px h-20 leading-6 bg-gray-200" style="transform: matrix(1, 0, 0, 1, 0, 40);" ></div>--}}
    {{--    <div class="relative px-4 mx-auto max-w-6xl leading-6 sm:px-6">--}}
    {{--        <div class="py-12 md:py-20">--}}
    {{--            <!-- Section header -->--}}
    {{--            <div class="pb-12 mx-auto max-w-3xl text-center md:pb-20 text-slate-100">--}}
    {{--                <h2 class="mx-0 mt-0 mb-4 text-3xl font-extrabold tracking-tight leading-tight md:text-4xl" >--}}
    {{--                    Explore the solutions--}}
    {{--                </h2>--}}
    {{--                <p class="m-0 text-xl leading-7 text-slate-400">--}}
    {{--                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum--}}
    {{--                    dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat.--}}
    {{--                </p>--}}
    {{--            </div>--}}

    {{--            <!-- Items -->--}}
    {{--            <div class="grid gap-6 items-start mx-auto max-w-sm lg:max-w-none lg:grid-cols-3 md:max-w-2xl md:grid-cols-2" >--}}
    {{--                <!-- 1st item -->--}}
    {{--                <div class="flex relative flex-col items-center p-6 bg-white rounded" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;" >--}}
    {{--                    <svg class="block p-1 mb-2 -mt-1 w-16 h-16 align-middle" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" >--}}
    {{--                        <g fill="none" fill-rule="evenodd" class="text-zinc-900">--}}
    {{--                            <rect class="text-slate-600" width="64" height="64" rx="32" style="fill: currentcolor;" ></rect>--}}
    {{--                            <g stroke-width="2" class="">--}}
    {{--                                <path class="text-blue-300" d="M34.514 35.429l2.057 2.285h8M20.571 26.286h5.715l2.057 2.285" style="stroke: currentcolor;" ></path>--}}
    {{--                                <path class="text-white" d="M20.571 37.714h5.715L36.57 26.286h8" style="stroke: currentcolor;" ></path>--}}
    {{--                                <path class="text-blue-300" stroke-linecap="square" d="M41.143 34.286l3.428 3.428-3.428 3.429" style="stroke: currentcolor;" ></path>--}}
    {{--                                <path class="text-white" stroke-linecap="square" d="M41.143 29.714l3.428-3.428-3.428-3.429" style="stroke: currentcolor;" ></path>--}}
    {{--                            </g>--}}
    {{--                        </g>--}}
    {{--                    </svg>--}}
    {{--                    <h4 class="mx-0 mt-0 mb-1 text-xl font-bold leading-snug">--}}
    {{--                        Headless CMS--}}
    {{--                    </h4>--}}
    {{--                    <p class="m-0 text-center text-stone-500">--}}
    {{--                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--                    </p>--}}
    {{--                </div>--}}

    {{--                <!-- 2nd item -->--}}
    {{--                <div class="flex relative flex-col items-center p-6 bg-white rounded" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;" >--}}
    {{--                    <svg class="block p-1 mb-2 -mt-1 w-16 h-16 align-middle" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" >--}}
    {{--                        <g fill="none" fill-rule="evenodd" class="text-zinc-900">--}}
    {{--                            <rect class="text-slate-600" width="64" height="64" rx="32" style="fill: currentcolor;" ></rect>--}}
    {{--                            <g stroke-width="2" transform="translate(19.429 20.571)" class="">--}}
    {{--                                <circle class="text-white" stroke-linecap="square" cx="12.571" cy="12.571" r="1.143" style="stroke: currentcolor;" ></circle>--}}
    {{--                                <path class="text-white" d="M19.153 23.267c3.59-2.213 5.99-6.169 5.99-10.696C25.143 5.63 19.514 0 12.57 0 5.63 0 0 5.629 0 12.571c0 4.527 2.4 8.483 5.99 10.696" style="stroke: currentcolor;" ></path>--}}
    {{--                                <path class="text-blue-300" d="M16.161 18.406a6.848 6.848 0 003.268-5.835 6.857 6.857 0 00-6.858-6.857 6.857 6.857 0 00-6.857 6.857 6.848 6.848 0 003.268 5.835" style="stroke: currentcolor;" ></path>--}}
    {{--                            </g>--}}
    {{--                        </g>--}}
    {{--                    </svg>--}}
    {{--                    <h4 class="mx-0 mt-0 mb-1 text-xl font-bold leading-snug">--}}
    {{--                        Headless CMS--}}
    {{--                    </h4>--}}
    {{--                    <p class="m-0 text-center text-stone-500">--}}
    {{--                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--                    </p>--}}
    {{--                </div>--}}

    {{--                <!-- 3rd item -->--}}
    {{--                <div class="flex relative flex-col items-center p-6 bg-white rounded" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;" >--}}
    {{--                    <svg class="block p-1 mb-2 -mt-1 w-16 h-16 align-middle" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" >--}}
    {{--                        <g fill="none" fill-rule="evenodd" class="text-zinc-900">--}}
    {{--                            <rect class="text-slate-600" width="64" height="64" rx="32" style="fill: currentcolor;" ></rect>--}}
    {{--                            <g stroke-width="2" class="">--}}
    {{--                                <path class="text-blue-300" d="M34.743 29.714L36.57 32 27.43 43.429H24M24 20.571h3.429l1.828 2.286" style="stroke: currentcolor;" ></path>--}}
    {{--                                <path class="text-white" stroke-linecap="square" d="M34.743 41.143l1.828 2.286H40M40 20.571h-3.429L27.43 32l1.828 2.286" style="stroke: currentcolor;" ></path>--}}
    {{--                                <path class="text-blue-300" d="M36.571 32H40" style="stroke: currentcolor;" ></path>--}}
    {{--                                <path class="text-white" d="M24 32h3.429" stroke-linecap="square" style="stroke: currentcolor;" ></path>--}}
    {{--                            </g>--}}
    {{--                        </g>--}}
    {{--                    </svg>--}}
    {{--                    <h4 class="mx-0 mt-0 mb-1 text-xl font-bold leading-snug">--}}
    {{--                        Headless CMS--}}
    {{--                    </h4>--}}
    {{--                    <p class="m-0 text-center text-stone-500">--}}
    {{--                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--                    </p>--}}
    {{--                </div>--}}

    {{--                <!-- 4th item -->--}}
    {{--                <div class="flex relative flex-col items-center p-6 bg-white rounded" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;" >--}}
    {{--                    <svg class="block p-1 mb-2 -mt-1 w-16 h-16 align-middle" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" >--}}
    {{--                        <g fill="none" fill-rule="evenodd" class="text-zinc-900">--}}
    {{--                            <rect class="text-slate-600" width="64" height="64" rx="32" style="fill: currentcolor;" ></rect>--}}
    {{--                            <g stroke-width="2" class="">--}}
    {{--                                <path class="text-white" d="M32 37.714A5.714 5.714 0 0037.714 32a5.714 5.714 0 005.715 5.714" style="stroke: currentcolor;" ></path>--}}
    {{--                                <path class="text-white" d="M32 37.714a5.714 5.714 0 015.714 5.715 5.714 5.714 0 015.715-5.715M20.571 26.286a5.714 5.714 0 005.715-5.715A5.714 5.714 0 0032 26.286" style="stroke: currentcolor;" ></path>--}}
    {{--                                <path class="text-white" d="M20.571 26.286A5.714 5.714 0 0126.286 32 5.714 5.714 0 0132 26.286" style="stroke: currentcolor;" ></path>--}}
    {{--                                <path class="text-blue-300" d="M21.714 40h4.572M24 37.714v4.572M37.714 24h4.572M40 21.714v4.572" stroke-linecap="square" style="stroke: currentcolor;" ></path>--}}
    {{--                            </g>--}}
    {{--                        </g>--}}
    {{--                    </svg>--}}
    {{--                    <h4 class="mx-0 mt-0 mb-1 text-xl font-bold leading-snug">--}}
    {{--                        Headless CMS--}}
    {{--                    </h4>--}}
    {{--                    <p class="m-0 text-center text-stone-500">--}}
    {{--                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--                    </p>--}}
    {{--                </div>--}}

    {{--                <!-- 5th item -->--}}
    {{--                <div class="flex relative flex-col items-center p-6 bg-white rounded" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;" >--}}
    {{--                    <svg class="block p-1 mb-2 -mt-1 w-16 h-16 align-middle" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" >--}}
    {{--                        <g fill="none" fill-rule="evenodd" class="text-zinc-900">--}}
    {{--                            <rect class="text-slate-600" width="64" height="64" rx="32" style="fill: currentcolor;" ></rect>--}}
    {{--                            <g stroke-width="2" class="">--}}
    {{--                                <path class="text-white" d="M19.429 32a12.571 12.571 0 0021.46 8.89L23.111 23.11A12.528 12.528 0 0019.429 32z" style="stroke: currentcolor;" ></path>--}}
    {{--                                <path class="text-blue-300" d="M32 19.429c6.943 0 12.571 5.628 12.571 12.571M32 24a8 8 0 018 8" style="stroke: currentcolor;" ></path>--}}
    {{--                                <path class="text-white" d="M34.286 29.714L32 32" style="stroke: currentcolor;" ></path>--}}
    {{--                            </g>--}}
    {{--                        </g>--}}
    {{--                    </svg>--}}
    {{--                    <h4 class="mx-0 mt-0 mb-1 text-xl font-bold leading-snug">--}}
    {{--                        Headless CMS--}}
    {{--                    </h4>--}}
    {{--                    <p class="m-0 text-center text-stone-500">--}}
    {{--                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--                    </p>--}}
    {{--                </div>--}}

    {{--                <!-- 6th item -->--}}
    {{--                <div class="flex relative flex-col items-center p-6 bg-white rounded" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;" >--}}
    {{--                    <svg class="block p-1 mb-2 -mt-1 w-16 h-16 align-middle" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" >--}}
    {{--                        <g fill="none" fill-rule="evenodd" class="text-zinc-900">--}}
    {{--                            <rect class="text-slate-600" width="64" height="64" rx="32" style="fill: currentcolor;" ></rect>--}}
    {{--                            <g stroke-width="2" stroke-linecap="square" class="">--}}
    {{--                                <path class="text-white" d="M29.714 40.358l-4.777 2.51 1.349-7.865-5.715-5.57 7.898-1.147L32 21.13l3.531 7.155 7.898 1.147L40 32.775" style="stroke: currentcolor;" ></path>--}}
    {{--                                <path class="text-blue-300" d="M44.571 43.429H34.286M44.571 37.714H34.286" style="stroke: currentcolor;" ></path>--}}
    {{--                            </g>--}}
    {{--                        </g>--}}
    {{--                    </svg>--}}
    {{--                    <h4 class="mx-0 mt-0 mb-1 text-xl font-bold leading-snug">--}}
    {{--                        Headless CMS--}}
    {{--                    </h4>--}}
    {{--                    <p class="m-0 text-center text-stone-500">--}}
    {{--                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--                    </p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</section>--}}


    {{--<section class="tracking-normal leading-6 text-zinc-900">--}}
    {{--    <div class="px-4 mx-auto max-w-6xl leading-6 sm:px-6">--}}
    {{--        <div class="py-12 md:py-20">--}}
    {{--            <!-- Section header -->--}}
    {{--            <div class="pb-12 mx-auto max-w-3xl text-center md:pb-16">--}}
    {{--                <h1 class="mx-0 mt-0 mb-4 text-3xl font-extrabold tracking-tight leading-tight md:text-4xl" >--}}
    {{--                    Simple can help you scale internationally--}}
    {{--                </h1>--}}
    {{--                <p class="m-0 text-xl leading-7 text-stone-500">--}}
    {{--                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum--}}
    {{--                    dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat.--}}
    {{--                </p>--}}
    {{--            </div>--}}

    {{--            <!-- World illustration -->--}}
    {{--            <div class="flex flex-col items-center pt-12 md:pt-16">--}}
    {{--                <div class="relative text-zinc-900">--}}
    {{--                    <!-- Halo effect -->--}}
    {{--                    <svg class="block absolute top-1/2 left-1/2 align-middle pointer-events-none" width="800" height="800" viewBox="0 0 800 800" style="max-width: 200%; inset: 0px; transform: matrix(1, 0, 0, 1, -400, -400);" xmlns="http://www.w3.org/2000/svg" >--}}
    {{--                        <g class="opacity-75 text-neutral-400" style="fill: currentcolor;">--}}
    {{--                            <circle class="opacity-0" cx="400" cy="400" r="200" style="transform: scale(1); transform-origin: center center; animation: 10000ms linear 0s infinite normal none running pulseLoop;" ></circle>--}}
    {{--                            <circle class="opacity-0" cx="400" cy="400" r="200" style="transform: scale(1); transform-origin: center center; animation: 10000ms linear -3000ms infinite normal none running pulseLoop;" ></circle>--}}
    {{--                            <circle class="opacity-0" cx="400" cy="400" r="200" style="transform: scale(1); transform-origin: center center; animation: 10000ms linear -6000ms infinite normal none running pulseLoop;" ></circle>--}}
    {{--                        </g>--}}
    {{--                    </svg>--}}
    {{--                    <!-- Globe image -->--}}
    {{--                    <img class="block relative max-w-full h-auto align-middle rounded-full" src="https://preview.cruip.com/simple/images/planet.png" width="400" height="400" alt="Planet" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;" />--}}
    {{--                    <!-- Static dots -->--}}
    {{--                    <svg class="block absolute top-0 w-full h-auto align-middle" viewBox="0 0 400 400" style="left: 12%;" xmlns="http://www.w3.org/2000/svg" >--}}
    {{--                        <defs class="">--}}
    {{--                            <filter x="-41.7%" y="-34.2%" width="183.3%" height="185.6%" filterUnits="objectBoundingBox" id="world-ill-a" class="" >--}}
    {{--                                <feOffset dy="4" in="SourceAlpha" result="shadowOffsetOuter1" class="" ></feOffset>--}}
    {{--                                <feGaussianBlur stdDeviation="6" in="shadowOffsetOuter1" result="shadowBlurOuter1" class="" ></feGaussianBlur>--}}
    {{--                                <feColorMatrix values="0 0 0 0 0 0 0 0 0 0.439215686 0 0 0 0 0.956862745 0 0 0 0.32 0" in="shadowBlurOuter1" class="" ></feColorMatrix>--}}
    {{--                            </filter>--}}
    {{--                            <filter x="-83.3%" y="-68.5%" width="266.7%" height="271.2%" filterUnits="objectBoundingBox" id="world-ill-c" class="" >--}}
    {{--                                <feOffset dy="4" in="SourceAlpha" result="shadowOffsetOuter1" class="" ></feOffset>--}}
    {{--                                <feGaussianBlur stdDeviation="6" in="shadowOffsetOuter1" result="shadowBlurOuter1" class="" ></feGaussianBlur>--}}
    {{--                                <feColorMatrix values="0 0 0 0 0 0 0 0 0 0.439215686 0 0 0 0 0.956862745 0 0 0 0.32 0" in="shadowBlurOuter1" class="" ></feColorMatrix>--}}
    {{--                            </filter>--}}
    {{--                            <filter x="-7.3%" y="-23.8%" width="114.5%" height="147.6%" filterUnits="objectBoundingBox" id="world-ill-e" class="" >--}}
    {{--                                <feGaussianBlur stdDeviation="2" in="SourceGraphic" class="" ></feGaussianBlur>--}}
    {{--                            </filter>--}}
    {{--                            <ellipse id="world-ill-b" cx="51" cy="175.402" rx="24" ry="23.364" class="" ></ellipse>--}}
    {{--                            <ellipse id="world-ill-d" cx="246" cy="256.201" rx="12" ry="11.682" class="" ></ellipse>--}}
    {{--                            <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="world-ill-f" class="" >--}}
    {{--                                <stop stop-color="#0070F4" stop-opacity="0" offset="0%" class="" ></stop>--}}
    {{--                                <stop stop-color="#0070F4" stop-opacity=".64" offset="52.449%" class="" ></stop>--}}
    {{--                                <stop stop-color="#0070F4" stop-opacity="0" offset="100%" class="" ></stop>--}}
    {{--                            </linearGradient>--}}
    {{--                        </defs>--}}
    {{--                        <g transform="translate(0 -.818)" fill="none" fill-rule="evenodd" class="" >--}}
    {{--                            <use fill="#000" filter="url(#world-ill-a)" xlink:href="#world-ill-b" class="" ></use>--}}
    {{--                            <use fill="#0070F4" xlink:href="#world-ill-b" class=""></use>--}}
    {{--                            <use fill="#000" filter="url(#world-ill-c)" xlink:href="#world-ill-d" class="" ></use>--}}
    {{--                            <use fill="#0070F4" xlink:href="#world-ill-d" class=""></use>--}}
    {{--                            <ellipse fill-opacity=".32" fill="#0070F4" cx="293" cy="142.303" rx="8" ry="7.788" class="" ></ellipse>--}}
    {{--                            <ellipse fill-opacity=".64" fill="#0070F4" cx="250" cy="187.083" rx="6" ry="5.841" class="" ></ellipse>--}}
    {{--                            <ellipse fill-opacity=".64" fill="#0070F4" cx="13" cy="233.811" rx="2" ry="1.947" class="" ></ellipse>--}}
    {{--                            <ellipse fill="#0070F4" cx="29" cy="114.072" rx="2" ry="1.947" class="" ></ellipse>--}}
    {{--                            <path d="M258 256.2l87-29.204" stroke="#666" stroke-width="2" opacity=".16" filter="url(#world-ill-e)" class="" > </path>--}}
    {{--                            <path d="M258 251.333c111.333-40.237 141-75.282 89-105.136M136 103.364c66.667 4.543 104.667 32.45 114 83.72" stroke="url(#world-ill-f)" stroke-width="2" stroke-dasharray="2" class="" ></path>--}}
    {{--                        </g>--}}
    {{--                    </svg>--}}
    {{--                    <!-- Dynamic dots -->--}}
    {{--                    <svg class="block absolute left-1/2 max-w-full align-middle" width="48" height="48" viewBox="0 0 48 48" style="width: 12%;top: 45%; left: 50%;" xmlns="http://www.w3.org/2000/svg" >--}}
    {{--                        <g class="text-blue-600" style="fill: currentcolor;">--}}
    {{--                            <circle class="opacity-0" cx="24" cy="24" r="8" style="transform: scale(1); transform-origin: center center; animation: 6000ms linear -3000ms infinite normal none running pulseMiniLoop;" ></circle>--}}
    {{--                            <circle class="opacity-0" cx="24" cy="24" r="8" style="transform: scale(1); transform-origin: center center; animation: 6000ms linear -6000ms infinite normal none running pulseMiniLoop;" ></circle>--}}
    {{--                            <circle cx="24" cy="24" r="8" class=""></circle>--}}
    {{--                        </g>--}}
    {{--                    </svg>--}}
    {{--                    <svg class="block absolute max-w-full align-middle" width="48" height="48" viewBox="0 0 48 48" style="width: 12%;top: 19%; left: 46%;" xmlns="http://www.w3.org/2000/svg" >--}}
    {{--                        <g class="text-blue-600" style="fill: currentcolor;">--}}
    {{--                            <circle class="opacity-0" cx="24" cy="24" r="8" style="transform: scale(1); transform-origin: center center; animation: 6000ms linear 0s infinite normal none running pulseMiniLoop;" ></circle>--}}
    {{--                            <circle class="opacity-0" cx="24" cy="24" r="8" style="transform: scale(1); transform-origin: center center; animation: 6000ms linear -6000ms infinite normal none running pulseMiniLoop;" ></circle>--}}
    {{--                            <circle cx="24" cy="24" r="8" class=""></circle>--}}
    {{--                        </g>--}}
    {{--                    </svg>--}}
    {{--                    <!-- Avatars -->--}}
    {{--                    <img class="block absolute max-w-full h-auto align-middle" src="https://preview.cruip.com/simple/images/planet-avatar-01.png" width="261" height="105" alt="Planet avatar 01" style="width: 64%; top: -3%; right: -27%; transform: matrix(1, 0, 0, 1, 0, -5.04352); animation: 3s ease-in-out 0s infinite normal none running float;" />--}}
    {{--                    <img class="block absolute w-11/12 max-w-full h-auto align-middle" src="https://preview.cruip.com/simple/images/planet-avatar-02.png" width="355" height="173" alt="Planet avatar 02" style="width: 88.7%; bottom: -20%; right: -18%; animation: 3s ease-in-out 0s infinite normal none running float; transform: matrix(1, 0, 0, 1, 0, -8.41683);" />--}}
    {{--                    <!-- Black icon -->--}}
    {{--                    <svg class="block absolute top-0 w-1/5 max-w-full h-auto align-middle rounded-full" viewBox="0 0 80 80" style="width: 20%; left: 6%; box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;" xmlns="http://www.w3.org/2000/svg" >--}}
    {{--                        <circle class="text-zinc-800" cx="40" cy="40" r="40" style="fill: currentcolor;" ></circle>--}}
    {{--                        <path class="text-white" d="M30.19 41.221c7.074 3.299 12.957-4.7 20.03-1.401l1.769.824-1.419-3.883M43.988 50.877l3.887-1.41-1.769-.824c-2.19-1.021-3.475-2.651-4.42-4.512M38.724 36.91c-.944-1.86-2.23-3.49-4.42-4.512" stroke-linecap="square" stroke-width="2" style="stroke: currentcolor;" ></path>--}}
    {{--                    </svg>--}}
    {{--                    <!-- Blue icon -->--}}
    {{--                    <svg class="block absolute max-w-full h-auto align-middle rounded-full" viewBox="0 0 64 64" style="width: 16%; top: 32%; left: -27%; box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;" xmlns="http://www.w3.org/2000/svg" >--}}
    {{--                        <circle class="text-blue-600" cx="32" cy="32" r="32" style="fill: currentcolor;" ></circle>--}}
    {{--                        <path class="text-white" d="M20.733 31.416l18.127-8.452M43.039 31.926L24.913 40.38" stroke-width="2" fill="none" style="stroke: currentcolor;" ></path>--}}
    {{--                        <path class="text-white" stroke-linecap="square" d="M32.238 20.595l6.622 2.369-2.442 6.594M31.534 42.747l-6.621-2.368 2.442-6.595" stroke-width="2" fill="none" style="stroke: currentcolor;" ></path>--}}
    {{--                    </svg>--}}
    {{--                    <!-- White icon -->--}}
    {{--                    <svg class="block absolute max-w-full h-auto align-middle rounded-full" viewBox="0 0 64 64" style="width: 16%; top: 55%; right: -16%; box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;" xmlns="http://www.w3.org/2000/svg" >--}}
    {{--                        <circle class="text-zinc-50" fill="#FBFBFB" cx="32" cy="32" r="32" style="fill: currentcolor;" ></circle>--}}
    {{--                        <path class="text-neutral-600" d="M37.11 32.44l-1.69 4.646-8.458-3.078.676-1.859-4.773 1.42 2.744 4.156.677-1.858 9.396 3.42a.994.994 0 001.278-.587l2.03-5.576-1.88-.684zM27.037 30.878l1.691-4.646 8.457 3.078-.676 1.858 4.773-1.42-2.744-4.155-.676 1.858-9.397-3.42a.994.994 0 00-1.278.587l-2.03 5.576 1.88.684z" style="fill: currentcolor;" ></path>--}}
    {{--                    </svg>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</section>--}}


    {{--<section class="tracking-normal leading-6 text-zinc-900 bg-zinc-50">--}}
    {{--    <div class="px-4 mx-auto max-w-6xl leading-6 sm:px-6">--}}
    {{--        <div class="py-12 md:py-20">--}}
    {{--            <!-- Section header -->--}}
    {{--            <div class="pb-12 mx-auto max-w-3xl text-center md:pb-20">--}}
    {{--                <h2 class="m-0 text-3xl font-extrabold tracking-tight leading-tight md:text-4xl" >--}}
    {{--                    Latest articles--}}
    {{--                </h2>--}}
    {{--            </div>--}}

    {{--            <!-- Articles list -->--}}
    {{--            <div class="mx-auto max-w-sm md:max-w-none">--}}
    {{--                <div class="grid gap-12 items-start md:grid-cols-3 md:gap-x-6 md:gap-y-8" >--}}
    {{--                    <!-- 1st article -->--}}
    {{--                    <article class="flex flex-col h-full opacity-100 duration-700 pointer-events-auto" data-aos="zoom-y-out" style="transform: translateZ(0px) scale(1); transition-property: opacity, transform, -webkit-transform; transition-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94);" >--}}
    {{--                        <header class="text-zinc-900">--}}
    {{--                            <a class="block mb-6 cursor-pointer" href="blog-post.html">--}}
    {{--                                <figure class="overflow-hidden relative m-0 h-0 rounded" style="transform: translateZ(0px); padding-bottom: 64%;" >--}}
    {{--                                    <img class="block object-cover absolute w-full max-w-full h-full align-middle duration-700 ease-out" src="https://preview.cruip.com/simple/images/news-01.jpg" width="352" height="198" alt="News 01" style="inset: 0px; transform: matrix(1.05, 0, 0, 1.05, 0, 0); transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;" />--}}
    {{--                                </figure>--}}
    {{--                            </a>--}}
    {{--                            <div class="mb-3">--}}
    {{--                                <ul class="flex flex-wrap p-0 -m-1 text-xs font-medium leading-4" style="list-style: none;" >--}}
    {{--                                    <li class="m-1 text-left" style="list-style: outside none none;" >--}}
    {{--                                        <a class="inline-flex py-1 px-3 text-center bg-slate-500 rounded-full duration-150 ease-in-out cursor-pointer text-zinc-50" href="#0" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter; list-style: outside none none;" >Case studies</a >--}}
    {{--                                    </li>--}}
    {{--                                    <li class="m-1 text-left" style="list-style: outside none none;" >--}}
    {{--                                        <a class="inline-flex py-1 px-3 text-center bg-white rounded-full duration-150 ease-in-out cursor-pointer text-zinc-800" href="#0" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px; transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter; list-style: outside none none;" >Hubspot</a >--}}
    {{--                                    </li>--}}
    {{--                                </ul>--}}
    {{--                            </div>--}}
    {{--                            <h3 class="m-0 text-xl font-bold leading-snug">--}}
    {{--                                <a class="tracking-tight leading-7 cursor-pointer hover:underline" href="blog-post.html" >“How HubSpot saved 25% on developing costs by switching to Simple.”</a >--}}
    {{--                            </h3>--}}
    {{--                        </header>--}}
    {{--                        <footer class="flex items-center mt-4 text-sm leading-5">--}}
    {{--                            <div class="flex flex-shrink-0 mr-3 text-zinc-900">--}}
    {{--                                <a class="relative cursor-pointer" href="#0">--}}
    {{--                                    <span class="absolute -m-px" aria-hidden="true" style="inset: 0px;" >--}}
    {{--                                        <span class="absolute -m-px bg-white rounded-full" style="inset: 0px;" ></span>--}}
    {{--                                    </span>--}}
    {{--                                    <img class="block relative max-w-full h-auto align-middle rounded-full" src="https://preview.cruip.com/simple/images/news-author-01.jpg" width="32" height="32" alt="Author 01" />--}}
    {{--                                </a>--}}
    {{--                            </div>--}}
    {{--                            <div class="text-zinc-900">--}}
    {{--                                <span class="text-stone-500">By </span>--}}
    {{--                                <a class="font-medium cursor-pointer hover:underline" href="#0" >Lisa Allison</a >--}}
    {{--                            </div>--}}
    {{--                        </footer>--}}
    {{--                    </article>--}}

    {{--                    <!-- 1st article -->--}}
    {{--                    <article class="flex flex-col h-full opacity-100 duration-700 pointer-events-auto" data-aos="zoom-y-out" style="transform: translateZ(0px) scale(1); transition-property: opacity, transform, -webkit-transform; transition-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94);" >--}}
    {{--                        <header class="text-zinc-900">--}}
    {{--                            <a class="block mb-6 cursor-pointer" href="blog-post.html">--}}
    {{--                                <figure class="overflow-hidden relative m-0 h-0 rounded" style="transform: translateZ(0px); padding-bottom: 64%;" >--}}
    {{--                                    <img class="block object-cover absolute w-full max-w-full h-full align-middle duration-700 ease-out" src="https://preview.cruip.com/simple/images/news-01.jpg" width="352" height="198" alt="News 01" style="inset: 0px; transform: matrix(1.05, 0, 0, 1.05, 0, 0); transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;" />--}}
    {{--                                </figure>--}}
    {{--                            </a>--}}
    {{--                            <div class="mb-3">--}}
    {{--                                <ul class="flex flex-wrap p-0 -m-1 text-xs font-medium leading-4" style="list-style: none;" >--}}
    {{--                                    <li class="m-1 text-left" style="list-style: outside none none;" >--}}
    {{--                                        <a class="inline-flex py-1 px-3 text-center bg-slate-500 rounded-full duration-150 ease-in-out cursor-pointer text-zinc-50" href="#0" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter; list-style: outside none none;" >Case studies</a >--}}
    {{--                                    </li>--}}
    {{--                                    <li class="m-1 text-left" style="list-style: outside none none;" >--}}
    {{--                                        <a class="inline-flex py-1 px-3 text-center bg-white rounded-full duration-150 ease-in-out cursor-pointer text-zinc-800" href="#0" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px; transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter; list-style: outside none none;" >Hubspot</a >--}}
    {{--                                    </li>--}}
    {{--                                </ul>--}}
    {{--                            </div>--}}
    {{--                            <h3 class="m-0 text-xl font-bold leading-snug">--}}
    {{--                                <a class="tracking-tight leading-7 cursor-pointer hover:underline" href="blog-post.html" >“How HubSpot saved 25% on developing costs by switching to Simple.”</a >--}}
    {{--                            </h3>--}}
    {{--                        </header>--}}
    {{--                        <footer class="flex items-center mt-4 text-sm leading-5">--}}
    {{--                            <div class="flex flex-shrink-0 mr-3 text-zinc-900">--}}
    {{--                                <a class="relative cursor-pointer" href="#0">--}}
    {{--                                    <span class="absolute -m-px" aria-hidden="true" style="inset: 0px;" >--}}
    {{--                                        <span class="absolute -m-px bg-white rounded-full" style="inset: 0px;" ></span>--}}
    {{--                                    </span>--}}
    {{--                                    <img class="block relative max-w-full h-auto align-middle rounded-full" src="https://preview.cruip.com/simple/images/news-author-01.jpg" width="32" height="32" alt="Author 01" />--}}
    {{--                                </a>--}}
    {{--                            </div>--}}
    {{--                            <div class="text-zinc-900">--}}
    {{--                                <span class="text-stone-500">By </span>--}}
    {{--                                <a class="font-medium cursor-pointer hover:underline" href="#0" >Lisa Allison</a >--}}
    {{--                            </div>--}}
    {{--                        </footer>--}}
    {{--                    </article>--}}

    {{--                    <!-- 1st article -->--}}
    {{--                    <article class="flex flex-col h-full opacity-100 duration-700 pointer-events-auto" data-aos="zoom-y-out" style="transform: translateZ(0px) scale(1); transition-property: opacity, transform, -webkit-transform; transition-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94);" >--}}
    {{--                        <header class="text-zinc-900">--}}
    {{--                            <a class="block mb-6 cursor-pointer" href="blog-post.html">--}}
    {{--                                <figure class="overflow-hidden relative m-0 h-0 rounded" style="transform: translateZ(0px); padding-bottom: 64%;" >--}}
    {{--                                    <img class="block object-cover absolute w-full max-w-full h-full align-middle duration-700 ease-out" src="https://preview.cruip.com/simple/images/news-01.jpg" width="352" height="198" alt="News 01" style="inset: 0px; transform: matrix(1.05, 0, 0, 1.05, 0, 0); transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;" />--}}
    {{--                                </figure>--}}
    {{--                            </a>--}}
    {{--                            <div class="mb-3">--}}
    {{--                                <ul class="flex flex-wrap p-0 -m-1 text-xs font-medium leading-4" style="list-style: none;" >--}}
    {{--                                    <li class="m-1 text-left" style="list-style: outside none none;" >--}}
    {{--                                        <a class="inline-flex py-1 px-3 text-center bg-slate-500 rounded-full duration-150 ease-in-out cursor-pointer text-zinc-50" href="#0" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter; list-style: outside none none;" >Case studies</a >--}}
    {{--                                    </li>--}}
    {{--                                    <li class="m-1 text-left" style="list-style: outside none none;" >--}}
    {{--                                        <a class="inline-flex py-1 px-3 text-center bg-white rounded-full duration-150 ease-in-out cursor-pointer text-zinc-800" href="#0" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px; transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter; list-style: outside none none;" >Hubspot</a >--}}
    {{--                                    </li>--}}
    {{--                                </ul>--}}
    {{--                            </div>--}}
    {{--                            <h3 class="m-0 text-xl font-bold leading-snug">--}}
    {{--                                <a class="tracking-tight leading-7 cursor-pointer hover:underline" href="blog-post.html" >“How HubSpot saved 25% on developing costs by switching to Simple.”</a >--}}
    {{--                            </h3>--}}
    {{--                        </header>--}}
    {{--                        <footer class="flex items-center mt-4 text-sm leading-5">--}}
    {{--                            <div class="flex flex-shrink-0 mr-3 text-zinc-900">--}}
    {{--                                <a class="relative cursor-pointer" href="#0">--}}
    {{--                                    <span class="absolute -m-px" aria-hidden="true" style="inset: 0px;" >--}}
    {{--                                        <span class="absolute -m-px bg-white rounded-full" style="inset: 0px;" ></span>--}}
    {{--                                    </span>--}}
    {{--                                    <img class="block relative max-w-full h-auto align-middle rounded-full" src="https://preview.cruip.com/simple/images/news-author-01.jpg" width="32" height="32" alt="Author 01" />--}}
    {{--                                </a>--}}
    {{--                            </div>--}}
    {{--                            <div class="text-zinc-900">--}}
    {{--                                <span class="text-stone-500">By </span>--}}
    {{--                                <a class="font-medium cursor-pointer hover:underline" href="#0" >Lisa Allison</a >--}}
    {{--                            </div>--}}
    {{--                        </footer>--}}
    {{--                    </article>--}}

    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</section>--}}

@endsection
