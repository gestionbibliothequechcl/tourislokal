@extends('back.app')

@section('page-title')
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4> @if(isset($social_media)) Update @else Create @endif Social Media</h4>
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
                <form action="{{ isset($social_media) ? route('social_media.update', $social_media) : route('social_media.store')}}" method="POST">
                    @csrf
                    @if (isset($social_media))
                        @method('PUT')
                    @endif
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" id="name" name="name" value="{{isset($social_media) ? old('name', $social_media->name) : old('name')}}" class="form-control mb-3" placeholder="Enter social media name" required>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" id="link" name="link"  value="{{isset($social_media) ? old('link', $social_media->link) : old('link')}}" class="form-control mb-3" placeholder="Enter social media link">
                            @error('link')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <input type="text" id="icon" name="icon"  value="{{isset($social_media) ? old('icon', $social_media->icon) : old('icon')}}" class="form-control mb-3" placeholder="Enter social media icon">
                            @error('icon')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        
                    </div>
                    <button type="submit" class="btn btn-primary"> @if (isset($social_media)) Update @else Save @endif </button>
                </form>
                
            </div>
        </div>
    </div>

</div>
@endsection
