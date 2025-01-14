<?php

namespace Database\Seeders;

use App\Enums\FormatMedia;
use App\Models\Etape;
use App\Models\Media;
use Illuminate\Database\Seeder;

class MediasSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $medias = [
            "Mercure1" => "/storage/images/systemesolaire/mercure.png",
            "Vénus1" => "/storage/images/systemesolaire/venus.png",
            "Mars1" => "/storage/images/systemesolaire/mars.png",
            "Ganymède1" => "/storage/images/systemesolaire/ganymede.png",
            "Titan1" => "/storage/images/systemesolaire/titan.png",
            "Pluton1" => "/storage/images/systemesolaire/pluton.png",
        ];

        foreach ($medias as $nom => $url) {
            if ($nom === 'Voie Lactée') {
                continue;
            }
            $pattern = '/(\\D*)([0-9]+?)/';
            $success = preg_match($pattern, $nom, $match);
            if ($success) {
                $nom = $match[1];
            } else {
                continue;
            }
            $id = Etape::where('titre', $nom)->first();
            if ($id === null) {
                echo "Etape $nom non trouvée\n";
                continue;
            }
            //$nom = str_replace('.*([0-9]*)', '', $nom);
            //echo "$nom\n";
            Media::create([
                'titre' => $nom,
                'url' => env('APP_URL'). "$url",
                'etape_id' => Etape::where('titre', $nom)->first()->id,
            ]);
        }

        $medias = [
            "Sontar1" => "/storage/images/spiralemutter/sontar.png",
            "Mondas1" => "/storage/images/spiralemutter/mondas.png",
            "Ruta Prime1" => "/storage/images/spiralemutter/ruta-prime.png",
            "Skaro1" => "/storage/images/spiralemutter/skaro.png",
        ];

        foreach ($medias as $nom => $url) {
            if ($nom === 'Spirale de Mutter') {
                continue;
            }
            $pattern = '/(\\D*)([0-9]+?)/';
            $success = preg_match($pattern, $nom, $match);
            if ($success) {
                $nom = $match[1];
            } else {
                continue;
            }
            $id = Etape::where('titre', $nom)->first();
            if ($id === null) {
                echo "Etape $nom non trouvée\n";
                continue;
            }
            //$nom = str_replace('.*([0-9]*)', '', $nom);
            //echo "$nom\n";
            Media::create([
                'titre' => $nom,
                'url' => env('APP_URL'). "$url",
                'etape_id' => Etape::where('titre', $nom)->first()->id,
            ]);
        }

        $medias = [
            "Tatooïne1" => "/storage/images/noyauprofond/tatooine.png",
            "Hoth1" => "/storage/images/noyauprofond/hoth.png",
            "Dagobah1" => "/storage/images/noyauprofond/dagobah.png",
            "Coruscant1" => "/storage/images/noyauprofond/coruscant.png",
            "Geonosis1" => "/storage/images/noyauprofond/geonosis.png",
        ];

        foreach ($medias as $nom => $url) {
            if ($nom === 'Noyau Profond') {
                continue;
            }
            $pattern = '/(\\D*)([0-9]+?)/';
            $success = preg_match($pattern, $nom, $match);
            if ($success) {
                $nom = $match[1];
            } else {
                continue;
            }
            $id = Etape::where('titre', $nom)->first();
            if ($id === null) {
                echo "Etape $nom non trouvée\n";
                continue;
            }
            //$nom = str_replace('.*([0-9]*)', '', $nom);
            //echo "$nom\n";
            Media::create([
                'titre' => $nom,
                'url' => env('APP_URL'). "$url",
                'etape_id' => Etape::where('titre', $nom)->first()->id,
            ]);
        }
    }
}
