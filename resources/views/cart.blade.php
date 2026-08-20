<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سلة التسوق - نايس ون</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #FAF6F1; color: #220C17; }
        .btn-whatsapp-checkout {
            background-color: #00D053;
            color: white;
            font-weight: bold;
            border-radius: 25px;
            padding: 12px 30px;
            border: none;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
        }
        .btn-whatsapp-checkout:hover { background-color: #00b347; color: white; }
    </style>
</head>
<body>

<div class="container my-5">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ url('/') }}" class="btn btn-outline-dark rounded-pill px-4">متابعة التسوق</a>
        <h2 class="fw-bold m-0" style="color: #220C17;">سلة التسوق</h2>
    </div>

    @if(session('cart') && count(session('cart')) > 0)
        @php 
            $total = 0; 
            $whatsappMessage = "مرحباً معرض نايس ون 👋%0Aأود إتمام الطلب التالي من متجركم:%0A----------------------------%0A";
        @endphp

        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4" style="background: #ffffff;">
            <div class="table-responsive">
                <table class="table align-middle text-center">
                    <thead>
                        <tr>
                            <th>المنتج</th>
                            <th>السعر</th>
                            <th>الكمية</th>
                            <th>الإجمالي</th>
                            <th>إجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('cart') as $id => $details)
                            @php 
                                $subtotal = $details['price'] * $details['quantity'];
                                $total += $subtotal;
                                // بناء النص المفصل المبعوث للواتساب
                                $whatsappMessage .= "• " . $details['name'] . " (الكمية: " . $details['quantity'] . ") - " . $subtotal . " ر.س%0A";
                            @endphp
                            <tr>
                                <td class="fw-bold">{{ $details['name'] }}</td>
                                <td>{{ $details['price'] }} ر.س</td>
                                <td>{{ $details['quantity'] }}</td>
                                <td>{{ $subtotal }} ر.س</td>
                                <td>
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @php
                // إضافة إجمالي المبلغ ورسالة ختامية للواتساب
                $whatsappMessage .= "----------------------------%0A💰 *المجموع الكلي:* " . $total . " ر.س%0A%0Aيرجى تأكيد الطلب وتحديد طريقة الدفع والتوصيل. شكراً لكم! ✨";
                $whatsappNumber = "972598942479"; // رقم الواتساب الخاص بالمتجر
            @endphp

            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top flex-wrap gap-3">
                <h4 class="fw-bold m-0">المجموع الكلي: <span style="color: #00D053;">{{ $total }} ر.س</span></h4>

                <!-- زر الإرسال المباشر للواتساب -->
                <a href="https://wa.me/{{ $whatsappNumber }}?text={{ $whatsappMessage }}" target="_blank" class="btn-whatsapp-checkout fs-5">
                    <i class="fab fa-whatsapp fs-4"></i> إرسال الطلب عبر الواتساب
                </a>
            </div>
        </div>

    @else
        <div class="text-center py-5 card border-0 shadow-sm rounded-4">
            <i class="fas fa-shopping-bag fs-1 text-muted mb-3"></i>
            <h4 class="text-muted">السلة فارغة حالياً</h4>
            <div class="mt-3">
                <a href="{{ url('/') }}" class="btn btn-dark rounded-pill px-4">تصفحي المنتجات الآن</a>
            </div>
        </div>
    @endif

</div>

</body>
</html>