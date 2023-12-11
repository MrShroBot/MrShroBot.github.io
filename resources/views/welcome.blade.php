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
                            <div class="h-96 carousel carousel-vertical">
                                @foreach($article->images as $image)
                                    <div class="carousel-item h-full">
                                        <img src="{{$image->path}}"/>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="card-body">
                            <h2 class="card-title">{{ $article->title }}</h2>
                            <p>{{ $article->snippet }}</p>
                            <div class="stat">
                                <div class="stat-desc"><b>Hind:</b> {{ $article->hind }}€</div>
                                <div class="stat-desc"><b>Gluteeni vaba: </b> @if($article->gluk > 0) ✔️ @else ❌ @endif </div>
                                <div class="stat-desc"><b>Vegan: </b>@if($article->vegan > 0) ✔️ @else ❌ @endif</div>
                                <div class="stat-desc"><b>Taimetoitlastele: </b>@if($article->taimetoit > 0) ✔️ @else ❌ @endif </div>
                                <div class="stat-desc"><b>Teravus: </b>
                                    <div class="rating gap-1" style="letter-spacing: -7px">
                                        {{ str_repeat( "🌶", $article->tugevus)}}<p>/</p>🌶🌶🌶🌶🌶
                                    </div>
                                </div>
                                <a href="{{route('public.user',['user' => $article->user])}}" class="stat-desc">{{ $article->user->name }}</a>

                                <div class="stat-desc">{{ $article->created_at->diffForHumans() }}</div>
                                <div class="stat-desc flex flex-wrap">

                                </div>
                            </div>
                            <div class="card-actions justify-end">
                                <a href="{{route('public.article',['article' => $article])}}" class="btn btn-primary">Comments</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
