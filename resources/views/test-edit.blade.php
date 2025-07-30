<!DOCTYPE html>
<html>
<head>
    <title>Test Edit Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body>
    <h1>Test Edit Form - Document ID: 7</h1>
    
    @if(session('message'))
        <div style="background: green; color: white; padding: 10px; margin: 10px 0;">
            {{ session('message') }}
        </div>
    @endif

    @if(session('error'))
        <div style="background: red; color: white; padding: 10px; margin: 10px 0;">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="background: red; color: white; padding: 10px; margin: 10px 0;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('docs.update', 7) }}" 
          x-data="{ submitting: false }"
          @submit="submitting = true; console.log('Form submitting to:', $el.action);">
        @csrf
        @method('PUT')
        <input type="hidden" name="doc_type" value="engineering">
        
        <div style="margin: 10px 0;">
            <label>Title:</label><br>
            <input type="text" name="title" value="Test Title Update {{ now() }}" style="width: 300px; padding: 5px;">
        </div>
        
        <div style="margin: 10px 0;">
            <label>Purpose:</label><br>
            <textarea name="purpose" style="width: 300px; height: 100px; padding: 5px;">Test Purpose Update {{ now() }}</textarea>
        </div>
        
        <div style="margin: 10px 0;">
            <label>Scope:</label><br>
            <textarea name="scope" style="width: 300px; height: 100px; padding: 5px;">Test Scope Update {{ now() }}</textarea>
        </div>
        
        <div style="margin: 20px 0;">
            <button type="submit" 
                    :disabled="submitting"
                    style="background: blue; color: white; padding: 10px 20px; border: none; cursor: pointer;">
                <span x-text="submitting ? 'Saving...' : 'Save Changes'"></span>
            </button>
            
            <button type="button" 
                    @click="submitting = false"
                    x-show="submitting"
                    style="background: red; color: white; padding: 10px 20px; border: none; cursor: pointer; margin-left: 10px;">
                Cancel
            </button>
        </div>
    </form>

    <script>
        console.log('Test page loaded');
        console.log('CSRF Token:', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        console.log('Action URL:', '{{ route('docs.update', 7) }}');
    </script>
</body>
</html>
