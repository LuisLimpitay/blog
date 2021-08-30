<x-app-layout>
    <!-- ************************************************************************************************************-->
    {{-- CARD DE CURSOS --}}
    <!-- ************************************************************************************************************-->
    <br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($posts as $post)
                    <div class="card mb-4">
                        @if ($post->image)
                            <img src="{{ $post->get_image }}" class="card-img-top">

                        @elseif ($post->iframe)
                            <div class="embed-responsive embed-responsive-16by9">
                                {!! $post->iframe !!}
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">
                            <p>{{ $post->description }}</p>
                            <a href="{{ route('posts.show', $post) }}">Leer mas...</a>
                            </p>

                            <br><br>
                            <hr>
                            <p class="text-muted mb-0">
                                <em>
                                    &ndash; {{ $post->user->name }}
                                </em>
                                {{ $post->created_at->format('d/m/Y') }}
                            </p>
                        </div>
                    </div>
                @endforeach
                {{ $posts->links() }}
            </div>
        </div>
    </div>
    <!-- ************************************************************************************************************-->
    {{-- FIN CARD DE CURSOS --}}
    <!-- ************************************************************************************************************-->

</x-app-layout>
