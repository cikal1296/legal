<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                  <x-category-tabs />

                </div>
            </div>
        </div>

    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="">
            <div class="p-4">
                 <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
<x-post-item :post="$post"></x-post-item>
                @endforeach
            </div>
        </div>
    </div>
    {{ $posts->links() }}
    </div>
</x-app-layout>