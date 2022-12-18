<x-frontend>
    <div id="intro" class="text-center bg-light">
    </div>
    <div class="container">

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-md-9 my-4">

                <!--Section: Post data-mdb-->
                @if ($article->status == 'publish')
                    <section class="my-4 me-4">
                        <h1 class="my-2 h2">{{ $article->title }}</h1>
                        <small>
                            by Admin CIRT |
                            {{ $article->updated_at->format('F j, Y') }} | ENT - Cyber Insident Response Team
                        </small>
                        <img src="{{ asset('storage/images/' . $article->thumbnail_url) }}" class="img-fluid my-4"
                            alt="$article->slug" />
                        <div>
                            {!! $article->body !!}
                        </div>
                    </section>
                @endif

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-3 my-4 border-start">
                <h6 class="my-3">Artikel Terakhir</h6>
                <!--Section: Sidebar-->
                <section class="" style="top: 80px;">

                    <!--Section: Recentpost-->
                    @foreach ($articles as $article)
                        <section class="pb-4 mb-4">
                            <div class="bg-image hover-overlay ripple mb-4">
                                <img src="{{ asset('storage/images/' . $article->thumbnail_url) }}" class="img-fluid "
                                    style="width: 70%;" />
                                <a href="{{ route('artikel.show', $article) }}">
                                    <div class="mask" style="background-color: rgba(57, 192, 237, 0.2);">
                                    </div>
                                </a>
                            </div>
                            <h6 class="h6">{{ $article->title }}</h6>
P
                            <div>{!! $article->summary !!}</div>
                            <a class="btn btn-primary" href="{{ route('artikel.show', $article) }}">Baca
                                Selengkapnya</a>
                        </section>
                    @endforeach
                    <!--Section: RecentPost-->
                </section>
                <!--Section: Sidebar-->
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
</x-frontend>
