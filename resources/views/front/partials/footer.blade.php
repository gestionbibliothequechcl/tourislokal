	<!-- Footer -->
	<footer>
		<div class="bg2 p-t-40 p-b-25">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 p-b-20">
	
						<div class="size-h-3 flex-s-c">
							{{-- <a href="index.html">
								<img class="max-s-full" src="images/icons/logo-02.png" alt="LOGO">
							</a> --}}
							<h1 class="custom-logo-text"> 
								<span class="text-success">TORIS</span>
								<span class="text-white">LOKAL</span>
							</h1>
						</div>
						<style>
							.custom-logo-text {
								font-size: 2rem; /* Ajustez la taille ici */
								font-weight: bold;
							}
						</style>
		
						<div>
							@foreach ($infos_settings as $infos)
								
							
								
							
							<p class="f1-s-1 cl11 p-b-16">
								{{$infos->about}}
							</p>

							<p class="f1-s-1 cl11 p-b-16">
								Any questions? Call us on {{$infos->phone}}
							</p>
							<p class="f1-s-1 cl11 p-b-16">
								{{$infos->adress}}
							</p>
							@endforeach 
		
						
		
							<div class="p-t-15">
								@foreach ($socials_media as $social)
									<a href="{{ $social->link }}" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
										<span class="{{ $social->icon }}"></span>
									</a>
								@endforeach
							</div>
						</div>
					</div>
		
					<div class="col-sm-6 col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								Popular Posts
							</h5>
						</div>
		
						<ul>
							@foreach ($global_popular_article as $article)
							@if ($loop->iteration === 4)
								@break
							@endif
								<li class="flex-wr-sb-s p-b-20">
									<a href="{{ route('article.details', $article->slug) }}" class="size-w-4 wrap-pic-w hov1 trans-03">
										<img src="{{ $article->imageUrl() }}" alt="IMG">
									</a>
		
									<div class="size-w-5">
										<h6 class="p-b-5">
											<a href="{{ route('article.details', $article->slug) }}" class="f1-s-5 cl11 hov-cl10 trans-03">
												{{ $article->title }}
											</a>
										</h6>
		
										<span class="f1-s-3 cl6">
											{{ \Carbon\Carbon::parse($article->created_at)->format('d M Y')}}
										</span>
									</div>
								</li>
							@endforeach
						</ul>
					</div>
		
					<div class="col-sm-6 col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								Category
							</h5>
						</div>
		
						<ul class="m-t--12">
							@foreach ($global_categories as $category)
								@if ($loop->iteration === 7)
									@break
								@endif
								<li class="how-bor1 p-rl-5 p-tb-10">
									<a href="{{route('category_by.article', $category->slug)}}" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
										{{ $category->name }} ({{ $category->articles->count() }})
									</a>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
		

		<div class="bg11">
			<div class="container size-h-4 flex-c-c p-tb-15">
				<span class="f1-s-1 cl0 txt-center">
					Copyright © 2024 

					<a href="#" class="f1-s-1 cl10 hov-link1">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Toris Lokal <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" target="_blank">Jek-Design</a>

				</span>
			</div>
		</div>
	</footer>

    	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<span class="fas fa-angle-up"></span>
		</span>
	</div>

	<!-- Modal Video 01-->
	<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document" data-dismiss="modal">
			<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

			<div class="wrap-video-mo-01">
				<div class="video-mo-01">
					<iframe src="https://www.youtube.com/embed/wJnBTPUQS5A?rel=0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>