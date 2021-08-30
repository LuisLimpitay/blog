<x-app-layout>
    <!-- component -->
    <div class="flex justify-center items-center w-screen h-screen bg-gray-800">
        <!-- COMPONENT CODE -->
        <div class="flex m-4 shadow bg-white max-w-sm hover:bg-gray-200">
            <div class="flex flex-col">
                {{-- <img alt="Unpretentious Baker" class="object-scale-down h-30 w-auto"
                    src="{{$post->get_image}}" /> --}}
                <div class="mx-2">

                    <h1 class="font-bold text-center">{{ $post->title }}</h1>
                    <!-- Install Plugin: Line Clamp | npm install @tailwindcss/line-clamp -->
                    <p class="text-sm text-center line-clamp-2 my-2">
                        {{ $post->description }}
                    </p>

                </div>
            </div>
        </div>
        <!-- COMPONENT CODE -->
    </div>
</x-app-layout>
