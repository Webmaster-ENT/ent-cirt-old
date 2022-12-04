<x-app-layout>
    <div class="w-full px-6 py-6 mx-auto">
        <form role="form text-left" action="{{ route('article.store') }}" method="post">
            @csrf
            <div class="bg-white px-4 py-5 sm:p-6">
                <div class="grid grid-rows-3 grid-flow-col gap-4">
                    <div class="col-span-2">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" id="title"
                            class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                    </div>

                    <div class="row-span-2 col-span-2">
                        <label for="ispulished" class="block text-sm font-medium text-gray-700">Is Published</label>
                        <input type="boolean" name="ispublished" id="ispublisehd"
                            class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                    </div>

                    <div class="col-span-2">
                        <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" name="slug" id="slug"
                            class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                    </div>


                    <div class="row-span-2 col-span-2">
                        <label for="thumbnail_url" class="block text-sm font-medium text-gray-700">Thumbnail</label>
                        <input type="text" name="thumbnail_url" id="thumbnail_url"
                            class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                    </div>


                    <div class="row-span-2">
                        <label for="summary" class="block text-sm font-medium text-gray-700">Summary</label>
                        <textarea type="text" name="summary" id="summary"
                            class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                            rows="5"></textarea>
                    </div>
                    <div class="row-span-2 col-span-2">
                        <label for="user_id" class="block text-sm font-medium text-gray-700">Author</label>
                        <select id="user_id" name="user_id"
                            class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                            <option value="1">Admin</option>
                            <option value="2">Guest</option>
                        </select>
                    </div>
                </div>
                <div class="col-span-3">
                    <textarea name="body" id="editor"
                        class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"></textarea>
                </div>
                <div class="text-start">
                    <button type="submit"
                        class="inline-block px-6 py-3 mt-6 mb-2 font-bold  text-end text-white uppercase transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 hover:border-slate-700 hover:bg-slate-700 hover:text-white">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <!-- CKEDITOR -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
</x-app-layout>
