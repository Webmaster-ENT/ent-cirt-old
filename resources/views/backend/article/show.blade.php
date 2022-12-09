<x-app-layout>
    <div class="w-full px-10 py-10 mx-auto">
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Article Information</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p>
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('article.destroy', $article) }}"
                    method="POST">

                    @csrf
                    @method('DELETE')
                    <a href="{{ route('article.show', $article) }}"
                        class="inline-block px-6 py-3 mt-6 mb-2 font-bold  text-end text-white uppercase transition-all border-0 rounded-lg cursor-pointer hover:scale-102 hover:shadow-soft-xs leading-pro text-xs bg-yellow-300 text-slate-800 ">Details</a>

                    <a href="{{ route('article.edit', $article) }}"
                        class="inline-block px-6 py-3 mt-6 mb-2 font-bold  text-end text-white uppercase transition-all border-0 rounded-lg cursor-pointer hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in  bg-slate-800 text-white-800 ">Edit</a>

                    <button type="submit"
                        class="inline-block px-6 py-3 mt-6 mb-2 font-bold  text-end text-white uppercase transition-all bg-transparent border-0 rounded-lg cursor-pointer hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-10 bg-x-25 bg-gradient-to-tl from-red-700 to-red-800 hover:border-red-700 hover:bg-red-700 hover:text-white">Delete
                    </button>
                </form>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Title</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $article->title }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Slug</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $article->slug }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Author</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $article->user['email'] }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Status</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 capitalize">{{ $article->status }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Thumbnail</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            @if ($article->thumbnail_url != '')
                                <img src="{{ asset('storage/images/' . $article->thumbnail_url) }}"
                                    class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out w-40 rounded-lg"
                                    alt="{{ $article->thumbnail_url }}" />
                            @else
                                <img src="{{ asset('images/default_image.png') }}"
                                    class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out w-40 rounded-lg"
                                    alt="{{ $article->thumbnail_url }}" />
                            @endif
                        </dd>

                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Summary</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $article->summary }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Body</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $article->body }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
