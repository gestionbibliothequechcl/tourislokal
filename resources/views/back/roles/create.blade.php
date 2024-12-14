@extends('back.app')

@section('page-title')
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4> @if (isset($role->id)) Update @else Create @endif Role</h4>
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
                <form action="{{ isset($role) ? route('update.roles', $role->id) : route('store.roles')}}" method="POST">
                    @csrf
                    @if (isset($role))
                        @method('PUT')
                    @endif
                    <!-- Label et bouton dans une ligne -->
                    <div class="form-row align-items-center mb-3">
                        <div class="col-md-8">
                            <label for="name">Name</label>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ route('list.roles') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>

                    <!-- Champ Name avec espacement -->
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" id="name" name="name" 
                                  value="{{isset($role->id) ? old('name', $role->name) : ''}}"
                                   class="form-control mb-3" 
                                   placeholder="Enter role name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    @if ($permissions->isNotEmpty())
                    <div class="permissions-container mb-4">
                        @foreach ($permissions as $permission)
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="permission-{{$permission->id}}">
                                    <input {{isset($role) && ($hasPermissions->contains($permission->name)) ? 'checked' : ' '}} type="checkbox" name="permission[]" class="form-check-input" id="permission-{{$permission->id}}"
                                           value="{{ $permission->name }}">
                                    {{ $permission->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">Aucune permission disponible.</p>
                @endif
            
                <!-- Bouton Save -->
                <button type="submit" class="btn btn-primary"> @if(isset($role)) Update @else Save @endif</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
