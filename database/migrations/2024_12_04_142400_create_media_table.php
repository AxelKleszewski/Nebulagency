<?php

use App\Enums\FormatMedia;
use App\Models\Etape;
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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('url');
            $table->enum("format", FormatMedia::toValuesArray())
                ->default(FormatMedia::IMAGE);
            $table->foreignIdFor(Etape::class)
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
