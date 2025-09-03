<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/alpinejs" defer></script>
    @yield('seo')

    @yield('extra-css')
</head>
<body class="bg-slate-50">

@include('front-end.templates.partials.header')

@yield('main-content')

<section class="tracking-normal leading-6 text-zinc-900 pt-12">
    {{--    <div class="px-4 mx-auto max-w-6xl leading-6 sm:px-6">--}}
    {{--        <div class="py-10 px-8 tracking-normal leading-6 bg-slate-600 rounded opacity-100 duration-700 pointer-events-auto md:px-12 md:py-16 text-zinc-900" data-aos="zoom-y-out" style="transform: translateZ(0px) scale(1); transition-property: opacity, transform, -webkit-transform; box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px; transition-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94);" >--}}
    {{--            <div class="flex flex-col justify-between items-center leading-6 lg:flex-row">--}}
    {{--                <!-- CTA content -->--}}
    {{--                <div class="mb-6 text-center lg:mr-16 lg:mb-0 lg:text-left">--}}
    {{--                    <h3 class="mx-0 mt-0 mb-2 text-3xl font-bold leading-tight text-left text-white" >--}}
    {{--                        Ready to get started?--}}
    {{--                    </h3>--}}
    {{--                    <p class="m-0 text-lg leading-7 text-left text-white opacity-75">--}}
    {{--                        We have a generous free tier available to get you started right away.--}}
    {{--                    </p>--}}
    {{--                </div>--}}

    {{--                <!-- CTA button -->--}}
    {{--                <div class="text-zinc-900">--}}
    {{--                    <a class="inline-flex justify-center items-center py-3 px-8 font-medium leading-snug text-slate-600 rounded border border-transparent border-solid duration-150 ease-in-out cursor-pointer" href="#0" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter; box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px; background-image: linear-gradient(to right, rgb(241, 245, 249), rgb(255, 255, 255));" >Get started for free</a >--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

</section>

@include('front-end.templates.partials.footer')

</body>
</html>

