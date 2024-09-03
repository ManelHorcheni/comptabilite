<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bon de Livraison</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { font-size: 24px; margin: 0; }
        .sub-header { margin-bottom: 20px; }
        .sub-header .left, .sub-header .right { width: 50%; display: inline-block; vertical-align: top; }
        .sub-header .left { text-align: left; }
        .sub-header .right { text-align: right; }
        .details { margin-top: 20px; }
        .details th, .details td { padding: 8px; border: 1px solid #000; text-align: left; }
        .details th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="header">
        <h1>BON DE LIVRAISON N° {{ $livraison->id }}</h1>
    </div>
    
    <div class="sub-header">
        <div class="left">
            <p><strong>Entreprise :</strong></p>
            <p>{{ $entreprise->name }}</p>
            <p><strong>Date :</strong></p>
            <p>{{ $livraison->delai_de_livraison }}</p>
            <p><strong>Numéro de la commande :</strong></p>
            <p>{{ $livraison->commande_id }}</p>
        </div>
        <div class="right">
            <p><strong>Fournisseur :</strong></p>
            <p>{{ $fournisseur->name }}</p>
            
        </div>
    </div>

    <div class="details">
        <table width="100%">
            <thead>
                <tr>
                    <th>Désignation</th>
                    <th>Quantité reçue</th>
                    <th>Quantité accepté</th>
                    <th>Observation</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    
                    <td>{{ $livraison->commande->designation }}</td>
                    <td>{{ $livraison->commande->quantite }}</td>
                    <td>{{ $livraison->commande->quantite }}</td>
                    <td></td>
                    
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <div class="signature">
        <p><strong>Signature</strong></p>
        
    </div>
</body>
</html>
