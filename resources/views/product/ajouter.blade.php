@include('includes.head')
@include('includes.navbar')
<title>Ajouter prod</title>

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
        height: 1200px;
        position: fixed;
        top: 70%;
        left: 40%;
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
    input[type="number"],
    textarea {
        width: 100%;
        padding: 10px;
        border: none ;
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categories = @json($categories);
        const sousCategories = @json($sous_categories);

        const categorySelect = document.getElementById('categorie');
        const sousCategorySelect = document.getElementById('sous_categorie_id');

        categorySelect.addEventListener('change', function() {
            const selectedCategoryId = parseInt(this.value);
            const filteredSousCategories = sousCategories.filter(sc => sc.categorie_id === selectedCategoryId);

            sousCategorySelect.innerHTML = '<option value="">Sélectionner une sous-catégorie</option>';
            filteredSousCategories.forEach(sousCategorie => {
                const option = document.createElement('option');
                option.value = sousCategorie.id;
                option.textContent = sousCategorie.description;
                sousCategorySelect.appendChild(option);
            });
        });
    });
</script>
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

<form action="/ajouter/traitement" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
    </div>
    <div class="form-group">
        <label for="categorie">Catégorie :</label>
        <select id="categorie" name="categorie" class="form-control" required>
            <option value="">Sélectionner une catégorie</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->description }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="sous_categorie_id">Sous-catégorie :</label>
        <select id="sous_categorie_id" name="sous_categorie_id" class="form-control" required>
            <option value="">Sélectionner une sous-catégorie</option>
        </select>
    </div>
    <div class="form-group">
        <label for="quantite">Quantité :</label>
        <input type="number" id="quantite" name="quantite" required>
    </div>
    <div class="form-group">
        <label for="prix_detail">Prix en détail :</label>
        <input type="number" id="prix_detail" name="prix_detail" required>
    </div>
    <div class="form-group">
        <label for="prix_gros">Prix en gros :</label>
        <input type="number" id="prix_gros" name="prix_gros" required>
    </div>
    <div class="form-group">
        <label for="quantite_gros">Quantité minimale pour la vente en gros :</label>
        <input type="number" id="quantite_gros" name="quantite_gros" required>
    </div>
    <div class="form-group">
        <label for="description">Description :</label>
        <textarea id="description" name="description" rows="4" required></textarea>
    </div>
    <div class="form-group">
        <label for="image">Image :</label>
        <input type="file" id="image" name="image" required>
    </div>
    <input type="submit" value="Créer le produit">
</form>

@include('includes.footer')  