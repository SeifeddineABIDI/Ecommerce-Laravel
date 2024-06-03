<!-- resources/views/product/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>

  
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
            margin-top: 80px; /* Reduced margin-top to move the content up */
        }

        .container {
            display: flex;
            flex-direction: column;
            background-color: var(--dk-dark-bg);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 700px;
        }

        .product-detail {
            margin-bottom: 30px;
        }

        .product-detail label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .product-detail span {
            display: block;
            padding: 10px;
            border-radius: 6px;
            background-color: var(--dk-light-bg);
            font-size: 16px;
        }
    </style>
</head>
<body>

        
    <div class="main-content">
        <div class="container">
            <div class="product-detail">
                <label>Nom:</label>
                <span>{{ $product->nom }}</span>
            </div>
            <div class="product-detail">
                <label>Quantité:</label>
                <span>{{ $product->quantite }}</span>
            </div>
            <div class="product-detail">
                <label>Prix en détail:</label>
                <span>{{ $product->prix_detail }}</span>
            </div>
            <div class="product-detail">
                <label>Prix en gros:</label>
                <span>{{ $product->prix_gros }}</span>
            </div>
            <div class="product-detail">
                <label>Quantité minimale pour la vente en gros:</label>
                <span>{{ $product->quantite_gros }}</span>
            </div>
            <div class="product-detail">
                <label>Description:</label>
                <span>{{ $product->description }}</span>
            </div>
        </div>
    </div>

 
</body>
</html>
