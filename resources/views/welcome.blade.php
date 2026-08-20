<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نايس ون - Nice One</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: #FAF6F1; 
            color: #220C17; 
        }
        
        .top-bar { 
            background-color: #220C17; 
            padding: 10px 0; 
        }
        
        .search-container {
            position: relative;
            width: 42%;
        }
        .search-input { 
            border-radius: 25px; 
            padding: 8px 45px 8px 20px; 
            background-color: #ffffff; 
            border: none; 
            font-size: 0.9rem;
        }
        .search-icon { 
            position: absolute; 
            right: 18px; 
            top: 50%; 
            transform: translateY(-50%); 
            color: #777; 
        }
        
        .btn-whatsapp {
            background-color: #00D053;
            color: white;
            border-radius: 20px;
            font-weight: bold;
            font-size: 0.85rem;
            padding: 6px 16px;
            border: none;
        }
        .btn-whatsapp:hover { background-color: #00b347; color: white; }

        .btn-instagram {
            background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
            color: white;
            border-radius: 20px;
            font-size: 0.85rem;
            padding: 6px 16px;
            border: none;
            font-weight: 600;
        }
        .btn-instagram:hover { opacity: 0.9; color: white; }

        .btn-admin {
            border: 1px solid rgba(255,255,255,0.2);
            color: #d1d1d1;
            border-radius: 20px;
            font-size: 0.8rem;
            padding: 5px 12px;
        }

        /* تنسيق زر ورمز السلة العلوي */
        .cart-icon-wrapper {
            position: relative;
            background: #ffffff;
            color: #220C17;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.2s ease-in-out;
            cursor: pointer;
        }
        .cart-icon-wrapper:hover {
            background-color: #E2A62C;
            color: #ffffff;
            transform: scale(1.05);
        }
        .cart-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            background-color: #E2A62C;
            color: #000;
            font-size: 0.75rem;
            font-weight: bold;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #220C17;
        }

        .main-nav {
            background-color: #ffffff;
            border-bottom: 1px solid #EAE0D5;
        }
        .nav-link-custom { 
            color: #220C17; 
            font-weight: 700; 
            text-decoration: none; 
            margin: 0 15px; 
            font-size: 0.95rem; 
        }

        .hero-outer-card {
            background-color: #FAF6F1;
            border: 1px solid #ECE2D8;
            border-radius: 24px;
            padding: 16px;
            margin-top: 25px;
        }
        .hero-inner-card {
            background-color: #FDF9F5; 
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid #F5ECE3;
        }
        .btn-shop-now {
            background-color: #220C17;
            color: #fff;
            border-radius: 25px;
            padding: 10px 32px;
            font-weight: bold;
            border: none;
        }
        .btn-shop-now:hover { background-color: #3b172a; color: #fff; }
        
        .btn-limited {
            border: 1px solid #220C17;
            color: #220C17;
            border-radius: 20px;
            padding: 8px 20px;
            background: transparent;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .product-card { 
            border-radius: 18px; 
            border: 1px solid #EAE0D5; 
            background: #fff; 
            transition: 0.3s; 
            overflow: hidden;
        }
        .product-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.05); }
        .product-img { height: 220px; object-fit: cover; }
    </style>
