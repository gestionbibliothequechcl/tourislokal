@extends('back.app')

@section('page-title')
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>List Social Media</h4>
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
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <!-- Messages -->
            <x-message />

            <!-- Bouton Back à droite -->
            <div class="card-header d-flex justify-content-end">
                <a href="{{route('social_media.create')}}" class="btn btn-primary">Create Social Media</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Link</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                     
                               
                          @foreach ($socials_media  as $social_media)
                                <tr>
                                    <td>{{$social_media->id}}</td>
                                    <td>{{$social_media->name}}</td>
                                    <td>
                                        <a href="{{$social_media->link}}" target="blank">{{$social_media->link}}</a>
                                    </td>
                                    <td>
                                        <i class="{{$social_media->icon}}"></i>
                                    </td>
                                    
                                    <td>{{\Carbon\Carbon::parse($social_media->created_at)->format('d M Y')}}</td>
                                    <td>
                                      <span>
                                            <a href="{{ route('social_media.edit', $social_media) }}" class="mr-4" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-pencil color-muted"></i>
                                            </a>
                                        <form action="{{ route('social_media.destroy', $social_media) }}" method="POST" class="delete-form" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="delete-btn" style="border: none; background: none; cursor: pointer;">
                                                    <i class="fa fa-close color-danger" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                                                </button>
                                            </form>
                                        </span> 
                                    </td>
                                    
                                    
                                </tr>
                            @endforeach
                         
                        </tbody>
                    </table>
                </div>
   
            </div>
        </div>
    </div>
 
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        // Ajoutez un événement au clic sur le bouton de suppression
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();  // Empêche le formulaire de soumettre immédiatement
                const form = this.closest('form');  // Récupère le formulaire parent
    
                // Affiche le SweetAlert de confirmation
                Swal.fire({
                    title: 'Êtes-vous sûr de vouloir supprimer cette reseaux social ?',
                    text: 'Cette action est irréversible !',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Supprimer',
                    cancelButtonText: 'Annuler',
                    reverseButtons: true  // Boutons inversés (Annuler à gauche et Confirmer à droite)
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();  // Soumettre le formulaire pour supprimer l'élément
                    }
                });
            });
        });
    </script>
    @endpush
    
</div>




@endsection
