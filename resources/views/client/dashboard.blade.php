<x-client-layout>
    @section('head')
        <title>{{ __('Dashboard') }} {{ config('settings.separator') }}
            {{ __(config('settings.title')) }}</title>
    @endsection
    {{-- diclare variables --}}
    <script>
        var ordersArr = [];
        var orders = [];
        var last12MonthsOrders = [];
    </script>
    <x-client>

        <div class="w-full relative mx-auto">
            <script src="https://cdn.tiny.cloud/1/edatjijq3znonlnqtey2tjt90kroa9yg8d4dd0dz8sbaitlz/tinymce/6/tinymce.min.js"
                referrerpolicy="origin"></script>
            <textarea>
                Welcome to TinyMCE!
              </textarea>
            <script>
                tinymce.init({
                    selector: 'textarea',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [{
                            value: 'First.Name',
                            title: 'First Name'
                        },
                        {
                            value: 'Email',
                            title: 'Email'
                        },
                    ],
                });
            </script>

        </div>

    </x-client>
</x-client-layout>
