@include('includes.headerAcc')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Digital & Electronics</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/chosen.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/color-01.css">
</head>
<body class="home-page home-01">
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>
    <main id="main" class="main-site left-sidebar">
        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">home</a></li>
                    <li class="item-link"><span>Digital & Electronics</span></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                    <div class="banner-shop">
                        <a href="#" class="banner-link">
                            <figure><img src="assets/images/shop-banner.jpg" alt=""></figure>
                        </a>
                    </div>
                    <div class="wrap-shop-control">
                        <h1 class="shop-title">Digital & Electronics</h1>
         
                    </div>
                    <div class="row">
                        <ul id="productList" class="product-list grid-products equal-container">
                            @foreach($products as $product)
                            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 product-item" data-name="{{ $product->nom }}" data-price="{{ $product->prix_gros }}" data-category="{{ $product->sous_categorie->categorie->id }}" data-sous-categorie="{{ $product->sous_categorie->id }}">
                                <div class="product product-style-3 equal-elem">
                                    <div class="product-thumnail">
                                        <a href="{{ route('product.show', $product->id) }}" title="{{ $product->nom }}">
                                            <div class="product-image-wrapper">
                                                <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->nom }}" class="product-image">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{ $product->nom }}</span></a>
                                        <div class="wrap-price"><span class="product-price">{{ $product->prix_gros }} TND</span></div>
                                        <a href="#" class="btn add-to-cart" data-product-id="{{ $product->id }}">Add To Cart</a>
                                    </div>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            document.querySelectorAll('.add-to-cart').forEach(function(button) {
                                                button.addEventListener('click', function(event) {
                                                    event.preventDefault();
                                                    let productId = this.getAttribute('data-product-id');
                                                    let form = document.createElement('form');
                                                    form.method = 'POST';
                                                    form.action = '{{ route('cart.add') }}';
                                                    let token = document.createElement('input');
                                                    token.type = 'hidden';
                                                    token.name = '_token';
                                                    token.value = '{{ csrf_token() }}';
                                                    form.appendChild(token);
                                                    let input = document.createElement('input');
                                                    input.type = 'hidden';
                                                    input.name = 'product_id';
                                                    input.value = productId;
                                                    form.appendChild(input);
                                                    document.body.appendChild(form);
                                                    form.submit();
                                                });
                                            });
                                        });
                                    </script>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="wrap-pagination-info">
                        <p class="result-count">Showing All results</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                    <div class="widget mercado-widget categories-widget">
                        <h2 class="widget-title">All Categories</h2>
                        <div class="widget-content">
                            <ul class="list-category">
                                <div class="wrap-right">
                                    <div class="sort-item">
                                        <select id="categoryFilter" class="form-control">
                                            <option value="">All Categories</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="sort-item">
                                        <input type="text" id="nameFilter" class="form-control" placeholder="Search by name">
                                    </div>
                                    <div class="sort-item">
                                        <input type="number" id="minPriceFilter" class="form-control" placeholder="Min price">
                                    </div>
                                    <div class="sort-item">
                                        <input type="number" id="maxPriceFilter" class="form-control" placeholder="Max price">
                                    </div>
                                
                                  
                                </div>
                            </ul>
                        </div>
                    </div><!-- Categories widget-->
                </div><!--end sitebar-->
            </div><!--end row-->
        </div><!--end container-->
    </main>
    
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const nameFilter = document.getElementById('nameFilter');
                const minPriceFilter = document.getElementById('minPriceFilter');
                const maxPriceFilter = document.getElementById('maxPriceFilter');
                const categoryFilter = document.getElementById('categoryFilter');
                const productList = document.getElementById('productList');
                const products = productList.querySelectorAll('.product-item');
    
                function filterProducts() {
                    const name = nameFilter.value.toLowerCase();
                    const minPrice = parseFloat(minPriceFilter.value) || 0;
                    const maxPrice = parseFloat(maxPriceFilter.value) || Infinity;
                    const category = categoryFilter.value;
    
                    products.forEach(product => {
                        const productName = product.getAttribute('data-name').toLowerCase();
                        const productPrice = parseFloat(product.getAttribute('data-price'));
                        const productCategory = product.getAttribute('data-category');
    
                        const matchesCategory = !category || productCategory === category;
    
                        if (productName.includes(name) && productPrice >= minPrice && productPrice <= maxPrice && matchesCategory) {
                            product.style.display = '';
                        } else {
                            product.style.display = 'none';
                        }
                    });
                }
    
                nameFilter.addEventListener('input', filterProducts);
                minPriceFilter.addEventListener('input', filterProducts);
                maxPriceFilter.addEventListener('input', filterProducts);
                categoryFilter.addEventListener('change', filterProducts);
            });
        </script>
</body>
@include('includes.footerAcc')
