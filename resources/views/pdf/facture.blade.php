<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Facture N° {{ $facture->id }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 24px;
            margin: 0;
        }
        .sub-header {
            margin-bottom: 20px;
            width: 100%;
        }
        .sub-header .left, .sub-header .right {
            width: 48%; /* Réduit la largeur des colonnes pour bien les séparer */
            display: inline-block;
            vertical-align: top;
        }
        .sub-header .left {
            text-align: left; /* Alignement du texte à gauche */
        }
        .sub-header .right {
            text-align: right; /* Alignement du texte à droite */
            float: right; /* Assure que la colonne du fournisseur soit à droite */
        }
        .details {
            margin-top: 20px;
        }
        .details th, .details td {
            padding: 8px;
            border: 1px solid #000;
            text-align: left;
        }
        .details th {
            background-color: #f2f2f2;
        }
        .signature {
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="sub-header">
        <div class="left">
            <p><strong>Entreprise :</strong> {{ $facture->entreprise->name }}</p>
            <p><strong>Adresse :</strong> {{ $facture->entreprise->adresse }}</p>
            <p><strong>Tél :</strong> {{ $facture->entreprise->phone }}</p>
        </div>
        <div class="right">
            <p><strong>Fournisseur :</strong> {{ $facture->fournisseur->name }}</p>
            <p><strong>Adresse :</strong> {{ $facture->fournisseur->adresse }}</p>
            <p><strong>Tél :</strong> {{ $facture->fournisseur->phone }}</p>
            <br><br>
            <p><strong>Date : </strong>{{ $facture->commande->delai_de_livraison }}</p>
        </div>
    </div>
    <br><br><br>
    <div class="header">
        <h1>Facture N° {{ $facture->id }}</h1>
    </div>

    <div class="details">
        <table width="100%">
            <thead>
                <tr>
                    <th>Désignation</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $facture->commande->designation }}</td>
                    <td>{{ $facture->commande->quantite }}</td>
                    <td>{{ $facture->prix_unitaire }} D</td>
                    <td>{{ $facture->montant }} D</td>
                </tr>
                <tr>
                    <th colspan="3" scope="row">Montant brut total</th>
                    <td>{{ $facture->montant }} D</td>
                </tr>
                <tr>
                    <th colspan="3" scope="row">Remise</th>
                    <td>{{ $facture->remise }} %</td>
                </tr>
                <tr>
                    <th colspan="3" scope="row">Net Commerciale</th>
                    <td>{{ $facture->montant_total }} D</td>
                </tr>
                <tr>
                    <th colspan="3" scope="row">Escompte</th>
                    <td>................</td>
                </tr>
                <tr>
                    <th colspan="3" scope="row">Net à payer</th>
                    <td>{{ $facture->montant_total }} D</td>
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
