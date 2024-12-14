@extends('front.app')

@section('headline')
<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
    <div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
        <span class="text-uppercase cl2 p-r-8">
            Trending Now:
        </span>

        <span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown" data-out="fadeOutDown">
            @foreach ($articles as $article)
                <span class="dis-inline-block slide100-txt-item animated visible-false">
                    {{$article->title}}
                </span>
            @endforeach
        </span>
    </div>

    <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
        <form action="{{ route('search') }}" method="POST" class="s-full">
            @csrf
            <input id="search" class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search_key" placeholder="Rechercher un article..." value="{{ request()->query('search_key') }}">
            <button id="searchButton" type="submit" class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
                <i class="zmdi zmdi-search"></i>
            </button>
        </form>
    </div>
</div>
@endsection

@section('feature-post')
<div class="row m-rl--1">
    <div class="col-md-6 p-rl-1 p-b-2">
        @foreach ($article_most_popular as $article)
            <div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url('{{ $article->imageUrl() }}');">
                <a href="{{route('article.details', $article)}}" class="dis-block how1-child1 trans-03"></a>

                <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                    <a href="{{route('category_by.article', $article->category->slug)}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                        {{$article->category->name}}
                    </a>

                    <h3 class="how1-child2 m-t-14 m-b-10">
                        <a href="{{route('article.details', $article)}}" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                            {{$article->title}}
                        </a>
                    </h3>

                    <span class="how1-child2">
                        <span class="f1-s-4 cl11">
                            {{$article->author->name}}
                        </span>

                        <span class="f1-s-3 cl11 m-rl-3">
                            -
                        </span>

                        <span class="f1-s-3 cl11">
                            {{\Carbon\Carbon::parse($article->created_at)->format('d M Y')}}
                        </span>
                    </span>
                </div>
            </div>
        @endforeach
    </div>

    <div class="col-md-6 p-rl-1">
        <div class="row m-rl--1">
            @foreach ($latest_articles as $article)
              @if ($loop->last)
                <div class="col-12 p-rl-1 p-b-2">
                    <div class="bg-img1 size-a-4 how1 pos-relative" style="background-image: url('{{$article->imageUrl()}}');">
                        <a href="{{route('article.details', $article)}}" class="dis-block how1-child1 trans-03"></a>

                        <div class="flex-col-e-s s-full p-rl-25 p-tb-24">
                            <a href="{{route('category_by.article', $article->category->slug)}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                {{$article->category->name}}
                            </a>

                            <h3 class="how1-child2 m-t-14">
                                <a href="{{route('article.details', $article)}}" class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
                                    {{$article->title}}
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
                @endif  
            @endforeach

            @foreach ($global_categories as $category)
                @if ($loop->iteration === 2)
                    @break
                @endif
                @foreach ($category->articles as $article)
                    @if ($loop->iteration === 3)
                        @break
                    @endif
                <div class="col-sm-6 p-rl-1 p-b-2">
                    
                    <div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url('{{$article->imageUrl()}}');">
                        <a href="{{route('article.details', $article)}}" class="dis-block how1-child1 trans-03"></a>

                        <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                            <a href="{{route('category_by.article', $article->category->slug)}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                {{$article->category->name}}
                            </a>

                            <h3 class="how1-child2 m-t-14">
                                <a href="{{route('article.details', $article)}}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                    {{$article->title}}
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('post-main')
<div class="p-b-20">
    <!-- Entertainment -->
    @foreach ($categories as $category)
        <div class="tab01 p-b-20">

            <div class="tab01-head how2 how2-cl1 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                <!-- Brand tab -->
                <h3 class="f1-m-2 cl12 tab01-title">
                    {{ $category->name }}
                </h3>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        {{-- <a class="nav-link active" data-toggle="tab" href="#tab1-1" role="tab">All</a> --}}
                    </li>

                    <li class="nav-item">
                        {{-- <a class="nav-link" data-toggle="tab" href="#tab1-2" role="tab">Celebrity</a> --}}
                    </li>

                    <li class="nav-item">
                        {{-- <a class="nav-link" data-toggle="tab" href="#tab1-3" role="tab">Movies</a> --}}
                    </li>

                    <li class="nav-item">
                        {{-- <a class="nav-link" data-toggle="tab" href="#tab1-4" role="tab">Music</a> --}}
                    </li>

                    <li class="nav-item">
                        {{-- <a class="nav-link" data-toggle="tab" href="#tab1-5" role="tab">Games</a> --}}
                    </li>

                    <li class="nav-item-more dropdown dis-none">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-ellipsis-h"></i>
                        </a>

                        <ul class="dropdown-menu">

                        </ul>
                    </li>
                </ul>

                <!--  -->
                <a href="{{route('category_by.article', $category->slug)}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                    View all
                    <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                </a>
            </div>


            <!-- Tab panes -->

            <div class="tab-content p-t-35">
                <!-- - -->
                <div class="tab-pane fade show active" id="tab1-1" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            @foreach ($category->articles as $article)
                                @if ($loop->last)
                                    <div class="m-b-30">
                                        <a href="{{ route('article.details', $article->slug) }}" class="wrap-pic-w hov1 trans-03">
                                            <img width="720px" height="200px"   src="{{$article->imageUrl()}}" alt="IMG">
                                        </a>

                                        <div class="p-t-20">
                                            <h5 class="p-b-5" style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient:vertical; overflow:hidden;" >
                                                <a href="{{ route('article.details', $article->slug) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                   {{$article->title}}
                                                </a>
                                            </h5>

                                            <span class="cl8">
                                                <a href="{{route('category_by.article', $article->category->slug)}}" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                    {{ $article->category->name }}
                                                </a>

                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>

                                                <span class="f1-s-3">
                                                    {{\Carbon\Carbon::parse($article->created_at)->format('d M Y')}}
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                    <!-- Item post -->
                         @foreach($category->articles as $article)
                            @if($loop->iteration === 4)
                                 @break
                             @endif
                                <div class="flex-wr-sb-s m-b-30">
                                            <a href="{{ route('article.details', $article->slug) }}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img width="720px" height="100px"  src="{{$article->imageUrl()}}" alt="IMG">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5" style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient:vertical; overflow:hidden;">
                                                    <a href="{{ route('article.details', $article->slug) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        {{ $article->title }}
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                                    <a href="{{route('category_by.article', $article->category->slug)}}" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                        {{ $article->category->name }}
                                                    </a>

                                                    <span class="f1-s-3 m-rl-3">
                                                        -
                                                    </span>

                                                    <span class="f1-s-3">
                                                        {{\Carbon\Carbon::parse($article->created_at)->format('d M Y')}}
                                                    </span>
                                                </span>
                                            </div>
                                </div>
                        @endforeach
                     </div>


                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>
