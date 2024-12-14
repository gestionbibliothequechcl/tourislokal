@if($articles->isEmpty())
    <p>Aucun résultat trouvé.</p>
@else
@extends('front.app')

@section('headline')
    <!-- Breadcrumb -->
	<div class="container">
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a href="index.html" class="breadcrumb-item f1-s-3 cl9">
					Home 
				</a>

				<span class="breadcrumb-item f1-s-3 cl9">
					Blog
				</span>
			</div>

			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
					<i class="zmdi zmdi-search"></i>
				</button>
			</div>
		</div>
	</div>
	<!-- Page heading -->
	<div class="container p-t-4 p-b-40">
		<h2 class="f1-l-1 cl2">
			Blog List
		</h2>
	</div>
@endsection

@section('post-main')

                <div class="p-r-10 p-r-0-sr991">
                    <div class="m-t--40 p-b-40">
                        <!-- Item post -->
                        @foreach ($articles as $article)
                            
                       
                        <div class="flex-wr-sb-s p-t-40 p-b-15 how-bor2">
                            <a href="{{ route('article.details', $article->slug) }}" class="size-w-8 wrap-pic-w hov1 trans-03 w-full-sr575 m-b-25">
                                <img src="{{ $article->imageUrl() }}" alt="IMG" height= "250px">
                            </a>

                            <div class="size-w-9 w-full-sr575 m-b-25">
                                <h5 class="p-b-12">
                                    <a href="{{ route('article.details', $article->slug) }}" class="f1-l-1 cl2 hov-cl10 trans-03 respon2">
                                        {{ $article->title }}
                                    </a>
                                </h5>

                                <div class="cl8 p-b-18">
                                    <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                        by {{ $article->author->name }}
                                    </a>

                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>

                                    <span class="f1-s-3">
                                        @php
                                            $time = $article->created_at
                                        @endphp
                                        {{ $time->isoFormat('LLC') }}
                                    </span>
                                </div>

                                <p class="f1-s-1 cl6 p-b-24" style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient:vertical; overflow:hidden;" >
                                    {{ $article->content }}
                                </p>

                                <a href="{{ route('article.details', $article->slug) }}" class="f1-s-1 cl9 hov-cl10 trans-03">
                                    Read More
                                    <i class="m-l-2 fa fa-long-arrow-alt-right"></i>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class=" pagination flex-wr-s-c m-rl--7 p-t-15">
                        {{ $articles->links('vendor.pagination.custom') }} <!-- Utilise votre vue personnalisée -->
                    </div>
                    
                    
                </div>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
@endsection

@section('side-bar')

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
        <div>
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
                                <a href="{{ route('category_by.article', $article->category->slug) }}" class="f1-s-6 cl8 hov-cl10 trans-03">
                                    {{ $article->category->name }}
                                </a>

                                <span class="f1-s-3 m-rl-3">
                                    -
                                </span>

                                <span class="f1-s-3">
                                    @php
                                        $time = $article->created_at
                                    @endphp
                                    {{ $time->isoFormat('LLC') }}
                                </span>
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <!--  -->
        <div class="flex-c-s p-b-50">
            <a href="#">
                <img class="max-w-full" src="images/banner-02.jpg" alt="IMG">
            </a>
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
@endif

