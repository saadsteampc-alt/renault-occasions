<?php

namespace Database\Seeders;

use App\Models\Voiture;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoitureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all entreprise IDs
        $entrepriseIds = DB::table('entreprises')->pluck('id')->toArray();
        
        if (empty($entrepriseIds)) {
            $this->command->info('No entreprises found. Please run EntrepriseSeeder first.');
            return;
        }

        $voitures = [
            // Renault Clio
            [
                'marque' => 'Renault',
                'modele' => 'Clio',
                'annee' => 2022,
                'kilometrage' => 12500,
                'prix' => 18900.00,
                'description' => 'Renault Clio 1.0 TCe 100ch Intens, boîte EDC, 5 portes, 1ère main, garantie jusqu\'en 2025',
                'etat_diagnostic' => 'Véhicule en excellent état, contrôle technique OK, pas de choc important',
                'statut' => 'disponible',
                'entreprise_id' => $entrepriseIds[array_rand($entrepriseIds)],
                'image' => 'clio.jpg',
            ],
            [
                'marque' => 'Renault',
                'modele' => 'Clio',
                'annee' => 2021,
                'kilometrage' => 24500,
                'prix' => 16900.00,
                'description' => 'Renault Clio 1.0 SCe 75ch Zen, boîte manuelle, 5 portes, 1ère main',
                'etat_diagnostic' => 'Quelques rayures sur les jantes, intérieur nickel',
                'statut' => 'disponible',
                'entreprise_id' => $entrepriseIds[array_rand($entrepriseIds)],
                'image' => 'clio_zen.jpg',
            ],

            // Renault Captur
            [
                'marque' => 'Renault',
                'modele' => 'Captur',
                'annee' => 2023,
                'kilometrage' => 8500,
                'prix' => 24900.00,
                'description' => 'Renault Captur 1.3 TCE 140ch EDC Intens, 2 roues motrices, toit panoramique',
                'etat_diagnostic' => 'Comme neuve, livrée avec tous les entretiens constructeur',
                'statut' => 'disponible',
                'entreprise_id' => $entrepriseIds[array_rand($entrepriseIds)],
                'image' => 'captur.jpg',
            ],
            [
                'marque' => 'Renault',
                'modele' => 'Captur',
                'annee' => 2020,
                'kilometrage' => 38500,
                'prix' => 19900.00,
                'description' => 'Renault Captur 1.5 dCi 95ch Zen, boîte manuelle, 2 roues motrices',
                'etat_diagnostic' => 'Petit accrochage sur l\'aile avant droite réparé chez un professionnel',
                'statut' => 'reserve',
                'entreprise_id' => $entrepriseIds[array_rand($entrepriseIds)],
                'image' => 'captur_zen.jpg',
            ],

            // Renault Megane
            [
                'marque' => 'Renault',
                'modele' => 'Megane',
                'annee' => 2021,
                'kilometrage' => 32500,
                'prix' => 22900.00,
                'description' => 'Renault Megane 1.3 TCE 160ch RS Line, boîte EDC, toit panoramique',
                'etat_diagnostic' => 'Jantes alliage 18\" RS, sellerie cuir chaudronnée, pack premium',
                'statut' => 'disponible',
                'entreprise_id' => $entrepriseIds[array_rand($entrepriseIds)],
                'image' => 'megane_rsline.jpg',
            ],
            [
                'marque' => 'Renault',
                'modele' => 'Megane',
                'annee' => 2019,
                'kilometrage' => 48500,
                'prix' => 18900.00,
                'description' => 'Renault Megane 1.5 dCi 115ch GT Line, boîte manuelle 6 vitesses',
                'etat_diagnostic' => 'Entretien à jour, pneus récents, intérieur en excellent état',
                'statut' => 'disponible',
                'entreprise_id' => $entrepriseIds[array_rand($entrepriseIds)],
                'image' => 'megane_gtline.jpg',
            ],

            // Renault Kadjar
            [
                'marque' => 'Renault',
                'modele' => 'Kadjar',
                'annee' => 2022,
                'kilometrage' => 18700,
                'prix' => 26900.00,
                'description' => 'Renault Kadjar 1.3 TCE 140ch Iconic, boîte EDC, 2 roues motrices',
                'etat_diagnostic' => 'Véhicule d\'occasion récente, garantie constructeur',
                'statut' => 'disponible',
                'entreprise_id' => $entrepriseIds[array_rand($entrepriseIds)],
                'image' => 'kadjar_iconic.jpg',
            ],
            [
                'marque' => 'Renault',
                'modele' => 'Kadjar',
                'annee' => 2020,
                'kilometrage' => 42500,
                'prix' => 21900.00,
                'description' => 'Renault Kadjar 1.5 dCi 115ch Zen, boîte manuelle, 2 roues motrices',
                'etat_diagnostic' => 'Carrosserie en parfait état, intérieur soigné',
                'statut' => 'disponible',
                'entreprise_id' => $entrepriseIds[array_rand($entrepriseIds)],
                'image' => 'kadjar_zen.jpg',
            ],

            // Renault Arkana
            [
                'marque' => 'Renault',
                'modele' => 'Arkana',
                'annee' => 2023,
                'kilometrage' => 6500,
                'prix' => 31900.00,
                'description' => 'Renault Arkana 1.3 TCE 140ch E-Tech Hybrid, boîte automatique',
                'etat_diagnostic' => 'Véhicule hybride rechargeable, très faible consommation',
                'statut' => 'disponible',
                'entreprise_id' => $entrepriseIds[array_rand($entrepriseIds)],
                'image' => 'arkana_hybrid.jpg',
            ],
        ];

        foreach ($voitures as $voiture) {
            Voiture::create($voiture);
        }
    }
}
