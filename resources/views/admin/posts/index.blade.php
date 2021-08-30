<x-app-layout>

<br>
    <div class="container mx-auto">
        <div class="row justify-content-center">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
        
            </div>
            <div class="row">
                
                    <p class="text-lg text-center font-bold ">Lista de Post</p>
                    <a href="{{route('admin.posts.create')}}" class="btn btn-sm btn-primary float-right">Crear</a>
                
                <table class="rounded-t-lg m-5 mx-auto bg-gray-200 text-gray-800">

                    <thead>
                        <tr class="text-left border-b-2 border-gray-300">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Titulo</th>
                            <th class="px-4 py-3">Descripcion</th>
                            <th colspan="2">&nbsp;</th>                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr class="bg-gray-100 border-b border-gray-200">
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td>
                                    <a href="{{ route("admin.posts.edit", $post) }}" class="btn btn-primary btn-sm">Editar</a>
                                                                      
                                </td>
                                <td>
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Eliminar" class="btn btn-danger btn-sm" onclick="return confirm('¿Desea eliminar?')">
                                    </form>
                                </td>
                                

                            </tr>
                    </tbody>
                    @endforeach

                </table>
            </div>
        </div>
    </div>

</x-app-layout>
