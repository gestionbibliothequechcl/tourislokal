@extends('back.app')

@section('page-title')
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4> @if(isset($permission)) Update @else Create @endif Permissions</h4>
            <span class="ml-1">Element</span>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Element</a></li>
        </ol>
    </div>
@endsection

@section('content')
<div class="col-xl-12 col-xxl-12">

    <div class="card">
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ isset($permission->id) ? route('update.permission', $permission->id) : route('store.permission') }}" method="POST">
                    @csrf
                    @if (isset($permission->id))
                        @method('PUT')
                    @endif

                    <!-- Label et bouton dans une ligne -->
                    <div class="form-row align-items-center mb-3">
                        <div class="col-md-8">
                            <label for="name">Name</label>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ route('list.permission') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>

                    <!-- Champ Name avec espacement -->
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" id="name" name="name" 
                                   value="{{ old('name', $permission->name ?? '') }}" 
                                   class="form-control mb-3" 
                                   placeholder="Enter Permission name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Bouton Save -->
                    <button type="submit" class="btn btn-primary"> @if(isset($permission)) Update @else Save @endif </button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