</head>
<body>

    <!-- الهيدر العلوي -->
    <header class="top-bar">
        <div class="container d-flex justify-content-between align-items-center">
            
            <div class="d-flex align-items-center gap-2">
                <a href="https://wa.me/972598942479" target="_blank" class="btn btn-whatsapp">
                    <i class="fab fa-whatsapp me-1"></i> تواصل عبر واتساب
                </a>
                <a href="https://www.instagram.com/asem_musbeh/" target="_blank" class="btn btn-instagram">
                    <i class="fab fa-instagram me-1"></i> انستقرام
                </a>
                <a href="{{ route('admin') }}" class="btn btn-admin ms-1">
                    <i class="fas fa-lock me-1"></i> الأدمن
                </a>
            </div>

            <!-- حقل البحث الشغال فوري -->
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" id="searchInput" class="form-control search-input" placeholder="ابحثي عن كريم، عطر، حقيبة، أو مكياج...">
            </div>

            <div class="d-flex align-items-center gap-3">
                <!-- زر السلة المفعّل لفتح صفحة السلة -->
                <a href="{{ route('cart.index') }}" class="cart-icon-wrapper" title="عرض السلة">
                    <i class="fas fa-shopping-bag fs-6"></i>
                    <span class="cart-badge">{{ session('cart') ? count(session('cart')) : 0 }}</span>
                </a>
                <div class="text-white text-end">
                    <h3 class="fw-bold m-0" style="letter-spacing: 1px;">نايس ون</h3>
                    <small style="font-size: 0.65rem; color: #D1C5B8; letter-spacing: 2px; display: block;">NICE ONE</small>
                </div>
            </div>

        </div>
    </header>

    <nav class="main-nav py-3">
        <div class="container d-flex justify-content-center flex-wrap">
            <a href="#" class="nav-link-custom">الكريمات والعناية</a>
            <a href="#" class="nav-link-custom">الحقائب الفاخرة</a>
            <a href="#" class="nav-link-custom">المكياج والكوزمتكس</a>
            <a href="#" class="nav-link-custom">العطور والباقات</a>
            <a href="#branches" class="nav-link-custom">فروعنا في السعودية</a>
        </div>
    </nav>

    <div class="container">
        
        <!-- التنبيهات -->
        @if(session('success'))
            <div class="alert alert-success text-center my-3 rounded-4 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- البانر الرئيسي -->
        <div class="hero-outer-card">
            <div class="hero-inner-card p-4 p-md-5">
                <div class="row align-items-center">
                    
                    <div class="col-md-6 text-center text-md-start mb-4 mb-md-0 pe-md-5">
                        <h1 class="fw-bold mb-3 display-6" style="color: #220C17; line-height: 1.3;">تألقي بالفخامة واكتشفي سحركِ الخاص.</h1>
                        <p class="text-muted mb-4 fs-6">تشكيلة مميزة من 50 منتج فاخر بخصومات حصرية!</p>
                        <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-3 flex-wrap">
                            <button class="btn btn-shop-now">تسوقي الآن</button>
                            <button class="btn btn-limited"><i class="far fa-clock me-1"></i> عرض لفترة محدودة</button>
                        </div>
                        <small class="text-muted d-block mt-3 fs-7">تسوقي الآن واحصلي على هدية مجانية مع طلبك!</small>
                    </div>

                    <div class="col-md-6">
                        <div class="img-container rounded-4 overflow-hidden shadow-sm">
                            <img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?w=800" class="img-fluid w-100" style="max-height: 380px; object-fit: cover;" alt="منتجات تجميل">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- شبكة عرض المنتجات -->
        <div class="d-flex justify-content-between align-items-center my-4 pt-3">
            <h4 class="fw-bold m-0" style="border-right: 4px solid #220C17; padding-right: 12px; color: #220C17;">تشكيلة الفخامة الكاملة</h4>
            <span class="text-muted fs-6">إجمالي المنتجات: {{ $products->count() }}</span>
        </div>

        <div class="row g-4 mb-5" id="productsGrid">
            @forelse($products as $product)
                <div class="col-6 col-md-4 col-lg-3 product-item">
                    <div class="card product-card h-100">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top product-img" alt="{{ $product->name }}">
                        @else
                            <img src="https://via.placeholder.com/300x300?text=بدون+صورة" class="card-img-top product-img" alt="بدون صورة">
                        @endif
                        <div class="card-body text-center p-3 d-flex flex-column justify-content-between">
                            <h6 class="card-title fw-bold text-truncate mb-2 product-title" style="color: #220C17;">{{ $product->name }}</h6>
                            <div>
                                <p class="card-text fw-bold fs-5 mb-2" style="color: #00D053;">{{ $product->price }} <small class="fs-6">ر.س</small></p>
                                
                                <!-- نمط إرسال الطلب للسلة -->
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-shop-now w-100 btn-sm"><i class="fas fa-cart-plus me-1"></i> إضافة للسلة</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5">لا توجد منتجات معروضة حالياً. اضغط على زر "الأدمن" لإضافة المنتجات.</p>
                </div>
            @endforelse
        </div>

        <!-- قسم فروعنا الفاخرة -->
        <div class="my-5 pt-4 text-center" id="branches">
            <h3 class="fw-bold" style="color: #220C17;">فروعنا الفاخرة في المملكة العربية السعودية</h3>
            <p class="text-muted fs-6">زوري معارضنا الفاخرة لتجربة تسوق راقية وشخصية فريدة</p>
            
            <div class="row g-4 mt-2 justify-content-center text-start">
                
                <!-- فرع الرياض -->
                <div class="col-md-6 col-lg-5">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden" style="background: #fff;">
                        <img src="{{ asset('riyadh-branch.jpg') }}" class="card-img-top" alt="فرع الرياض" style="height: 240px; object-fit: cover;">
                        <div class="card-body p-4 text-center">
                            <h5 class="fw-bold mb-3" style="color: #220C17;">فرع الرياض - السنتريا مول</h5>
                            <p class="text-muted small mb-1"><i class="fas fa-map-marker-alt text-warning me-1"></i> الرياض، طريق الملك فهد، الدور الأول</p>
                            <p class="text-muted small mb-3"><i class="far fa-clock text-warning me-1"></i> يومياً من الساعة 10:00 صباحاً - 11:00 مساءً</p>
                            <a href="https://maps.google.com/?q=Centria+Mall+Riyadh" target="_blank" class="btn btn-outline-dark rounded-pill px-4 btn-sm fw-bold">
                                <i class="fas fa-map-marked-alt me-1"></i> موقع الفرع على خرائط جوجل
                            </a>
                        </div>
                    </div>
                </div>

                <!-- فرع جدة -->
                <div class="col-md-6 col-lg-5">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden" style="background: #fff;">
                        <img src="{{ asset('jeddah-branch.jpg') }}" class="card-img-top" alt="فرع جدة" style="height: 240px; object-fit: cover;">
                        <div class="card-body p-4 text-center">
                            <h5 class="fw-bold mb-3" style="color: #220C17;">فرع جدة - ردسي مول</h5>
                            <p class="text-muted small mb-1"><i class="fas fa-map-marker-alt text-warning me-1"></i> جدة، طريق الملك عبدالعزيز، البوابة 3</p>
                            <p class="text-muted small mb-3"><i class="far fa-clock text-warning me-1"></i> يومياً من الساعة 10:00 صباحاً - 11:00 مساءً</p>
                            <a href="https://maps.google.com/?q=Red+Sea+Mall+Jeddah" target="_blank" class="btn btn-outline-dark rounded-pill px-4 btn-sm fw-bold">
                                <i class="fas fa-map-marked-alt me-1"></i> موقع الفرع على خرائط جوجل
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- قسم الخريطة الثابتة لفرع السعودية (الرياض) -->
        <div class="my-5">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-white py-3 border-0 text-center">
                    <h5 class="fw-bold m-0" style="color: #220C17;">
                        <i class="fas fa-map-marked-alt me-2 text-danger"></i>موقع متجرنا في الرياض - المملكة العربية السعودية
                    </h5>
                </div>
                <div class="card-body p-0">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115981.82190112447!2d46.62141510482594!3d24.713551700000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03890d489399%3A0xba974d1c98e79fd5!2sRiyadh%20Saudi%20Arabia!5e0!3m2!1sar!2ssa!4v1700000000000!5m2!1sar!2ssa" 
                        width="100%" 
                        height="400" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

    </div>

    <!-- كود JavaScript لتفعيل البحث المباشر السريع -->
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function () {
            let filter = this.value.toLowerCase();
            let items = document.querySelectorAll('.product-item');

            items.forEach(function (item) {
                let title = item.querySelector('.product-title').innerText.toLowerCase();
                if (title.includes(filter)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>