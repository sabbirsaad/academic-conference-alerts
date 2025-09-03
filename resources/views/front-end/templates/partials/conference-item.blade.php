<div class="-order-1">
    <div class="py-6 px-4 hover:bg-slate-50 rounded-xl">
        <div class="items-center sm:flex">
            <div class="flex-shrink-0">
                <img src="{{ optional($conference->organizers->first())->getLogo() ?? env('APP_URL') . '/images/institute_logo.jpg' }}" width="56" height="56" alt="{{ $conference->title }} logo" class="block max-w-full h-auto align-middle" />
            </div>
            <div class="flex-grow justify-between items-center my-0 lg:flex sm:my-0 sm:mr-0 sm:ml-5">
                <div class="">
                    <div class="flex items-start">
                        <div class="mb-1 text-sm font-semibold" style="line-height: 1.5715;" >
                            {{ optional($conference->organizers->first())->name }}
                        </div>
                    </div>
                    <div class="mb-2">
                        <a class="text-lg font-bold leading-normal cursor-pointer" href="{{ $conference->link() }}" >
                            {{ $conference->title }}
                        </a >
                    </div>
                    <div class="-m-1">
                        <a class="inline-flex py-px px-2 m-1 text-xs font-medium leading-normal text-gray-500 whitespace-nowrap bg-slate-200 rounded-md duration-150 ease-in-out cursor-pointer" href="#0" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;" >{{ \Carbon\Carbon::parse($conference->start_at)->format('d M Y') }}</a >
                        <a class="inline-flex py-px px-2 m-1 text-xs font-medium leading-normal text-gray-500 whitespace-nowrap bg-slate-200 rounded-md duration-150 ease-in-out cursor-pointer" href="#0" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;" >{{ optional(optional($conference->address)->country)->name }}</a >
                    </div>
                </div>
                <div class="flex items-center my-0 lg:my-0 lg:mr-0 lg:ml-2 lg:justify-end" style="min-width: 120px;" >
                    <div class="lg:hidden">
                        <a class="inline-flex justify-center items-center py-1 px-3 text-sm font-medium leading-5 text-white whitespace-nowrap bg-indigo-500 rounded-full duration-150 ease-in-out cursor-pointer" href="job-post.html" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter; box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;" >
                            Apply Now
                            <span class="ml-1 text-indigo-200 transition-transform" >-&gt;</span >
                        </a>
                    </div>
                    <div class="mx-0 text-sm italic text-gray-500 lg:mx-0" style="" >
                        {{ $conference->daysLeft() }} d
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

