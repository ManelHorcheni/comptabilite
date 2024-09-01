<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bon de Commande</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .header { text-align: center; }
        .details { margin-top: 20px; }
        .details th, .details td { padding: 8px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Bon de Commande</h1>
    </div>
    <div class="details">
        <table border="1" width="100%">
            <tr>
                <th>ID Commande</th>
                <td>{{ $commande->id }}</td>
            </tr>
            <tr>
                <th>Entreprise</th>
                <td>{{ $commande->entreprise->name }}</td>
            </tr>
            <tr>
                <th>Fournisseur</th>
                <td>{{ $commande->fournisseur->name }}</td>
            </tr>
            <tr>
                <th>Désignation</th>
                <td>{{ $commande->designation }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $commande->description }}</td>
            </tr>
            <tr>
                <th>Quantité</th>
                <td>{{ $commande->quantite }}</td>
            </tr>
            <tr>
                <th>Délai de livraison</th>
                <td>{{ $commande->delai_de_livraison }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $commande->status }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
