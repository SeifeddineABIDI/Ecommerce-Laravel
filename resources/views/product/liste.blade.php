@include('includes.head')
<style>
    .grid {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-end; /* Align items to the end of the main axis (right) */
    margin-top: 100px; /* Adjust the margin as needed */
}


.btn {
    display: inline-block;
    padding: 8px 16px;
    margin-bottom: 10px; /* Ajoutez un espacement entre le bouton et le tableau */
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    border: none;
    border-radius: 4px;
    background-color: #007bff; /* Couleur de fond */
    color: #ffffff; /* Couleur du texte */
}

.btn:hover {
    background-color: #0056b3; /* Couleur de fond au survol */
}

.table {
    width: 80%; /* Adjust table width as needed */
    border-collapse: collapse;
    margin-top: 20px; /* Add spacing between the button and the table */
    margin-left: 200px; /* Move the table to the right */
    
}


.table th {
    border: 1px solid #dddddd; /* Bordures */
    padding: 8px;
    text-align: left;
}
.table td {
    border: 1px solid #dddddd; /* Bordures */
    padding: 8px;
    text-align: left;
    color : white;
}

.table th {
    background-color: #f2f2f2; /* Couleur de fond pour les en-têtes */
    font-weight: bold;
    margin-left: auto;
}
</style>
<body>
     @include('includes.navbar')
        <div class="grid">
              <!-- Tableau -->
              <a href='/ajouter' class="btn btn-info">Ajouter produit</a>
              <table class="table">
                <thead>
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
                    <!-- Lignes du tableau (données fictives pour démonstration) -->
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
                            <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Product Image" width="100">
                        </td>                        <td>
                            <!-- Actions (boutons, liens, etc.) -->
                            <a href='/update-product/{{$product ->id}}' class="btn btn-info">Update</a>
                            <a href='/delete-product/{{$product ->id}}' class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('includes.footer')
</body>

    