<x-app-layout>
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6>Articles table</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Thumbnail</th>
                                        <th
                                            class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Title</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Status</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $article)
                                        <tr>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2 py-1">
                                                    <div>
                                                        @if ($article->thumbnail_url != '')
                                                            <img src="{{ asset('storage/images/' . $article->thumbnail_url) }}"
                                                                class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out w-40 rounded-lg"
                                                                alt="{{ $article->thumbnail_url }}" />
                                                        @else
                                                            <img src="{{ asset('images/default_image.png') }}"
                                                                class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out w-40 rounded-lg"
                                                                alt="{{ $article->thumbnail_url }}" />
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p
                                                    class="text-center inline-block font-semibold leading-none text-xs capitalize">
                                                    {{ $article->title }}</p>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                @if ($article->status == 'draft')
                                                    <span
                                                        class="bg-gradient-to-tl from-slate-600 to-slate-300 px-3 text-xs rounded py-2.3 inline-block whitespace-nowrap text-center align-baseline font-bold capitalize leading-none text-white">Draft</span>
                                                @else
                                                    <span
                                                        class="bg-gradient-to-tl from-green-600 to-lime-400 px-3 text-xs rounded-1.8 py-2.3 inline-block whitespace-nowrap text-center align-baseline font-bold capitalize leading-none text-white">
                                                        Publish</span>
                                                @endif
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('article.destroy', $article) }}" method="POST">

                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('article.show', $article) }}"
                                                        class="inline-block px-4 py-2 mt-6 mb-2 font-bold  text-end text-white uppercase transition-all border-0 rounded-lg cursor-pointer hover:scale-102 hover:shadow-soft-xs leading-pro text-xs bg-yellow-300 text-slate-800 ">Details</a>

                                                    <a href="{{ route('article.edit', $article) }}"
                                                        class="inline-block px-4 py-2 mt-6 mb-2 font-bold  text-end text-white uppercase transition-all border-0 rounded-lg cursor-pointer hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in  bg-slate-800 text-white-800 ">Edit</a>

                                                    <button type="submit"
                                                        class="inline-block px-4 py-2 mt-6 mb-2 font-bold  text-end text-white uppercase transition-all bg-transparent border-0 rounded-lg cursor-pointer hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-10 bg-x-25 bg-gradient-to-tl from-red-700 to-red-800 hover:border-red-700 hover:bg-red-700 hover:text-white">Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
