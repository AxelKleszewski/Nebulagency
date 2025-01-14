<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Voyage;
use App\Models\Etape;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $voyageComments = [
            "Super voyage",
            "Incroyable destination",
            "Une destination de rêve"
        ];

        $etapeComments = [
            "Super étape",
            "Incroyable expérience",
            "Une étape mémorable"
        ];

        $userIds = User::pluck('id')->toArray();
        $voyageIds = Voyage::pluck('id')->toArray();
        $etapeIds = Etape::pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            DB::table('voyagecomments')->insert([
                'user_id' => $userIds[array_rand($userIds)],
                'voyage_id' => $voyageIds[array_rand($voyageIds)],
                'comment' => $voyageComments[array_rand($voyageComments)],
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('etapecomments')->insert([
                'user_id' => $userIds[array_rand($userIds)],
                'etape_id' => $etapeIds[array_rand($etapeIds)],
                'comment' => $etapeComments[array_rand($etapeComments)],
            ]);
        }
    }
}
