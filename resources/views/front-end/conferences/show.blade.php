@extends('front-end.templates.master')

@section('seo')
    <title>{{ Str::limit(strip_tags(trim($conference->title)), 70) }}</title>
    <meta itemprop="name" content="{{ env('APP_NAME') }}" />
    <meta itemprop="url" content="{{ env('APP_URL') }}" />

    <meta name="robots" content="index, follow">
    <meta name="description" content="{{ Str::limit(strip_tags(trim($conference->title .'. '. $conference->details)), 160) }}" />
    <meta name="keywords" content="Academic Conference, Conference Alerts" />
    <link rel="canonical" href="{{ url()->full() }}" />
    <link rel="alternate" type="application/rss+xml" href="https://scholarshipunion.com/sitemap.xml" />

    <meta name="dc.language" content="en-US" />
    <meta name="dc.language.iso" content="en_US" />
    <meta name="dc.publisher" content="{{ env('APP_NAME') }}" />
    <meta name="dc.title" content="{{ Str::limit(strip_tags(trim($conference->title)), 70) }}" />
    <meta name="dc.description" content="{{ Str::limit(strip_tags(trim($conference->title .'. '. $conference->details)), 160) }}" />
    <meta name="dc.date.issued" content="{{ \Carbon\Carbon::parse($conference->created_at)->format('Y-m-d') }}" />

    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:title" content="{{ Str::limit(strip_tags(trim($conference->title)), 70) }}" />
    <meta property="og.description" content="{{ Str::limit(strip_tags(trim($conference->title .'. '. $conference->details)), 160) }}" />
    <meta property="og:type" content="website" />
    <meta property="og:image:width" content="1080" />
    <meta property="og:image:height" content="1350" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <meta property="og:locale" content="en_US" />
    <meta property="article:published_time" content="{{ $conference->created_at }}" />
    <meta property="article:modified_time" content="{{ $conference->updated_at }}" />
    <meta property="article:section" content="Academic Conference, Conference Alerts" />

    <meta property="twitter:url" content="{{ url()->full() }}" />
    <meta property="twitter:title" content="{{ Str::limit(strip_tags(trim($conference->title)), 70) }}" />
    <meta property="twitter.description" content="{{ Str::limit(strip_tags(trim($conference->title .'. '. $conference->details)), 160) }}" />
    <meta property="twitter:domain" content="{{ env('APP_URL') }}" />
{{--    <meta property="twitter:site" content="@scholarshipux" />--}}
    <meta property="twitter:card" content="summary" />
@stop

@section('extra-css')
    <style>
        .conference-content {
            color: #1e293b;
            line-height: 1.75rem;
        }

        .conference-content p {
            padding: .5rem 0;
        }

        .conference-content strong {
            font-weight: bold;
        }

        .conference-content h2 {
            font-size: 2rem;
            padding: 1rem 0;
        }

        .conference-content h3 {
            font-size: 1.5rem;
            padding: 1rem 0;
        }

        .conference-content ul, ol {
            list-style-position: outside;
            display: block;
            list-style-type: disc;
            margin-block-start: 1em;
            margin-block-end: 1em;
            padding-inline-start: 40px;
        }

        .conference-content ul li,ol li {
            padding: .5rem 0;
            list-style-position: inside;
            text-indent: -1.5rem;
        }

        .conference-content ul li::marker {
            color: #cbd5e1;
        }

        .conference-content blockquote {
            border-left: 3px solid #e2e8f0;
            background-color: #f8fafc;
            padding: 1.25rem 1.5rem;
            margin-top: 1rem;
            line-height: 2rem;
        }

        .conference-content a {
            color: #0ea5e9;
            font-weight: bolder;
        }

        .conference-content a:hover {
            color: #0369a1;
            text-decoration: underline;
        }

        table {
            min-width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 2px 8px;
            text-align: left;
        }

        thead {
            background-color: #f3f4f6;
        }

        th {
            font-weight: 600;
            color: #4b5563;
            text-transform: uppercase;
        }

        tbody {
            background-color: #ffffff;
        }

        tr {
            background: #f8fafc;
            border-bottom: 1px solid #e5e7eb;
        }
    </style>
@endsection

