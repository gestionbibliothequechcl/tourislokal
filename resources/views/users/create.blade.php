@extends('back.app')

@section('page-title')
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Create Users</h4>
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
                <form action="{{route('users.store')}}" method="POST">
                    @csrf 
               
                    <!-- Label et bouton dans une ligne -->
                    <div class="form-row align-items-center mb-3">
                        <div class="col-md-8">
                            <label for="name">Name</label>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="#" class="btn btn-primary">Back</a>
                        </div>
                    </div>

                    <!-- Champ Name avec espacement -->
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" id="name" name="name" 
                                  value="{{ old('name') }}"
                                   class="form-control mb-3" >
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <input type="email" id="email" name="email" 
                                  value="{{ old('email') }}"
                                   class="form-control mb-3" placeholder="Enter your email">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <input type="password" id="password" name="password" 
                                  value="{{ old('password') }}"
                                   class="form-control mb-3">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <input type="password" id="confirm_password" name="confirm_password" 
                                  value="{{ old('name') }}"
                                   class="form-control mb-3">
                            @error('confirm_password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    @if ($roles->isNotEmpty())
                    <div class="permissions-container mb-4">
                        @foreach ($roles as $role)
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="role-{{$role->id}}">
                                     <input {{--{{ $hasRoles->contains(fn($value) => strtolower($value) == strtolower($role->name)) ? 'checked' : '' }} --}}
                                    type="checkbox" name="role[]" class="form-check-input" id="role-{{$role->id}}" 
                                    value="{{ $role->name }}">
                                
                                    {{ $role->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">Aucune Role disponible.</p>
                @endif
            
                <!-- Bouton Save -->
                <button type="submit" class="btn btn-primary"> Update </button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
