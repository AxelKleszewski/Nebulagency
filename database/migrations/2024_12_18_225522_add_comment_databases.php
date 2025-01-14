<?php

use App\Models\Etape;
use App\Models\User;
use App\Models\Voyage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('voyagecomments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()
                ->onUpdate('cascade');
            $table->foreignIdFor(Voyage::class)->constrained();
            $table->text('comment');
        });

        Schema::create('etapecomments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()
                ->onUpdate('cascade');
            $table->foreignIdFor(Etape::class)->constrained();
            $table->text('comment');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voyagecomments');
        Schema::dropIfExists('etapecomments');
    }
};
