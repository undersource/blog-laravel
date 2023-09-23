@extends('base')

@section('content')
    <div class="w3-row">
        <div class="w3-col l8 s12">
            <div class="w3-card-4 w3-margin w3-white">
                <img src="{{ asset('storage/'.$article->image) }}" alt="Nature" style="width:100%">
                <div class="w3-container">
                    <h1>
                        <center>
                            <b>{{ $article->title }}</b>
                        </center>
                    </h1>
                </div>
                <div class="w3-container">
                    <center>
                        <p>{{ $article->content }}</p>
                    </center>
                </div>
                <hr>
            </div>
        </div>
        @include('components.side-card')
    </div>
@endsection

@section('footer')
    <footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
        <a href="{{ Route('index') }}" class="w3-button w3-padding-large w3-grey">« Back</a>
        @if(Auth::check())
            <a href="{{ Route('del_article', ['slug' => $article->slug]) }}" class="w3-right w3-margin-right w3-button w3-padding-large w3-grey">Delete</a>
        @endif
    </footer>
@endsection