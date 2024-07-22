@include('home.cssload')

@include('home.navbar')
<br><br>
<div class="container mt-5 article-content" style="margin-bottom: 10rem;">
    <h2 class="article-title">{{ $artikel->title }}</h2>
    <p class="article-meta">Dibuat Oleh {{ $artikel->author->name }}<br>{{ $artikel->created_at->diffForHumans() }}</p>

    <div class="article-image">
        <img src="{{ asset('storage/' . $artikel->image) }}" alt="Artikel Image" style="max-width: 100%">
    </div>

    <article class="my-5">
        {!! $artikel->body !!}
    </article>
</div>



<script>
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
</script>

@include('home.footer')
@include('home.js')
