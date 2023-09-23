@extends('base')

@section('content')
    <div class="w3-row">
    <div class="w3-col l8 s12">
        <div class="w3-card-4 w3-margin w3-white">
            <h1 class="w3-center w3-padding">Add Article</h1>
            <form method="post" action="{{ Route('add_article') }}" enctype="multipart/form-data" class="w3-container w3-center">
                @csrf   

                <!-- Errors -->
                <div class="error">
                    @error('image')
                        <div>{{ $message }}</div>
                    @enderror

                    @error('title')
                        <div>{{ $message }}</div>
                    @enderror

                    @error('slug')
                        <div>{{ $message }}</div>
                    @enderror

                    @error('content')
                        <div>{{ $message }}</div>
                    @enderror

                    @error('category')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <br/>

                <!-- Image -->
                <input id="image" type="file" name="image" id="image" class="w3-margin"/>
                <br/>

                <!-- Title -->
                <input id="title" type="text" placeholder="Title" name="title" class="w3-margin"/>
                <br/>

                <!-- Slug -->
                <input id="slug" type="text" placeholder="Slug" name="slug" class="w3-margin"/>
                <br/>

                <!-- Content -->
                <textarea id="content" placeholder="Content" rows="20" cols="35" name="content" class="w3-margin"></textarea>
                <br/>

                <!-- Category -->
                <label for="category">Category:</label>
                <select id="category" name="category" class="w3-margin">
                    @forelse ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                        <option>-----</option>
                    @endforelse
                </select>
                <br/>

                <!-- Submit button -->
                <button type="Submit" class="w3-margin">Submit</button>
            </form>
        </div>
    </div>
    @include('components.side-card')
    </div>
@endsection

@section('footer')
    <footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
        <a href="{{ Route('index') }}" class="w3-button w3-padding-large w3-grey">« Back</a>
    </footer>
@endsection