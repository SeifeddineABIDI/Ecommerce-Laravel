<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update product</title>
    @include('includes.head')
    @include('includes.navbar')
    <style>
        * {
            color: var(--dk-gray-400);
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--dk-darker-bg);
            margin: 0;
            padding: 0;
        }

        .main-content {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: calc(100vh - 60px); /* Adjust this value according to the navbar height */
            margin-top: 80px; /* Reduced margin-top to move the forms up */
        }

        .container {
            display: flex;
            gap: 20px;
        }

        form {
            background-color: var(--dk-dark-bg);
            padding: 40px; /* Increase padding for bigger form */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 700px; /* Increase width for bigger form */
            height: 700px;
        }

        .form-group {
            margin-bottom: 30px;
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
            padding: 15px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: var(--dk-gray-400);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* New styles for the welcome section */
        #welcome {
            width: 100%;
            background-color: var(--dk-dark-bg); /* Adjust background color as needed */
            padding: 20px; /* Adjust padding as needed */
            box-sizing: border-box;
            margin-top: 150px; /* Add margin-top to move the section down */
        }

        #welcome .content {
            max-width: 1200px; /* Adjust max-width as needed */
            margin-left: 310px; /* Adjust this value to move content slightly to the left */
            padding: 20px; /* Adjust padding as needed */
        }

        #welcome h1 {
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Include your navbar and other header content here if needed -->
    <section id="welcome">
        <div class="content rounded-3 p-3">
            <h1 class="fs-3">Update your product</h1>
        </div>
    </section>
    <div class="main-content">
        <div class="container">
            <form action="/update/traitement" method="post">
                @csrf
                <input type="text" name="id" style="display: none;" value="{{$products ? $products->id : ''}}">
                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" value="{{$products ? $products->nom : ''}}">
                </div>
                <div class="form-group">
                    <label for="catégorie">Catégorie :</label>
                    <input type="text" id="catégorie" name="catégorie" value="{{$products ? $products->categorie : ''}}">
                </div>
                <div class="form-group">
                    <label for="quantite">Quantité :</label>
                    <input type="number" id="quantite" name="quantite" value="{{$products ? $products->quantite : ''}}">
                </div>
                <div class="form-group">
                    <label for="prix_detail">Prix en détail :</label>
                    <input type="number" id="prix_detail" name="prix_detail" value="{{$products ? $products->prix_detail : ''}}">
                </div>
                <div class="form-group">
                    <label for="image">Image :</label>
                    <input type="file" id="image" name="image" value="{{$products ? $products->image : ''}}">
                </div>
            </form>

            <form action="/update/traitement" method="post">
                @csrf
                <div class="form-group">
                    <label for="prix_gros">Prix en gros :</label>
                    <input type="number" id="prix_gros" name="prix_gros" value="{{$products ? $products->prix_gros : ''}}">
                </div>
                <div class="form-group">
                    <label for="quantite_gros">Quantité minimale pour la vente en gros :</label>
                    <input type="number" id="quantite_gros" name="quantite_gros" value="{{$products ? $products->quantite_gros : ''}}">
                </div>
                <div class="form-group">
                    <label for="description">Description :</label>
                    <textarea id="description" name="description" rows="4">{{$products ? $products->description : ''}}</textarea>
                </div>
                <input type="submit" value="Update">
            </form>
        </div>
    </div>

    @include('includes.footer')
</body>
</html>
