<x-app-layout>
    <br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route("admin.posts.update", $post) }}" method="post" enctype="multipart/form-data">
                    
                        <div class="form-group">
                            <label>Título *</label>
                            <input type="text" name="title" class="form-control" required value="{{ old("title", $post->title) }}">
                        </div>

                        <div class="form-group">
                            <label>Descripcion *</label>
                            <textarea name="description" rows="6" class="form-control">{{ old("description", $post->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Imagen</label>
                            <input type="file" name="file" class="form-control-file">
                        </div>
                        
                        <div class="form-group">
                            <label>Contenido embebido</label>
                            <textarea name="iframe" class="form-control">{{ old("iframe", $post->iframe) }}</textarea>
                        </div>

                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <input type="submit" value="Actualizar" class="btn btn-primary btn-sm">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
</x-app-layout>