@endsection
@section('sidebar')
    <div class="p-l-10 p-rl-0-sr991 p-b-20">
        <!--  -->
        	<!-- Popular Posts -->
						<div class="p-b-30">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Popular Post
								</h3>
							</div>

							<ul class="p-t-35">
                                @foreach ($global_popular_article as $article)

                                    <li class="flex-wr-sb-s p-b-30">
                                        <a href="{{ route('article.details', $article->slug) }}" class="size-w-10 wrap-pic-w hov1 trans-03">
                                            <img src="{{ $article->imageUrl() }}" alt="IMG">
                                        </a>

                                        <div class="size-w-11">
                                            <h6 class="p-b-4">
                                                <a href="{{ route('article.details', $article->slug) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    {{ $article->title }}
                                                </a>
                                            </h6>

                                            <span class="cl8 txt-center p-b-24">
                                                <a href="{{route('category_by.article', $article->category->slug)}}" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                {{ $article->category->name }}
                                                </a>

                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>

                                                <span class="f1-s-3">
                                                    {{\Carbon\Carbon::parse($article->created_at)->format('d M Y')}}
                                                </span>
                                            </span>
                                        </div>
                                    </li>
                                @endforeach


							</ul>
						</div>


        <!--  -->
        <div class="p-t-50">
            <div class="how2 how2-cl4 flex-s-c">
                <h3 class="f1-m-2 cl3 tab01-title">
                    Stay Connected
                </h3>
            </div>

            <ul class="p-t-35">
                @foreach ($socials_media as $social)
                    @php
                        // Dynamically set the class based on the social media name
                        $colorClass = match($social->name) {
                            'Facebook' => 'bg-facebook',
                            'Twitter' => 'bg-twitter',
                            'Instagram' => 'bg-instagram',
                            'Linkedin' => 'bg-linkedin',
                            'YouTube' => 'bg-youtube',
                            default => 'bg-default',
                        };
                    @endphp
            
                    <li class="flex-wr-sb-c p-b-20">
                        <a href="{{$social->link}} " target="blank" class="size-a-8 flex-c-c borad-3 size-a-8 fs-16 cl0 hov-cl0 {{ $colorClass }}">
                            <span class="{{$social->icon}}"></span>
                        </a>
            
                        <div class="size-w-3 flex-wr-sb-c">
                            <span class="f1-s-8 cl3 p-r-20">
                                {{ number_format($social->followers) }} {{ Str::plural('Fan', $social->followers) }}
                </span>
                            </span>
                            <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                Like
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
            
        </div>
    </div>
