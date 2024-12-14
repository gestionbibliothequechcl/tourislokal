@extends('front.app')

@section('headline')
<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
    <div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
        <span class="text-uppercase cl2 p-r-8">
            Trending Now:
        </span>

        <span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown" data-out="fadeOutDown">
            <span class="dis-inline-block slide100-txt-item animated visible-false">
                Interest rate angst trips up US equity bull market
            </span>
            
            <span class="dis-inline-block slide100-txt-item animated visible-false">
                Designer fashion show kicks off Variety Week
            </span>

            <span class="dis-inline-block slide100-txt-item animated visible-false">
                Microsoft quisque at ipsum vel orci eleifend ultrices
            </span>
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

@section('post-main')


	<!-- Content -->
						<!-- Blog Detail -->
						<div class="p-b-70">
							<a href="{{route('category_by.article', $article->category->slug)}}" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
								{{$article->category->name}}
							</a>

							<h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
								{{$article->title}}
							</h3>
							
							<div class="flex-wr-s-s p-b-40">
								<span class="f1-s-3 cl8 m-r-15">
									<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
										by {{$article->author->name}}
									</a>

									<span class="m-rl-3">-</span>

									<span>
										{{\Carbon\Carbon::parse($article->created_at)->format('d M Y')}}
									</span>
								</span>

								<span class="f1-s-3 cl8 m-r-15">
									{{$article->views}} Views
								</span>

								<a href="#" class="f1-s-3 cl8 hov-cl10 trans-03 m-r-15">
									{{ $article->comments->count() }} Comment
								</a>
							</div>

							<div class="wrap-pic-max-w p-b-30">
								<img src="{{$article->imageUrl()}}" alt="IMG" width="100%">
							</div>

							<p class="f1-s-11 cl6 p-b-25">
								{{$article->content}}
							</p>


							<!-- Tag -->
							<div class="flex-s-s p-t-12 p-b-15">
								<span class="f1-s-12 cl5 m-r-8">
									Tags: 
								</span>
								
								<div class="flex-wr-s-s size-w-0">
									<a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
										Streetstyle
									</a>
								</div>
							</div>

							<!-- Share -->
							<div class="flex-s-s">
								<span class="f1-s-12 cl5 p-t-1 m-r-15">
									Share:
								</span>
								
								<div class="flex-wr-s-s size-w-0">
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
											<a href="{{$social->link}}" class="dis-block f1-s-13 cl0 {{ $colorClass }}  borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03" target="blank">
												<i class="{{$social->icon}}"></i>
												{{$social->name}}
											</a>
									@endforeach
									
								</div>
							</div>
						</div>
						<style>
							.card {
								margin: 20px auto;
								padding: 20px;
								background-color: #fff;
								border: 1px solid #d2d2dc;
								border-radius: 11px;
								box-shadow: 0px 0px 5px 0px rgba(161, 163, 164, 0.5);
							}
						
							.media img {
								width: 60px;
								height: 60px;
							}
						
							.reply a {
								text-decoration: none;
								color: #6c757d;
							}
						
							.reply a:hover {
								color: #495057;
							}
						
							.media.mt-4 {
								padding-left: 30px;
							}
						
							.media-body h6 {
								font-size: 14px;
								font-weight: bold;
							}
						
							.media-body p {
								font-size: 13px;
								color: #555;
							}
						
							/* Style du bouton avec couleur noir-gris */
							.btn-primary {
								background-color: #343a40; /* Couleur gris foncé */
								border-color: #343a40;
								color: #fff;
								font-weight: 600;
								border-radius: 8px;
							}
						
							.btn-primary:hover {
								background-color: #495057; /* Gris plus clair au survol */
								border-color: #495057;
							}
						
							.btn-block {
								width: 100%;
								padding: 10px;
							}
						
							.text-muted {
								color: #777;
							}
						</style>
		<div class="container mt-5">
			<style>
				.custom-title {
    font-size: 1.5rem; /* Ajustez la taille selon vos besoins */    font-weight: bold;
    color: #000; /* Noir pur pour une couleur très foncée */
}

			</style>
			<div class="card">
				<h1 class="custom-title">{{ $article->comments->count() }} Comments</h1>

				<hr>
				<!-- Section des commentaires principaux -->
				@foreach($article->comments as $comment)
					<div class="media mb-4" id="comment-{{ $comment->id }}">
						<img class="mr-3 rounded-circle" src="https://ui-avatars.com/api/?name={{ urlencode($comment->name) }}&background=random" alt="{{ $comment->name }}">
						<div class="media-body">
							<div class="d-flex justify-content-between">
								<h5>{{ $comment->name }}</h5>
								<small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
							</div>
							<p>{{ $comment->message }}</p>
						</div>
					</div>
					<hr>
				@endforeach
		
				<!-- Bouton Voir Plus si plus de 5 commentaires -->
				@if($article->comments->count() > 5)
					<div class="text-center">
						<button id="load-more" class="btn btn-primary">Voir Plus</button>
					</div>
				@endif
			</div>
		
			<!-- Formulaire principal -->
			<div class="card mt-4">
				<h4 class="text-center mb-4">Leave a Comment</h4>
				<form action="{{ route('comment', $article->id) }}" method="POST">
					@csrf
					<input type="text" name="name" class="form-control mb-3" placeholder="Your Name" required>
					<input type="email" name="email" class="form-control mb-3" placeholder="Your Email" required>
					<textarea name="message" class="form-control mb-3" rows="4" placeholder="Your Comment" required></textarea>
					<button type="submit" class="btn btn-primary btn-block">Submit Comment</button>
				</form>
			</div>
		</div>
		
		<script>
			// Script pour charger plus de commentaires
			document.getElementById('load-more').addEventListener('click', function() {
				fetch("{{ route('article.loadMore', $article->slug) }}", {
					method: 'GET',
					headers: {
						'Content-Type': 'application/json',
					},
				})
				.then(response => response.json())
				.then(data => {
					// Ajouter les commentaires restants
					let commentsSection = document.querySelector('.card');
					data.comments.forEach(comment => {
						let commentHtml = `
							<div class="media mb-4" id="comment-${comment.id}">
								<img class="mr-3 rounded-circle" src="https://ui-avatars.com/api/?name=${comment.name}&background=random" alt="${comment.name}">
								<div class="media-body">
									<div class="d-flex justify-content-between">
										<h5>${comment.name}</h5>
										<small class="text-muted">${comment.created_at}</small>
									</div>
									<p>${comment.message}</p>
								</div>
							</div>
						`;
						commentsSection.innerHTML += commentHtml;
					});
					// Masquer le bouton Voir Plus
					document.getElementById('load-more').style.display = 'none';
				});
			});
		</script>
		
						
						
								

    <!-- Blog Detail -->
    <div class="p-t-70">
    </div>

            
@endsection

@section('sidebar')

		
			
			<!-- Sidebar -->
						
					<!-- Category -->
					
						<div class="p-b-60">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Category
								</h3>
							</div>

							<ul class="p-t-35">
								@foreach ($last_categories as $category)
								<li class="how-bor3 p-rl-4">
									<a href="{{route('category_by.article', $category->slug)}}" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
										{{$category->name}} <span>({{$category->articles->count()}})</span>
									</a>
									
								</li>
								@endforeach

							</ul>
						</div>
					



					<!-- Popular Posts -->
					<div class="p-b-30">
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
															@php $time= $article->created_at @endphp
															{{ $time->isoFormat('LLC') }}
														</span>
													</span>
												</div>
											</li>
										@endforeach
		
		
									</ul>
								</div>
		
		
				<!--  -->
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
								{{$tag->name}}
							</a>
						@endforeach
						</div>	
					</div>
	
@endsection

