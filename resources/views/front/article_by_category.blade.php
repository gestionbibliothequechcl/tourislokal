@extends('front.app')

@section('headline')
    	<!-- Breadcrumb -->
	<div class="container">
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a href="index.html" class="breadcrumb-item f1-s-3 cl9">
					Home 
				</a>

				<a href="category-02.html" class="breadcrumb-item f1-s-3 cl9">
					Category
				</a>
                @foreach ($category->articles as $article)
                @if ($loop->first)

				<span class="breadcrumb-item f1-s-3 cl9">
					{{$article->category->name}}
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
	</div>

	<!-- Page heading -->
	<div class="container p-t-4 p-b-40">
		<h2 class="f1-l-1 cl2">
			{{$article->category->name}}
		</h2>
	</div>
@endsection

@section('feature-post')
<section class="bg0">
    <div class="container">
        <div class="row m-rl--1">
            <div class="col-md-6 p-rl-1 p-b-2">
                

                <div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url('{{ $article->imageUrl() }}');">
                    <a href="{{ route('article.details', $article->slug) }}" class="dis-block how1-child1 trans-03"></a>

                    <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                        <a href="{{ route('article.details', $article->slug) }}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                            {{ $article->category->name }}
                        </a>

                        <h3 class="how1-child2 m-t-14 m-b-10">
                            <a href="{{ route('article.details', $article->slug) }}" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                                {{ $article->title }}
                            </a>
                        </h3>

                        <span class="how1-child2">
                            <span class="f1-s-4 cl11">
                                {{ $article->author->name }}
                            </span>

                            <span class="f1-s-3 cl11 m-rl-3">
                                -
                            </span>

                            <span class="f1-s-3 cl11">
                                @php
                                    $time = $article->created_at
                                @endphp
                                {{ $time->isoFormat('LLC') }}
                            </span>
                        </span>
                    </div>
                </div>
                @endif
                @endforeach
            </div>

            <div class="col-md-6 p-rl-1">
                <div class="row m-rl--1">
                    @foreach ($category->articles as $article)
                    @if ($loop->iteration < 2)
                        @continue
                    @endif
                    @if ($loop->iteration === 6)
                        @break
                    @endif
                        <div class="col-sm-6 p-rl-1 p-b-2">
                            <div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url('{{$article->imageUrl()}}');">
                                <a href="{{ route('article.details', $article->slug) }}" class="dis-block how1-child1 trans-03"></a>

                                <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                    <a href="{{ route('article.details', $article->slug) }}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                        {{ $article->category->name }}
                                    </a>

                                    <h3 class="how1-child2 m-t-14">
                                        <a href="{{ route('article.details', $article->slug) }}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                           {{$article->title}}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('post-main')
    <!-- Post -->
    <section class="bg0 p-t-70 p-b-55">
        <div class="container">
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                        <div class="m-b-45">
                            <a href="{{ route('article.details', $article->slug) }}" class="wrap-pic-w hov1 trans-03">
                                <img src="{{ $article->imageUrl() }}" alt="IMG" style="height: 200px; object-fit: cover;">
                            </a>
    
                            <div class="p-t-16">
                                <h5 class="p-b-5">
                                    <a href="{{ route('article.details', $article->slug) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                        {{ $article->title }}
                                    </a>
                                </h5>
    
                                <span class="cl8">
                                    <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                        {{ $article->author->name }}
                                    </a>
    
                                    <span class="f1-s-3 m-rl-3"> - </span>
    
                                    <span class="f1-s-3">
                                        {{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    
            <!-- Pagination -->
            <div class="flex-wr-s-c m-rl--7 p-t-15">
                {{ $articles->links('vendor.pagination.custom') }} <!-- Vue de pagination personnalisée -->
            </div>
        </div>
    </section>
    
    
    
@endsection

@section('sidebar')

        <!-- Subscribe -->
        <div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-50">
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
                                                <a href="{{ route('article.details', $article->slug) }}" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                    {{ $article->category->name }}
                                                </a>

                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>

                                                <span class="f1-s-3">
                                                    @php
                                                        $timne = $article->created_at
                                                    @endphp
                                                    {{ $time->isoFormat('LLC') }}
                                                </span>
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
							</ul>
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

@endsection