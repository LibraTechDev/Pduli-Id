<section class="ftco-section bg-light" id="blog-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h2 class="mb-4">Gets Every Single Updates Here</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>
        <div class="row d-flex">
            @foreach ($artikel as $a)
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry">
                        <img class="block-20" src="{{ asset('storage/' . $a->image) }}" loading="lazy" />
                        <div class="text d-block">
                            <div class="meta mb-3">
                                <div>
                                    <a href="#">{{ $a->created_at->diffForHumans() }}</a>
                                </div>
                                <div>
                                    <a href="#"> {{ $a->author->name }}</a>

                                </div>
                            </div>
                            <h3 class="heading">
                                <a>{{ $a->title }}</a>
                            </h3>
                            {{-- <p>{!! $a->body !!}</p> --}}
                            {{-- <p>{{ Str::limit($a->body, 100) }}</p> --}}
                            <p>{{ $a->ringkasan }}</p>
                            <p><a href="{{ route('artikel.show', $a->slug) }}" class="btn btn-primary py-2 px-3">Read more</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
