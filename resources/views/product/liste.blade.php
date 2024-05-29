@include('includes.head')
<style>
    body {
        background-color: #1a1a1a;
        color: #fff;
    }

    .grid {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-end;
        margin-top: 100px;
    }

    .btn {
        display: inline-block;
        padding: 8px 16px;
        margin-bottom: 10px;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        border: none;
        border-radius: 4px;
        background: linear-gradient(135deg, #0981d6, #0076c4);
        color: #ffffff;
        transition: background 0.3s ease;
    }

    .btn:hover {
        background: linear-gradient(135deg, #0099ff, #423ddb);
    }

    .table {
        width: 80%;
        border-collapse: separate;
        border-spacing: 0 15px;
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
        background-color: #2a2a2a;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 255, 204, 0.2);
    }

    .table th,
    .table td {
        border: none;
        padding: 12px 15px;
        text-align: left;
    }

    .table th {
        background: linear-gradient(135deg, #022842, #233d4d);
        font-weight: bold;
        color: #ffffff;
        text-align: center;
        border-radius: 10px 10px 0 0;
    }

    .table td {
        background-color: #333;
        color: #ffffff;
    }

    .table tr {
        border-radius: 10px;
    }

    .table tr td:first-child {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    .table tr td:last-child {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .img-thumbnail {
        border: none;
        border-radius: 10px;
    }

    .alert {
        background-color: #444;
        border: none;
        color: #fff;
        border-radius: 10px;
    }
</style>
<body>
    @include('includes.navbar')
    <div class="grid">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        {{-- <th>Id</th> --}}
                        <th>Nom</th>
                        <th>Catégorie</th>
                        <th>Sous Categorie</th>
                        <th>Quantité</th>
                        {{-- <th>Prix en détail</th> --}}
                        <th>Prix en gros</th>
                        <th>Quantité minimale pour le gros</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        {{-- <td>{{$product ->id}} </td> --}}
                        <td>{{$product ->nom}}</td>
                        <td>{{@$product ->sous_categorie->categorie->description}}</td>
                        <td>{{@$product ->sous_categorie->description}}</td>
                        <td>{{$product ->quantite}}</td>
                        {{-- <td>{{$product ->prix_detail}}</td> --}}
                        <td>{{$product ->prix_gros}}</td>
                        <td>{{$product ->quantite_gros}}</td>
                        <td>{{$product ->description}}</td>
                        <td>
                            <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Product Image" class="img-thumbnail" width="100">
                        </td>
                        <td>
                            <a href='/update-product/{{$product->id}}' class="btn">Update</a>
                            <a href='/delete-product/{{$product->id}}' class="btn" style="background-color: #dc3545;">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href='/ajouter' class="btn">Ajouter produit</a>

    </div>
    @include('includes.footer')
</body>
