<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home 01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


@include('front.partials.styles')
</head>
<body class="animsition">
	
@include('front.partials.header')

	<!-- Headline -->

	<div class="container">
		@yield('headline')
	</div>
		
	<!-- Feature post -->
	<section class="bg0">
		<div class="container">
			@yield('feature-post')
		</div>
	</section>

	<!-- Post -->
	<section class="bg0 p-t-70">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8">
					@yield('post-main')
				</div>

				<div class="col-md-10 col-lg-4">
					@yield('sidebar')
				</div>
			</div>
		</div>
	</section>
	</section>


	<!-- Banner -->
	<div class="container">
		<div class="flex-c-c">
			<a href="#">
				<img class="max-w-full" src="{{asset('front_end/images/banner-01.jpg')}}" alt="IMG">
			</a>
		</div>
	</div>

	<!-- Latest -->
	<section class="bg0 p-t-60 p-b-35">
		<div class="container">
            @yield('last-post')
		</div>
	</section>


@include('front.partials.footer')

@include('front.partials.scripts')

    
</body>
</html>