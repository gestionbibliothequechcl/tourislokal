@if (Session::has('success'))
    <div class="alert alert-success solid alert-square ">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
            <span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-light alert-dismissible fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
            <span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Error!</strong> {{ Session::get('error') }}
    </div>
@endif
