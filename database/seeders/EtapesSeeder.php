<?php

namespace Database\Seeders;

use App\Models\Etape;
use Illuminate\Database\Seeder;

class EtapesSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $titres = [
            "Mercure",
            "Vénus",
            "Mars",
            "Ganymède",
            "Titan",
            "Pluton",
        ];

        $resumes = [
            "Si proche du Soleil.",
            "La plus chaude de toutes.",
            "Chez les martiens.",
            "Vue sur la plus géante du système.",
            "Sous les anneaux de Saturne.",
            "Toujours une planète ?",
        ];

        $descriptions = [
            "Petite planète rocheuse, la plus proche du Soleil, avec des températures extrêmes et une surface criblée de cratères.
            Venez admirer le Soleil de plus prêt que vous ne le pouviez avant.",
            "Planète voisine de la Terre, enveloppée d'une épaisse atmosphère de dioxyde de carbone et de nuages d'acide sulfurique, avec une chaleur suffocante.
            Nous ne pourrons pas toucher la surface, car elle est la plus chaude de toutes, mais vous pourrez vous détendre dans nos espaces balnéaires atmosphériques.",
            "Planète rouge, désertique, avec des traces de glace, des montagnes volcaniques géantes et des canyons profonds.
            Découvrez les traces des possibles anciennes formes de vie, et laissez-vous inspirer par les histoires que ces martiens auraient pu nous offrir.",
            "Plus grand satellite naturel du système solaire, lune de Jupiter, avec une fine atmosphère d'oxygène et une surface glacée.
            D'ici, il sera possible de regarder la plus grande planète du Système solaire, et sa mystérieuse tâche rouge.",
            "Lune de Saturne, entourée d'une épaisse atmosphère riche en azote, avec des lacs et des rivières d'hydrocarbures liquides.
            Laissez-vous hypnotisés par les grands anneaux de Saturne, baignés dans sa ceinture d'astéroides.",
            "Planète naine glacée, située dans la ceinture de Kuiper, avec une surface de glace et un cœur rocheux.
            Encore débatue pour savoir si il s'agit d'une planète ou non, Pluton vous permettra observer le Soleil du point le plus distant de notre Système.",
        ];

        $dates = [
            ["debut" => "2024-03-17",
                "fin" => "2024-03-21",],
            ["debut" => "2024-03-21",
                "fin" => "2024-03-25",],
            ["debut" => "2024-03-25",
                "fin" => "2024-03-29",],
            ["debut" => "2024-03-29",
                "fin" => "2024-04-02",],
            ["debut" => "2024-04-02",
                "fin" => "2024-04-06",],
            ["debut" => "2024-04-06",
                "fin" => "2024-04-10",],
        ];

        $nbEtapes = count($titres);

        for ($i = 0; $i < $nbEtapes; $i++) {
            $etape = new Etape();
            $etape->titre = $titres[$i];
            $etape->resume = $resumes[$i];
            $etape->description = $descriptions[$i];
            $etape->debut = $dates[$i]["debut"];
            $etape->fin = $dates[$i]["fin"];
            $etape->voyage_id = 1;
            $etape->save();
        }

        $titres = [
            "Sontar",
            "Mondas",
            "Ruta Prime",
            "Skaro",
        ];

        $resumes = [
            "La planète des clones.",
            "La jumelle de la Terre.",
            "Au travers de la glace.",
            "Exterminer !",
        ];

        $descriptions = [
            "Monde des Sontariens, guerriers clonés, caractérisé par une société militariste et un environnement austère.",
            "Planète jumelle de la Terre, origine des Cybermen, autrefois semblable à la Terre avant son exil dans l'espace.",
            "Planète natale des Rutans, ennemis jurés des Sontariens, dotée d'une technologie avancée et d'une apparence énigmatique.",
            "Monde désolé des Daleks, marqué par des guerres nucléaires et des paysages ravagés.",
        ];

        $dates = [
            ["debut" => "2024-05-02",
                "fin" => "2024-05-13",],
            ["debut" => "2024-05-13",
                "fin" => "2024-05-24",],
            ["debut" => "2024-05-24",
                "fin" => "2024-06-04",],
            ["debut" => "2024-06-04",
                "fin" => "2024-06-15",],
        ];

        $nbEtapes = count($titres);

        for ($i = 0; $i < $nbEtapes; $i++) {
            $etape = new Etape();
            $etape->titre = $titres[$i];
            $etape->resume = $resumes[$i];
            $etape->description = $descriptions[$i];
            $etape->debut = $dates[$i]["debut"];
            $etape->fin = $dates[$i]["fin"];
            $etape->voyage_id = 2;
            $etape->save();
        }

        $titres = [
            "Tatooïne",
            "Hoth",
            "Dagobah",
            "Coruscant",
            "Geonosis",
        ];

        $resumes = [
            "Assistez aux courses endiablées de Podracing !",
            "Le refuge des rebelles.",
            "Le sanctuaire du plus vénérable des Jedi.",
            "Le noyau de la République.",
            "Au coeur de l'armée Séparatiste.",
        ];

        $descriptions = [
            "Planète désertique, domicile de Luke Skywalker, avec des dunes infinies, deux soleils et peuplée les Jawas et les Tusken.",
            "Planète glacée, lieu de la bataille épique entre l'Empire et la Rébellion, frappée par de violentes tempêtes de neige.",
            "Marais humide et isolé, où Yoda se cache après la chute des Jedi, abritant une faune étrange et une forte connexion à la Force.",
            "Planète-cité, cœur de la République Galactique, avec des gratte-ciel immenses et une vie urbaine dense, gouvernée par le Sénat.",
            "Planète rocheuse, lieu de la première bataille des clones, avec des arènes géantes et des insectoïdes Geonosians, producteurs de la redoutable armée Séparatiste de droïdes.",
        ];

        $dates = [
            ["debut" => "2024-09-17",
                "fin" => "2024-09-27",],
            ["debut" => "2024-09-27",
                "fin" => "2024-10-07",],
            ["debut" => "2024-10-07",
                "fin" => "2024-10-17",],
            ["debut" => "2024-10-17",
                "fin" => "2024-10-27",],
            ["debut" => "2024-10-27",
                "fin" => "2024-11-06",],
        ];

        $nbEtapes = count($titres);

        for ($i = 0; $i < $nbEtapes; $i++) {
            $etape = new Etape();
            $etape->titre = $titres[$i];
            $etape->resume = $resumes[$i];
            $etape->description = $descriptions[$i];
            $etape->debut = $dates[$i]["debut"];
            $etape->fin = $dates[$i]["fin"];
            $etape->voyage_id = 3;
            $etape->save();
        }
    }
}
