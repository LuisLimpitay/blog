<x-app-layout>
    <br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card mb-4">

                    @if ($post->image)
                        <img src="{{ $post->get_image }}" class="card-img-top">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        @if ($post->iframe)
                            <div class="embed-responsive embed-responsive-16by9">
                                {!! $post->iframe !!}
                            </div>
                        @endif

                    <p class="card-text">
                        {{ $post->description }}
                    </p>

                    <br><br><hr>
                    <p class="text-mutted mb-0">

                        <em>
                            &ndash; {{ $post->user->name }}
                        </em>

                        {{ $post->created_at->format("d m Y") }}

                    </p>

                </div>

            </div>

        </div>
    </div>
</div>
</x-app-layout>