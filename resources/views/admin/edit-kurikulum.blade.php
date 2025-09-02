@extends('layouts.admin')

@section('content')
    <div class="mx-auto max-w-3xl p-4">
        @if (session('success'))
            <div class="mb-4 rounded bg-green-200 p-2 text-green-900">
                {{ session('success') }}
            </div>
        @endif
        
        @if (session('error'))
            <div class="mb-4 rounded bg-red-200 p-2 text-red-900">
                {{ session('error') }}
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('admin.kurikulum-section') }}" class="text-blue-600 hover:text-blue-800">
                ← Back to Kurikulum List
            </a>
        </div>

        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Edit Kurikulum</h1>
            <p class="text-gray-600">Update curriculum content</p>
        </div>

        <form action="{{ route('admin.kurikulum.update', $kurikulum->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="mb-2 block font-medium">Title</label>
                <input type="text" 
                       name="title" 
                       value="{{ old('title', $kurikulum->title) }}"
                       class="w-full rounded border p-2 @error('title') border-red-500 @enderror">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label class="mb-2 block font-medium">Content</label>
                <div id="toolbar"></div>
                <div id="editor" class="min-h-[200px] rounded border p-2"></div>
                <input type="hidden" name="body" id="body" value="{{ old('body', $kurikulum->body) }}">
                @error('body')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex space-x-3">
                <button type="submit" class="rounded bg-blue-600 px-6 py-2 text-white hover:bg-blue-700 transition-colors">
                    Update Kurikulum
                </button>
                <a href="{{ route('admin.kurikulum-section') }}" 
                   class="rounded bg-gray-300 px-6 py-2 text-gray-700 hover:bg-gray-400 transition-colors">
                    Cancel
                </a>
            </div>
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

        // Set existing content in the editor
        const existingContent = document.querySelector('#body').value;
        if (existingContent) {
            quill.root.innerHTML = existingContent;
        }

        // Update hidden input when form is submitted
        document.querySelector('form').onsubmit = () => {
            document.querySelector('#body').value = quill.root.innerHTML;
        };
    </script>
@endsection