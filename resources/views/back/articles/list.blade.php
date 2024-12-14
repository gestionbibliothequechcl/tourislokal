@extends('back.app')

@section('page-title')
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>List Articles</h4>
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
                <a href="#" class="btn btn-primary">Create Article</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Tile</th>
                                <th scope="col">Image</th>
                                <th scope="col">Category</th>
                                <th scope="col">IsActive</th>
                                <th scope="col">IsShare</th>
                                <th scope="col">IsComment</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                       
                               
                          @foreach ($articles as $article)
                              
                                <tr>
                                    <td>{{$article->id}}</td>
                                    <td>{{$article->title}}</td>
                                    <td> <img src="{{ $article->imageUrl() }}" alt="{{ $article->title }}" width="50px" height="50px"> </td>

                                    <td>{{$article->category->name}}</td>

                                    <td>
                                        <span class="badge {{ $article->isActive == 1 ? 'badge-success' : 'badge-danger' }}">
                                            {{ $article->isActive == 1 ? 'ACTIVE' : 'DESACTIVE' }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge {{ $article->isShare == 1 ? 'badge-success' : 'badge-danger' }}">
                                            {{ $article->isShare == 1 ? 'PARTAGER' : 'NON PARTAGER' }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge {{ $article->isComment == 1 ? 'badge-success' : 'badge-danger' }}">
                                            {{ $article->isComment == 1 ? 'AUTORIE' : 'NON AUTORISE' }}
                                        </span>
                                    </td>


                                    
                                    <td>{{\Carbon\Carbon::parse($article->created_at)->format('d M Y')}}</td>
                                    <td>
                                      <span>
                                        <a href="{{route('post.edit', $article)}}" class="mr-4" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-pencil color-muted"></i>
                                        </a>
                                        
                                              <form action="{{ route('post.destroy', $article) }}" method="POST" class="delete-form" style="display: inline;">
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
                    title: 'Êtes-vous sûr de vouloir supprimer cette article ?',
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
