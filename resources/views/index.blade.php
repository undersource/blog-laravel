@extends('base')

@section('content')
<div class="w3-row">
        <div class="w3-col l8 s12">
            <div class="w3-card-4 w3-margin w3-white">
                @forelse ($articles as $article)
                    <img src="{{ 'storage/'.$article->image }}" alt="Nature" style="width:100%">
                    <div class="w3-container">
                        <h3>
                            <b>{{ $article->title }}</b>
                        </h3>
                        <span class="w3-opacity">{{ $article->created_at->format('M d Y') }}</span>
                    </div>
                    <div class="w3-container">
                        <p>{{ Str::limit($article->content, 500, $end='...') }}</p>
                        <div class="w3-row">
                            <div class="w3-col m8 s12">
                                <p>
                                    <a href="{{ Route('show_article', ['slug' => $article->slug]) }}" class="w3-button w3-padding-large w3-white w3-border">
                                        <span>ЧИТАТЬ ДАЛЬШЕ »</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr>
                @empty
                    <div class="w3-container w3-center">
                        <h1>No articles</h1>
                    </div>
                @endforelse
            </div>
        </div>
        @include('components.side-card')
    </div>
@endsection

@section('footer')
    <footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
        @if ($articles->onFirstPage())
            <a href="{{ $articles->previousPageUrl() }}" class="w3-button w3-black w3-disabled w3-padding-large w3-margin-bottom">Back</a>
        @else
            <a href="{{ $articles->previousPageUrl() }}" class="w3-button w3-black w3-padding-large w3-margin-bottom">« Back</a>
        @endif
        <a href="{{ $articles->nextPageUrl() }}" class="w3-button w3-black w3-padding-large w3-margin-bottom">Next »</a>
    </footer>
@endsection