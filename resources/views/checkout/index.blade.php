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
<body>
<body class="home-page home-01 ">
    {{-- Mobile menu --}}
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>
<div class="container mt-5">
        <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">home</a></li>
                    <li class="item-link"><span>My purchases</span></li>
                </ul>
            </div>
        <div class="wrap-shop-control">

            <h1 class="shop-title">My Purchases</h1>

            <div class="wrap-right">

                <div class="sort-item orderby ">
                    <select name="orderby" class="use-chosen" >
                        <option value="menu_order" selected="selected">Default sorting</option>
                        <option value="popularity">Sort by popularity</option>
                        <option value="rating">Sort by average rating</option>
                        <option value="date">Sort by newness</option>
                        <option value="price">Sort by price: low to high</option>
                        <option value="price-desc">Sort by price: high to low</option>
                    </select>
                </div>

                <div class="sort-item product-per-page">
                    <select name="post-per-page" class="use-chosen" >
                        <option value="12" selected="selected">12 per page</option>
                        <option value="16">16 per page</option>
                        <option value="18">18 per page</option>
                        <option value="21">21 per page</option>
                        <option value="24">24 per page</option>
                        <option value="30">30 per page</option>
                        <option value="32">32 per page</option>
                    </select>
                </div>

                <div class="change-display-mode">
                    <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                    <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                </div>

            </div>

        </div><!--end wrap shop control-->
 
    <h1 class="mb-4">Checkout</h1>

    <form action="{{ route('achat.confirmlocation') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="map">Select Location</label>
            <div id="map" style="height: 300px;"></div>
            <input type="hidden" id="latitude" name="latitude" value="{{ auth()->user()->latitude }}">
            <input type="hidden" id="longitude" name="longitude" value="{{ auth()->user()->longitude }}">
        </div>

        <button type="submit" class="btn btn-primary">Complete Purchase</button>
    </form>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb423ykEWarHHzXt-70jd1-TvsPazqQcM&libraries=places"></script>
<script>
    let map;
    let marker;

    function initMap() {
        const userLat = parseFloat(document.getElementById('latitude').value) || 33.886917;
        const userLng = parseFloat(document.getElementById('longitude').value) || 9.537499;

        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: userLat, lng: userLng },
            zoom: 8
        });

        if (userLat && userLng) {
            marker = new google.maps.Marker({
                position: { lat: userLat, lng: userLng },
                map: map
            });
        }

        map.addListener('click', function(event) {
            placeMarker(event.latLng);
        });

        function placeMarker(location) {
            if (marker) {
                marker.setPosition(location);
            } else {
                marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
            }

            document.getElementById('latitude').value = location.lat();
            document.getElementById('longitude').value = location.lng();
        }
    }

    google.maps.event.addDomListener(window, 'load', initMap);
</script>

   

</body>
</html>