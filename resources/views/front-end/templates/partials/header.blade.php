<header class="bg-white fixed z-30 w-full tracking-normal leading-6 duration-300 ease-in-out text-slate-900" x-data="handleHeader" @scroll.window="isTop" :class="{ 'bg-white clt2v c4z0p-lg' : !top }" style="transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;" >
    <script class="leading-6">
        document.addEventListener('alpine:init', () => {
            Alpine.data('handleHeader', () => ({
                top: true, isTop() {
                    this.top = window.pageYOffset < 10
                },
                init() {
                    this.isTop()
                }
            }))
        })
    </script>
    <div class="px-5 mx-auto max-w-6xl leading-6 sm:px-6">
        <div class="flex justify-between items-center h-16 md:h-20">
            @include('front-end.templates.partials.top-nav')
        </div>
    </div>
</header>
