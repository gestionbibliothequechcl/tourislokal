@extends('back.app')

@section('page-title')
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>List Categories</h4>
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
                <a href="{{route('category.create')}}" class="btn btn-primary">Create Category</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Sub Name</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($categories as $category)
                               
                          
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->sub_category}}</td>
                                    <td>
                                        <span class="badge {{ $category->isActive == 1 ? 'badge-success' : 'badge-danger' }}">
                                            {{ $category->isActive == 1 ? 'ACTIVE' : 'DESACTIVE' }}
                                        </span>
                                    </td>
                                    
                                    <td>{{\Carbon\Carbon::parse($category->created_at)->format('d M Y')}}</td>
                                    <td>
                                      <span>
                                            <a href="{{ route('category.edit', $category) }}" class="mr-4" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-pencil color-muted"></i>
                                            </a>
                                              <form action="{{ route('category.destroy', $category) }}" method="POST" class="delete-form" style="display: inline;">
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
                    title: 'Êtes-vous sûr de vouloir supprimer cette categorie ?',
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
