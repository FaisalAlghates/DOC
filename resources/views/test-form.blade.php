<!DOCTYPE html>
<html>
<head>
    <title>Test Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>اختبار النموذج</h1>
    
    @if(session('message'))
        <div style="background: green; color: white; padding: 10px;">
            {{ session('message') }}
        </div>
    @endif
    
    @if(session('error'))
        <div style="background: red; color: white; padding: 10px;">
            {{ session('error') }}
        </div>
    @endif
    
    <form method="POST" action="{{ route('docs.update', 1) }}">
        @csrf
        @method('PUT')
        
        <div>
            <label>Title:</label>
            <input type="text" name="title" value="اختبار التحديث" required>
        </div>
        
        <div>
            <label>Purpose:</label>
            <textarea name="purpose">اختبار الغرض</textarea>
        </div>
        
        <button type="submit">حفظ</button>
    </form>
</body>
</html>
