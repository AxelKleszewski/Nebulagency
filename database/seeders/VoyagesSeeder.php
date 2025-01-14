<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Voyage;
use Illuminate\Database\Seeder;

class VoyagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Vérifiez qu'il y a au moins un utilisateur dans la base
        $user = User::query()->inRandomOrder()->first();

        if (!$user) {
            $this->command->error('Aucun utilisateur trouvé. Veuillez exécuter le seeder UsersSeeder avant ce seeder.');
            return;
        }

        $userId = $user->id; // Récupère l'ID de l'utilisateur aléatoire

        // Création des voyages
        Voyage::create([
            'titre' => "Le Système solaire",
            'resume' => "Les voisins de notre système.",
            'description' => "Venez découvrir nos planètes voisines !
            De Mercure, la plus proche de notre étoile, jusqu'à Pluton, la controversée, visitez les surfaces et les environs des
            planètes qui nous accompagnées dans notre Histoire.",
            'duree_jours' => 24,
            'galaxie' => "Voie Lactée",
            'prix_euros' => 2300,
            'en_ligne' => true,
            'visuel' => "images/systemesolaire/voie-lactee.jpg",
            'user_id' => $userId,
        ]);

        Voyage::create([
            'titre' => "La Spirale de Mutter",
            'resume' => "Tous à bord du TARDIS.",
            'description' => "Plongez dans l'univers de Docteur Who !
            Accompagnés par des disciples du Docteur, nous partons à la visite des planètes peuplées par les
            personnages emblématiques de la série. N'ayez crainte des populations locales potentiellement hostiles, vous serez entre de bonnes mains !",
            'duree_jours' => 44,
            'galaxie' => "Spirale de Mutter",
            'prix_euros' => 5800,
            'en_ligne' => true,
            'visuel' => "/images/spiralemutter/mutter-spiral.jpg",
            'user_id' => $userId,
        ]);

        Voyage::create([
            'titre' => "Le Noyau Profond",
            'resume' => "Dans une galaxie lointaine... Très lointaine !",
            'description' => "Plongez dans l'univers de Star Wars !
            Assistez aux évènements des planètes les mieux réputées, et découvrez leurs cultures.
            La visite se portera sur l'histoire des différents systèmes, tel la Guerre des Clones et la Chute de la République.",
            'duree_jours' => 50,
            'galaxie' => "Noyau Profond",
            'prix_euros' => 7400,
            'en_ligne' => true,
            'visuel' => "/images/noyauprofond/noyau-profond.jpg",
            'user_id' => $userId,
        ]);
    }
}
