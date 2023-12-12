@extends('partials.layout')

@section('content')
    <div class="container mx-auto w-1/2">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <form action="{{route('articles.update', ['article' => $article])}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Title</span>
                        </label>
                        <input value="{{$article->title}}" name="title" type="text" placeholder="Burger Title" class="input input-bordered w-full @error('title') input-error @enderror"/>
                        @error('title')
                        <label class="label">
                            <span class="label-text-alt text-error">{{$message}}</span>
                        </label>
                        @enderror
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Content</span>
                        </label>
                        <textarea name="body" class="textarea textarea-bordered @error('title') textarea-error @enderror" placeholder="Content here">{{$article->body}}</textarea>
                        @error('body')
                        <label class="label">
                            <span class="label-text-alt text-error">{{$message}}</span>
                        </label>
                        @enderror
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Price</span>
                        </label>
                        <input value="{{$article->price}}" class="input input-bordered w-full" type="number" id="quantity" name="price" min="1" >
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Gluten free</span>
                        </label>
                        <input type="hidden" name="glutF" value="0" />
                        <input type="checkbox" class="checkbox" name="glutF" @if($article->glutF > 0) checked="checked" @else  @endif></input>
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Vegan</span>
                        </label>
                        <input type="hidden" name="vegan" value="0" />
                        <input type="checkbox" class="checkbox" name="vegan" @if($article->vegan > 0) checked="checked" @else  @endif></input>
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Vegeraian</span>
                        </label>
                        <input type="hidden" name="vegetarian" value="0" />
                        <input type="checkbox" class="checkbox" name="vegetarian" @if($article->vegetarian > 0) checked="checked" @else  @endif></input>
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Spiciness 0-5</span>
                        </label>
                        <input value="{{$article->spice}}" class="input input-bordered w-full" type="number" name="spice" min="0" max="5"/>
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Image</span>
                        </label>
                        <input name="images[]" type="file" class="file-input input-bordered w-full @error('image.*') input-error @enderror"/>
                        @error('image.*')
                        <label class="label">
                            <span class="label-text-alt text-error">{{$message}}</span>
                        </label>
                        @enderror
                    </div>
                    <input type="submit" value="Update" class="btn btn-primary mt-3">
                </form>
            </div>
        </div>
    </div>
@endsection
