@extends('back.app')

@section('page-title')
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4> Create  Category</h4>
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
                <form action="{{ isset($article) ? route('post.update', $article) : route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($article))
                        @method('PUT')
                    @endif
                     
                       <!-- Colonne Title -->
                       <div class="form-group col-md-12">
                        <label for="title"><strong>Title</strong></label>
                        <input type="text" id="title" name="title" value="{{ isset($article) ? old('title', $article->title) : old('title') }}" class="form-control" placeholder="Enter article title">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-row">
                     
                        <!-- Colonne Category -->
                        <div class="form-group col-md-6">
                            <label for="category_id"><strong>Category</strong></label>
                            <select class="form-control" id="category_id" name="category_id">
                                @if ($categories->isNotEmpty())
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ isset($article) && $article->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                @else
                                    <option>Aucune catégorie trouvée</option>
                                @endif
                            </select>
                        </div>
                        
                    
                        <!-- Colonne Image -->
                        <div class="form-group col-md-6">
                            <label for="image"><strong>Image</strong></label>
                           
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <label for="content"><strong>Content</strong></label>
                        <textarea name="content" id="content" class="summernote">{{ isset($article) ? old('content', $article->content) : old('content') }}</textarea>
                        @error('content')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Inclusion de jQuery et Summernote -->
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
                    
                    <script>
                        $(document).ready(function() {
                            $('#content').summernote({
                                placeholder: 'Écrivez votre contenu ici...',
                                tabsize: 2,
                                height: 200
                            });
                        });
                    </script>
                    
                        <div class="form-group col-12">
                            <label for="content"><strong>Tags</strong></label>
                            <input class="form-control" value="{{ isset($article) ? old('tags', $article->tags->pluck('name')->implode(', ')) : old('tags') }}"  type="text" data-role="tagsinput" name="tags" placeholder="Ajoutez des tags">
                            @if ($errors->has('tags'))
                                <span class="text-danger">{{ $errors->first('tags') }}</span>
                            @endif
                        </div>
                        
                           
                        <div class="row">
                            <!-- IsActive -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Statut :</label>
                                <div class="form-check">
                                    <input class="form-check-input" @if (isset($article)) @checked($article->isActive == 1) @else checked @endif 
                                        type="radio" name="isActive" value="1" id="active">
                                    <label class="form-check-label" for="active">
                                        Activer
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" @if (isset($article)) @checked($article->isActive == 0) @else checked @endif 
                                        type="radio" name="isActive" value="0" id="inactive">
                                    <label class="form-check-label" for="inactive">
                                        Désactiver
                                    </label>
                                </div>
                                @error('isActive')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        
                            <!-- IsShare -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Partager :</label>
                                <div class="form-check">
                                    <input class="form-check-input" @if (isset($article)) @checked($article->isShare == 1) @else checked @endif 
                                        type="radio" name="isShare" value="1" id="share">
                                    <label class="form-check-label" for="share">
                                        Partager
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" @if (isset($article)) @checked($article->isShare == 0) @else checked @endif 
                                    type="radio" name="isShare" value="0" id="not-share">
                                    <label class="form-check-label" for="not-share">
                                        Non Partager
                                    </label>
                                </div>
                                @error('isShare')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        
                            <!-- IsComment -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Commenter :</label>
                                <div class="form-check">
                                    <input class="form-check-input"  @if(isset($article)) @checked($article->isComment == 1) @else checked @endif  type="radio" name="isComment" value="1" id="comment">
                                    <label class="form-check-label" for="comment">
                                        Commenter
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" @if (isset($article)) @checked($article->isComment == 0) @else checked @endif
                                         type="radio" name="isComment" value="0" id="not-comment">
                                    <label class="form-check-label" for="not-comment">
                                        Non Commenter
                                    </label>
                                </div>
                                @error('isComment')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        
                    </div>
                    <button type="submit" class="btn btn-primary"> Save </button>
                </form>
                
            </div>
        </div>
    </div>

</div>
@endsection
