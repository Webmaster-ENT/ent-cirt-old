<x-app-layout>

    <!-- Container for demo purpose -->
    <div class="container mx-auto pt-10 pb-20">

        <!-- Section: Design Block -->
        <section class="text-gray-500 bg-white rounded-lg">
            <img src="{{ asset('images/Pita Preview.png') }}" class="w-20" alt="">

            <!-- Single article -->
            <div class="flex flex-wrap justify-center">
                <div class="w-50 md:w-3/4 pb-20">
                    <h2 class="font-bold text-gray-900 mb-3">{{ $article->title }}</h2>
                    <small>
                        by Editor PENS |
                        {{ $article->updated_at->format('F j, Y') }} | ENT - Cyber Insident Response Team
                    </small>
                    <div
                        class="relative overflow-hidden bg-no-repeat bg-cover relative overflow-hidden bg-no-repeat bg-cover ripple my-4">
                        <img src="{{ asset('storage/images/' . $article->thumbnail_url) }}" class="w-full" />

                    </div>
                    <div class="my-10">
                        {!! $article->body !!}
                    </div>
                </div>
                <!-- Single article -->

        </section>
        <!-- Section: Design Block -->
    </div>
</x-app-layout>
