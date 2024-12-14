@extends('back.app')

@section('page-title')
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4> Settings </h4>
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
                <form action="{{ route('setting.update' )}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                     
                       <!-- Colonne Title -->
                
                    <div class="form-row">
                     
                        <div class="form-group col-md-6">
                            <label for="title"><strong>Web Site</strong></label>
                            <input type="text" id="name" value="{{isset($settings) ? old('name', $settings->name) : old('name')}}"  name="name" class="form-control" placeholder="Enter web site name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Colonne Image -->
                        <div class="form-group col-md-6">
                            <label for="image"><strong>Logo</strong></label>
                           
                            <div class="custom-file">
                                <input type="file" value="{{isset($settings) ? old('image', $settings->image) : old('image')}}" name="image" class="custom-file-input" id="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title"><strong>Email</strong></label>
                            <input type="email" id="email" value="{{isset($settings) ? old('email', $settings->email) : old('email')}}" name="email" class="form-control" placeholder="Enter web site email">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="form-group col-md-6">
                            <label for="title"><strong>Phone</strong></label>
                            <input type="text" value="{{isset($settings) ? old('phone', $settings->phone) : old('phone')}}" id="phone" name="phone" class="form-control" placeholder="Enter web site phone number">
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="title"><strong>Adress</strong></label>
                            <input type="text" value="{{isset($settings) ? old('adress', $settings->adress) : old('adress')}}" id="adress" name="adress" class="form-control" placeholder="Enter web site adress">
                            @error('adress')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                </div>
                    
                        <div class="form-group col-md-12">
                            <label for="about"><strong>About Us</strong></label>
                            <textarea type="text" name="about" id="about" class="summernote">{{isset($settings) ? old('about', $settings->about) : old('about')}}</textarea>
                            @error('about')
                                <p class="text-danger">{{ $message }}</p>
                             @enderror
                        </div>


                        
                    </div>
                    <button type="submit" class="btn btn-primary"> Update </button>
                </form>
                
            </div>
        </div>
    </div>

</div>
@endsection
