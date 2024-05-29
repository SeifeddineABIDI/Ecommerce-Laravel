@include('includes.headerAcc')
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
    @if(true)
        <div class="alert alert-warning" role="alert">
            You have not made any purchases yet.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        {{-- <th>Id</th> --}}
                        <th>Nom</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Delivery Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($achats as $achat)
                    <tr>
                        {{-- <td>{{$achat->id}} </td> --}}
                        <td>{{ $achat->product->nom }}</td>
                        <td>{{ $achat->quantity }}</td>
                        <td>{{ $achat->price }} TND</td>
                        <td>
                            @if ($achat->product && $achat->product->image)
                                <img src="{{ asset('uploads/products/' . $achat->product->image) }}" alt="Product Image" class="img-thumbnail" width="100">
                            @else
                                <span>No image available</span>
                            @endif
                        </td>
                        <td>
                            @if ($achat->status == 'en cours')
                                <a href="{{ route('achat.updateArticle',$achat->id) }}" class="badge badge-warning">Pending</a>
                                
                            @else
                                <span class="badge badge-success">Delivered</span>
                            @endif
                        </td>
                        <td>
                            @if ($achat->status == 'en cours')
                                <span>Not yet delivered</span>
                            @else
                                <span>{{ $achat->updated_at }}</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
</body>
</html>