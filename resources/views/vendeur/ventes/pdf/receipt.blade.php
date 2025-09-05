<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reçu de Vente #{{ $vente->id }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            color: #1f2937;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #0f766e;
        }
        .logo {
            font-size: 24px;
            font-weight: 800;
            color: #0f766e;
            margin-bottom: 10px;
        }
        .title {
            font-size: 24px;
            font-weight: 700;
            margin: 20px 0;
            color: #1f2937;
        }
        .section {
            margin-bottom: 30px;
        }
        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #0f766e;
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 1px solid #e5e7eb;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .info-item {
            margin-bottom: 10px;
        }
        .info-label {
            font-weight: 600;
            color: #4b5563;
            margin-bottom: 5px;
        }
        .info-value {
            color: #1f2937;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .table th, .table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
        .table th {
            background-color: #f3f4f6;
            font-weight: 600;
            color: #374151;
        }
        .total {
            font-size: 18px;
            font-weight: 700;
            text-align: right;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 2px solid #e5e7eb;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            font-size: 14px;
            color: #6b7280;
        }
        .signature {
            margin-top: 60px;
            padding-top: 10px;
            border-top: 1px dashed #9ca3af;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">RenaultOcaz</div>
            <div class="title">Reçu de Vente #{{ $vente->id }}</div>
            <div style="color: #6b7280;">Date: {{ $vente->created_at->format('d/m/Y H:i') }}</div>
        </div>

        <div class="section">
            <div class="section-title">Informations de la Vente</div>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Référence</div>
                    <div class="info-value">#{{ $vente->id }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Code de reçu</div>
                    <div class="info-value">{{ $vente->code_recue }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Date de la vente</div>
                    <div class="info-value">{{ $vente->created_at->format('d/m/Y') }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Statut du paiement</div>
                    <div class="info-value">{{ ucfirst(str_replace('_', ' ', $vente->statut_paiement)) }}</div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Détails du Véhicule</div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Marque & Modèle</th>
                        <th>Année</th>
                        <th>Kilométrage</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $vente->voiture->marque }} {{ $vente->voiture->modele }}</td>
                        <td>{{ $vente->voiture->annee }}</td>
                        <td>{{ number_format($vente->voiture->kilometrage, 0, ',', ' ') }} km</td>
                        <td>{{ number_format($vente->montant, 2, ',', ' ') }} €</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="section">
            <div class="section-title">Informations du Client</div>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Nom complet</div>
                    <div class="info-value">{{ $vente->demande->client->prenom }} {{ $vente->demande->client->nom }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Email</div>
                    <div class="info-value">{{ $vente->demande->client->email }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Téléphone</div>
                    <div class="info-value">{{ $vente->demande->client->telephone ?? 'Non renseigné' }}</div>
                </div>
            </div>
        </div>

        @if($vente->financier)
        <div class="section">
            <div class="section-title">Financier en charge</div>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Nom</div>
                    <div class="info-value">{{ $vente->financier->name }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Email</div>
                    <div class="info-value">{{ $vente->financier->email }}</div>
                </div>
            </div>
        </div>
        @endif

        <div class="total">
            Montant total: <span style="color: #0f766e; font-size: 24px;">{{ number_format($vente->montant, 2, ',', ' ') }} €</span>
        </div>

        <div class="footer">
            <p>Merci pour votre confiance !</p>
            <p>RenaultOcaz - Votre partenaire automobile de confiance</p>
            <p>Contact: contact@renault-ocaz.com</p>
        </div>

        <div class="signature">
            <p>Signature du vendeur</p>
            <div style="height: 50px;"></div>
            <p>Signature du client</p>
        </div>
    </div>
</body>
</html>