@section('main-content')

    <div class="bg-white">
        <div class="px-4 mx-auto max-w-6xl leading-6 sm:px-6">
            <div class="tracking-normal pt-32 leading-6 text-gray-800 md:flex md:justify-between">
                <!-- Sidebar -->
                <aside class="mb-8 leading-6 lg:ml-20 lg:w-64 md:order-1 md:mb-0 md:ml-12 md:w-64 md:flex-shrink-0" >
                    <div class="sticky top-8 text-gray-800">
                        <div class="relative p-5 bg-gray-50 rounded-xl border border-gray-200 border-solid" >
                            <div class="mb-6 text-center">
                                <h2 class="m-0 text-lg font-bold leading-normal">
                                    {{ optional($conference->organizers->first())->name }}
                                </h2>
                            </div>

                            <div class="flex justify-center mb-5 md:justify-start">
                                <ul class="inline-flex flex-col p-0 m-0" style="list-style: none;">
                                    <li class="flex gap-4 items-center text-left" style="list-style: outside none none;" >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                        </svg>

                                        <span class="text-sm text-gray-600" style="line-height: 1.5715; list-style: outside none none;">
                                            {{ \Carbon\Carbon::parse($conference->start_at)->format('d F Y') }}
                                        </span >
                                    </li>
                                    <li class="flex gap-4 items-center mt-2 mb-0 text-left" style="list-style: outside none none;" >
                                        <div class="w-1/12">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                            </svg>
                                        </div>

                                        <span class="w-11/12 text-sm text-gray-600" style="line-height: 1.5715; list-style: outside none none;" >
                                            {{ $conference->address->address_line_1 }},
                                            {{ $conference->address->address_line_2 }},
                                            {{ $conference->address->city }},
                                            {{ $conference->address->state }},
                                            {{ $conference->address->postal_code }},
                                            {{ $conference->address->country->name }}
                                        </span >
                                    </li>
                                </ul>
                            </div>

                            <div class="mx-auto mb-5 max-w-xs">
                                <a class="inline-flex justify-center items-center py-2 px-5 w-full text-sm font-medium leading-5 text-white whitespace-nowrap bg-indigo-500 rounded-full duration-150 ease-in-out cursor-pointer" href="{{ $conference->url }}" target="_blank" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter; box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;" >
                                    Visit Official Website
                                    <span class="ml-1 text-indigo-200 transition-transform">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                        </svg>
                                    </span>
                                </a>
                            </div>

                            <div class="text-center">
                                <a class="text-sm font-medium text-indigo-500 cursor-pointer hover:underline" href="#0" style="line-height: 1.5715;">
                                    {{ $conference->type }}
                                </a >
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- Main content -->
                <div class="leading-6 md:flex-grow">
                    <!-- Job description -->
                    <div class="pb-8 text-gray-800">
                        <div class="mb-4">
                            <a class="font-medium text-slate-500 cursor-pointer" href="{{ route('home') }}">
                                <span class=""></span> All Conferences</a>
                        </div>
                        <h1 class="mx-0 mt-0 mb-10 font-sans text-4xl font-extrabold" style="line-height: 1.277;">
                            {{ $conference->title }}
                        </h1>
                        <!-- Job description -->
                        <div class="mb-8">
                            <div class="conference-content">
                                <div class="text-gray-500">
                                    <p class="mx-0 mt-3 mb-0">
                                        {!! $conference->details !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Social share -->
{{--                        <div class="flex justify-end items-center">--}}
{{--                            <div class="text-xl leading-normal text-gray-400" style='' >--}}
{{--                                Share Conference--}}
{{--                            </div>--}}
{{--                            <ul class="inline-flex p-0 my-0 mr-0 ml-4" style="list-style: none;">--}}
{{--                                <li class="text-left" style="list-style: outside none none;">--}}
{{--                                    <a class="flex justify-center items-center text-indigo-500 bg-indigo-100 rounded-full duration-150 ease-in-out cursor-pointer" href="#0" aria-label="Twitter" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter; list-style: outside none none;" >--}}
{{--                                        <svg class="block w-8 h-8 align-middle" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" style="fill: currentcolor; list-style: outside none none;" >--}}
{{--                                            <path d="m13.063 9 3.495 4.475L20.601 9h2.454l-5.359 5.931L24 23h-4.938l-3.866-4.893L10.771 23H8.316l5.735-6.342L8 9h5.063Zm-.74 1.347h-1.457l8.875 11.232h1.36l-8.778-11.232Z" class="" style="list-style: outside none none;" ></path>--}}
{{--                                        </svg>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="mr-0 ml-3 text-left" style="list-style: outside none none;" >--}}
{{--                                    <a class="flex justify-center items-center text-indigo-500 bg-indigo-100 rounded-full duration-150 ease-in-out cursor-pointer" href="#0" aria-label="Facebook" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter; list-style: outside none none;" >--}}
{{--                                        <svg class="block w-8 h-8 align-middle" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" style="fill: currentcolor; list-style: outside none none;" >--}}
{{--                                            <path d="M14.023 24 14 17h-3v-3h3v-2c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V14H21l-1 3h-2.72v7h-3.257Z" class="" style="list-style: outside none none;" ></path>--}}
{{--                                        </svg>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="mr-0 ml-3 text-left" style="list-style: outside none none;" >--}}
{{--                                    <a class="flex justify-center items-center text-indigo-500 bg-indigo-100 rounded-full duration-150 ease-in-out cursor-pointer" href="#0" aria-label="Telegram" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter; list-style: outside none none;" >--}}
{{--                                        <svg class="block w-8 h-8 align-middle" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" style="fill: currentcolor; list-style: outside none none;" >--}}
{{--                                            <path d="M22.968 10.276a.338.338 0 0 0-.232-.253 1.192 1.192 0 0 0-.63.045s-14.019 5.038-14.82 5.596c-.172.121-.23.19-.259.272-.138.4.293.573.293.573l3.613 1.177a.388.388 0 0 0 .183-.011c.822-.519 8.27-5.222 8.7-5.38.068-.02.118 0 .1.049-.172.6-6.606 6.319-6.64 6.354a.138.138 0 0 0-.05.118l-.337 3.528s-.142 1.1.956 0a30.66 30.66 0 0 1 1.9-1.738c1.242.858 2.58 1.806 3.156 2.3a1 1 0 0 0 .732.283.825.825 0 0 0 .7-.622s2.561-10.275 2.646-11.658c.008-.135.021-.217.021-.317a1.177 1.177 0 0 0-.032-.316Z" class="" style="list-style: outside none none;" ></path>--}}
{{--                                        </svg>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}

                        <div class="-m-1 my-8">
                            <a class="inline-flex gap-1 py-px px-2 m-1 text-xs font-medium leading-normal text-gray-500 whitespace-nowrap rounded-md duration-150 ease-in-out cursor-pointer" href="#0" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;" >
                                Added <span class="font-bold" title="{{ \Carbon\Carbon::parse($conference->published_at)->format('d M Y')  }}">{{ \Carbon\Carbon::parse($conference->published_at)->diffForHumans() }} </span>
                            </a>
                            <a class="inline-flex gap-1 py-px px-2 m-1 text-xs font-medium leading-normal text-gray-500 whitespace-nowrap rounded-md duration-150 ease-in-out cursor-pointer" href="#0" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;" >
                                by <div class="font-bold">{{ $conference->creator->name }}</div>
                            </a>
                            <a class="inline-flex py-px px-2 m-1 text-xs font-medium leading-normal text-gray-500 whitespace-nowrap rounded-md duration-150 ease-in-out cursor-pointer" href="#0" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;" >
                                on
                            </a>
                            @foreach($conference->categories as $category)
                                <a class="inline-flex py-px px-2 m-1 text-xs font-medium leading-normal text-gray-500 whitespace-nowrap bg-gray-100 rounded-md duration-150 ease-in-out cursor-pointer" href="#0" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;">
                                    {{ $category->title }}
                                </a>
                            @endforeach
                            |
                            <a class="inline-flex py-px px-2 m-1 text-xs font-medium leading-normal text-gray-500 whitespace-nowrap bg-gray-100 rounded-md duration-150 ease-in-out cursor-pointer" href="#0" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;">
                                Total views: {{ $conference->views }}
                            </a>
                        </div>
                    </div>

                    @include('front-end.templates.partials.newsletter-cta')

                    <!-- Related jobs -->
                    <div class="mb-8 text-gray-800">
                        <h4 class="mx-0 mt-0 mb-8 font-sans text-2xl font-bold" style="line-height: 1.415;" >
                            Related Conferences
                        </h4>

                        @foreach($relatedConferences as $conference)
                            <div class="flex flex-col border-b-0 border-t border-gray-200 border-solid border-x-0" style="border-width: 0px;" >
                                <div class="border-t-0 border-b border-gray-200 border-solid -order-1 border-x-0" style="border-width: 0px;" >
                                    <div class="py-6 px-4">
                                        <div class="items-center sm:flex">
                                            <div class="flex-shrink-0">
                                                <img src="{{ optional($conference->organizers->first())->getLogo() ?? env('APP_URL') . '/images/institute_logo.jpg' }}" width="56" height="56" alt="Company 04" class="block max-w-full h-auto align-middle" />
                                            </div>
                                            <div class="flex-grow justify-between items-center my-0 lg:flex sm:my-0 sm:mr-0 sm:ml-5" >
                                                <div class="">
                                                    <div class="flex items-start">
                                                        <div class="mb-1 text-sm font-semibold" style="line-height: 1.5715;" >
                                                            {{ optional($conference->organizers->first())->name }}
                                                        </div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <a class="text-lg font-bold leading-normal cursor-pointer" href="{{ $conference->link() }}">
                                                            {{ $conference->title }}
                                                        </a >
                                                    </div>
                                                    <div class="-m-1">
                                                        <a class="inline-flex py-px px-2 m-1 text-xs font-medium leading-normal text-gray-500 whitespace-nowrap bg-gray-100 rounded-md duration-150 ease-in-out cursor-pointer" href="#0" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;" >{{ optional(optional($conference->address)->country)->name }}</a >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>




@endsection
