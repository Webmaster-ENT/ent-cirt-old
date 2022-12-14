<x-app-layout>

    <div class="w-full px-10 py-6 mx-auto">
        <form role="form text-left" action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="bg-white px-4 py-5 sm:p-6 rounded-2xl">
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-3">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" id="title"
                            class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                            placeholder="Title" required>
                    </div>
                    <div>
                        <label for="ispulished" class="block text-sm font-medium text-gray-700">Status</label>
                        <div class="flex">
                            <div class="flex items-center mr-4">
                                <input id="inilineRadio1" type="radio" name="status" value="publish"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="inilineRadio1"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-700">Publish</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input checked id="inilineRadio2" type="radio" name="status" value="draft"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="inilineRadio2"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-700">Draft</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-3">
                        <textarea name="body" id="editor" placeholder="Isi Artikel"
                            class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"></textarea>
                    </div>
                    <div class="row-span-2">
                        <label for="thumbnail_url" class="block text-sm font-medium text-gray-700">Thumbnail</label>
                        <input type="file" name="thumbnail_url" id="thumbnail_url" onchange="previewImage()"
                            required>
                        <img class="img-preview img-fluid w-48 mt-4">
                    </div>
                    <div class="text-start">
                        <button type="submit"
                            class="inline-block px-6 py-3 mt-6 mb-2 font-bold  text-end text-white uppercase transition-all bg-transparent border-0 rounded-lg cursor-pointer hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-10 bg-x-25 bg-gradient-to-tl from-slate-700 to-slate-800 hover:border-slate-700 hover:bg-slate-700 hover:text-white">Simpan</button>
                    </div>

                </div>
            </div>
        </form>
    </div>

    <!-- CKEDITOR -->

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        // Replace the <textarea id="editor"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('editor');

        function previewImage() {

            const image = document.querySelector('#thumbnail_url');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
    <script></script>

</x-app-layout>
