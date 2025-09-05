<?php

namespace Database\Seeders;

use App\Models\Entreprise;
use Illuminate\Database\Seeder;

class EntrepriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entreprises = [
            [
                'nom' => 'Renault Occasions Paris',
                'adresse_physique' => '123 Avenue des Champs-Élysées',
                'adresse_email' => 'paris@renault-occasions.fr',
                'telephone' => '0142030405',
                'ville' => 'Paris',
                'pays' => 'France',
                'code_postal' => '75008',
                'siret' => '12345678901234',
                'description' => 'Concessionnaire officiel Renault Occasions à Paris',
                'site_web' => 'https://paris.renault-occasions.fr',
            ],
            [
                'nom' => 'Renault Occasions Lyon',
                'adresse_physique' => '45 Rue de la République',
                'adresse_email' => 'lyon@renault-occasions.fr',
                'telephone' => '0478901234',
                'ville' => 'Lyon',
                'pays' => 'France',
                'code_postal' => '69002',
                'siret' => '56789012345678',
                'description' => 'Concessionnaire officiel Renault Occasions à Lyon',
                'site_web' => 'https://lyon.renault-occasions.fr',
            ],
            [
                'nom' => 'Renault Occasions Marseille',
                'adresse_physique' => '1 Rue de la République',
                'adresse_email' => 'marseille@renault-occasions.fr',
                'telephone' => '0490123456',
                'ville' => 'Marseille',
                'pays' => 'France',
                'code_postal' => '13002',
                'siret' => '90123456789012',
                'description' => 'Concessionnaire officiel Renault Occasions à Marseille',
                'site_web' => 'https://marseille.renault-occasions.fr',
            ],
        ];

        foreach ($entreprises as $entreprise) {
            Entreprise::create($entreprise);
        }
    }
}
