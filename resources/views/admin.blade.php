<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم - نايس ون</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="background-color: #f8f9fa;">

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #220C17;">لوحة تحكم الأدمن</h2>
        <a href="{{ url('/') }}" class="btn btn-outline-dark rounded-pill">الذهاب للمتجر <i class="fas fa-store ms-1"></i></a>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-3">{{ session('success') }}</div>
    @endif

    <!-- نموذج إضافة منتج -->
    <div class="card border-0 shadow-sm rounded-4 mb-5 p-4">
        <h4 class="fw-bold mb-3">إضافة منتج جديد</h4>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-5">
                    <label class="form-label">اسم المنتج</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">السعر (ر.س)</label>
                    <input type="number" step="0.01" name="price" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">صورة المنتج</label>
                    <input type="file" name="image" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-dark mt-3 rounded-pill px-4">إضافة المنتج</button>
        </form>
    </div>

    <!-- قائمة المنتجات -->
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <h4 class="fw-bold mb-3">المنتجات الحالية</h4>
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>الصورة</th>
                    <th>الاسم</th>
                    <th>السعر</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" width="60" class="rounded-3">
                            @else
                                <span class="text-muted">بدون صورة</span>
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }} ر.س</td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('هل أنت تأكد من الحذف؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">لا توجد منتجات حالياً.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>