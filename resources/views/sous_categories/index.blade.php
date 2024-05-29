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

    <a href="{{ route('sous_categories.create') }}" class="btn btn-primary">Create New Sous-categorie</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Description</th>
                <th>Category Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sousCategories as $sousCategorie)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $sousCategorie->description }}</td>
                    <td>{{ $sousCategorie->categorie->description }}</td>
                    <td>
                        <form action="{{ route('sous_categories.destroy', $sousCategorie->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this sous-categorie?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
    @include('includes.footer')