@endsection

@section('last-post')
<div class="row justify-content-center">
    <div class="col-md-10 col-lg-8 p-b-20">
        <div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
            <h3 class="f1-m-2 cl3 tab01-title">
                Latest Articles
            </h3>
        </div>

        <div class="row p-t-35">
            @foreach ($latest_articles as $last_article)
            <div class="col-sm-6 p-r-25 p-r-15-sr991">
                <!-- Item latest -->	
                <div class="m-b-45">
                    <a href="{{route('article.details', $last_article->slug)}}" class="wrap-pic-w hov1 trans-03">
                        <img src="{{$last_article->imageUrl()}}" width="400px" height="200px" alt="IMG">
                    </a>

                    <div class="p-t-16">
                        <h5 class="p-b-5">
                            <a href="{{route('article.details', $article->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03" style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient:vertical; overflow:hidden;">
                                {{$last_article->title}} 
                            </a>
                        </h5>

                        <span class="cl8">
                            <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                {{$last_article->author->name}}
                            </a>

                            <span class="f1-s-3 m-rl-3">
                                -
                            </span>

                            <span class="f1-s-3">
                                {{\Carbon\Carbon::parse($last_article->created_at)->format('d M Y')}}
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <div class="col-md-10 col-lg-4">
        <div class="p-l-10 p-rl-0-sr991 p-b-20">
            <!-- Video -->
            <div class="p-b-55">
                <div class="how2 how2-cl4 flex-s-c m-b-35">
                    <h3 class="f1-m-2 cl3 tab01-title">
                        Featured Video
                    </h3>
                </div>

                <div>
                    <div class="wrap-pic-w pos-relative">
                        <img src="{{asset('front_end/images/video-01.jpg')}}" alt="IMG">

                        <button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03" data-toggle="modal" data-target="#modal-video-01">
                            <span class="fab fa-youtube"></span>
                        </button>
                    </div>

                    <div class="p-tb-16 p-rl-25 bg3">
                        <h5 class="p-b-5">
                            <a href="#" class="f1-m-3 cl0 hov-cl10 trans-03">
                                Music lorem ipsum dolor sit amet consectetur 
                            </a>
                        </h5>

                        <span class="cl15">
                            <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                by John Alvarado
                            </a>

                            <span class="f1-s-3 m-rl-3">
                                -
                            </span>

                            <span class="f1-s-3">
                                Feb 18
                            </span>
                        </span>
                    </div>
                </div>	
            </div>
                
            <!-- Subscribe -->
            <div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-55">
                <h5 class="f1-m-5 cl0 p-b-10">
                    Subscribe
                </h5>

                <p class="f1-s-1 cl0 p-b-25">
                    Get all latest content delivered to your email a few times a month.
                </p>

                <form class="size-a-9 pos-relative">
                    <input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" name="email" placeholder="Email">

                    <button class="size-a-10 flex-c-c ab-t-r fs-16 cl9 hov-cl10 trans-03">
                        <i class="fa fa-arrow-right"></i>
                    </button>
                </form>
            </div>
            
            <!-- Tag -->
            <div>
                <div class="how2 how2-cl4 flex-s-c m-b-30">
                    <h3 class="f1-m-2 cl3 tab01-title">
                        Tags
                    </h3>
                </div>
    
                
                <div class="flex-wr-s-s m-rl--5">
                    @foreach ($global_tag as $tag)
                        <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                            {{ $tag->name }}
                        </a>
                    @endforeach
    
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection