@extends('layouts.admin')

@section('content')
    <div class="mx-auto max-w-3xl p-4">
        @if (session('success'))
            <div class="mb-4 rounded bg-green-200 p-2 text-green-900">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.new-kurikulum-store') }}" method="POST">
            <a href="{{ route('admin.kurikulum-section') }}">back</a>
            @csrf <div class="mb-4">
                <label class="mb-2 block font-medium">Title</label>
                <input type="text" name="title" class="w-full rounded border p-2">
            </div>

            <div class="mb-4">
                <label class="mb-2 block font-medium">Content</label>
                <div id="toolbar"></div>
                <div id="editor" class="min-h-[200px] rounded border p-2"></div>
                <input type="hidden" name="body" id="body">
            </div>

            <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-white">
                Save
            </button>
        </form>
    </div>

    <!-- Quill -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script>
        const quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, false]
                    }],
                    ['bold', 'italic', 'underline'],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    ['link'],
                    ['clean']
                ]
            }
        });

        document.querySelector('form').onsubmit = () => {
            document.querySelector('#body').value = quill.root.innerHTML;
        };
    </script>
@endsection
