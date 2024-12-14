@extends('back.app')

@section('page-title')
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4> @if(isset($category)) Update @else Create @endif Category</h4>
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
                <form action="{{ isset($category) ? route('category.update', $category) : route('category.store') }}" method="POST">
                    @csrf
                    @if (isset($category))
                        @method('PUT')
                    @endif
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" id="name" name="name" value="{{ isset($category) ? old('name', $category->name) : old('name') }}" class="form-control mb-3" placeholder="Enter Category name" required>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" id="sub_category" name="sub_category" value="{{isset($category) ? old('sub_category', $category->sub_category) : old('sub_category')}}" class="form-control mb-3" placeholder="Enter Sub Category">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea class="form-control" name="description" rows="4" placeholder="Description de la catégorie">{{isset($category) ? old('description', $category->description) : old('description')}}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="radio-inline mr-5">
                                <input type="radio" name="isActive" value="1" 
                                    {{ isset($category) && $category->isActive == 1 ? 'checked' : '' }}>
                                Activer
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="isActive" value="0" 
                                    {{ isset($category) && $category->isActive == 0 ? 'checked' : '' }}>
                                Désactiver
                            </label>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary"> @if (isset($category)) Update @else Save @endif </button>
                </form>
                
            </div>
        </div>
    </div>

</div>
@endsection
