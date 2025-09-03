<!-- Newletter CTA -->
<div class="py-12 border-t-0 border-b border-gray-200 border-solid -order-1" style="border-width: 0px;" >
    <div class="relative py-12 px-4 text-center bg-slate-800 rounded-md">
        <div class="absolute bg-slate-800 text-slate-200 rounded-xl border border-gray-200 border-solid duration-150 ease-in-out -z-10" aria-hidden="true" style="inset: 0px; transform: matrix(0.999848, -0.0174524, 0.0174524, 0.999848, 0, 0); transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;" ></div>
        <div class="mb-1 text-xl leading-normal text-slate-400" style='' >
            Land your next conference
        </div>
        <div class="mb-5 text-2xl font-bold text-slate-100" style="line-height: 1.415;" >
            Get a weekly email with the latest conference list.
        </div>
        <form class="inline-flex max-w-sm" method="POST" action="{{ route('newsletter.store') }}">
            @csrf
            <div class="flex flex-col justify-center mx-auto max-w-xs sm:max-w-none sm:flex-row" >
                <input name="email" type="email" class="py-1 px-3 mx-0 mt-0 mb-2 w-full text-sm bg-white rounded border border-gray-300 border-solid appearance-none cursor-text sm:mr-2 sm:mb-0" placeholder="Your email" aria-label="Your email" style="line-height: 1.5715;" />
                <button class="inline-flex justify-center items-center py-2 px-4 m-0 text-sm font-medium leading-5 text-slate-800 normal-case whitespace-nowrap bg-slate-200 bg-none rounded-md duration-150 ease-in-out cursor-pointer" type="submit" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter; box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;" >
                    Join Newsletter
                </button>
            </div>
            <!-- Success message -->
            <!-- <p class="font-medium text-emerald-600 text-center sm:text-left sm:absolute mt-2 opacity-75 text-sm">Thanks for subscribing!</p> -->
        </form>
    </div>
</div>
