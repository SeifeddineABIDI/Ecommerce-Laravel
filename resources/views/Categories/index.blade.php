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

    .table th,
    .table td {
        border: 1px solid #dddddd; /* Bordures */
        padding: 8px;
        text-align: left;
    }

    .table th {
        background-color: #f2f2f2; /* Couleur de fond pour les en-têtes */
        font-weight: bold;
    }

    .table td {
        color: white;
    }
</style>
<body>
    @include('includes.navbar')
    <div class="grid">
        <!-- Button to add new product -->
        <a  href="{{ route('categories.create') }}" class="btn btn-info">Ajouter Categorie</a>
        <!-- Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $categorie)
                <!-- Table rows -->
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $categorie->description }}</td>
                    <td>
                        <!-- Actions (buttons, links, etc.) -->
                        <a href='/delete-categorie/{{ $categorie->id }}' class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('includes.footer')
</body>
