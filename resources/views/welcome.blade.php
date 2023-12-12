@extends('partials.layout')

@section('content')
    <div class="container mx-auto">
        {{$articles->links()}}
        <div class="flex flex-row flex-wrap">
            @foreach($articles as $article)
                <div class="basis-1/4 mb-4">
                    <div class="card w-96 bg-base-100 shadow-xl h-full">
                        @if($article->images->count() === 1)
                            <figure><img src="{{$article->image->path}}" alt="Shoes"/></figure>
                        @elseif($article->images->count() > 1)
                            <div class="h-96">
                                @foreach($article->images as $image)
                                    <div class="h-full">
                                        <img src="{{$image->path}}"/>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="card-body">
                            <h2 class="card-title">{{ $article->title }}</h2>
                            <p>{{ $article->snippet }}</p>
                            <div class="stat">
                                <div class="stat-desc"><b>Price:</b> {{ $article->price }}€</div>
                                <div class="stat-desc"><b>Gluten free: </b> @if($article->glutF > 0) ✔️ @else ❌ @endif </div>
                                <div class="stat-desc"><b>Vegan: </b>@if($article->vegan > 0) ✔️ @else ❌ @endif</div>
                                <div class="stat-desc"><b>Vegeraian: </b>@if($article->vegetarian > 0) ✔️ @else ❌ @endif </div>
                                <div class="stat-desc"><b>Spiciness: </b>
                                    <div class="rating gap-1" style="letter-spacing: -7px">
                                        {{ str_repeat( "🌶", $article->spice)}}<p>/</p>🌶🌶🌶🌶🌶
                                    </div>
                                </div>

                                <div class="stat-desc">{{ $article->created_at->diffForHumans() }}</div>
                                <div class="stat-desc flex flex-wrap">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
