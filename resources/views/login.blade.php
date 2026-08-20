<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل دخول الأدمن</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    <div class="card p-4 shadow-sm" style="width: 350px;">
        <h4 class="text-center mb-3">دخول لوحة التحكم</h4>
        @if(session('error'))
            <div class="alert alert-danger p-2 fs-6">{{ session('error') }}</div>
        @endif
        <form action="{{ route('admin') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور:</label>
                <input type="password" name="password" id="password" class="form-control" required placeholder="أدخل كلمة المرور">
            </div>
            <button type="submit" class="btn btn-dark w-100">دخول</button>
        </form>
    </div>
</body>
</html>