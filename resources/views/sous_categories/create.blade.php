@include('includes.head')
@include('includes.navbar')
<title>Ajouter Sous-Categorie</title>


<style>
    * {
        color: var(--dk-gray-400);
    }

    body {
        font-family: Arial, sans-serif;
        background-color: var(--dk-darker-bg);
        margin: 0;
        padding: 0;
        display: flex;
    }

    form {
        background-color: var(--dk-dark-bg);
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 900px;
        height: 600px;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    select {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: var(--dk-gray-400);
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
        <li class="alert alert-danger">{{ $error }}</li>
    @endforeach
</ul>
@endif

<form action="{{ route('sous_categories.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="description">Description :</label>
        <input type="text" id="description" name="description" required>
    </div>
    <div class="form-group">
        <label for="categorie_id">Catégorie :</label>
        <select id="categorie_id" name="categorie_id" required>
            <option value="">Sélectionner une catégorie</option>
            @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->description }}</option>
            @endforeach
        </select>
    </div>
    <input type="submit" value="Créer la sous-categorie">
</form>

@include('includes.footer')
