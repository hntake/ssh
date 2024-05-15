<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"     
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">

    
    @foreach ($words as $word)
    <url>
        <loc>{{ url('/') }}/test/{{ $word->id }}</loc>
        <lastmod>{{ $word->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>always</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    @foreach ($diets as $diet)
    <url>
        <loc>{{ url('/') }}/diet/each/{{ $diet->id }}</loc>
        @if($diet->created_at)
        <lastmod>{{ $diet->created_at->tz('UTC')->toAtomString() }}</lastmod>
    @else
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
    @endif        <changefreq>always</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    @foreach ($forms as $form)
    <url>
        <loc>{{ url('/') }}/blog/page{{ $form->id }}</loc>
        <lastmod>{{ $form->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>always</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
    
    @foreach ($newses as $news)
    <url>
        <loc>{{ url('/') }}/news/page{{ $news->id }}</loc>
        <lastmod>{{ $news->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>always</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
</urlset>