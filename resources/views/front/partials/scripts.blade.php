<script src="{{ asset('front_end/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('front_end/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('front_end/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('front_end/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('front_end/js/main.js') }}"></script>
          <!-- Inclusion de jQuery et Summernote -->
		  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
		  
		  <script>
			  $(document).ready(function() {
				  $('#content').summernote({
					  placeholder: 'Écrivez votre contenu ici...',
					  tabsize: 2,
					  height: 200
				  });
			  });
		  </script>



