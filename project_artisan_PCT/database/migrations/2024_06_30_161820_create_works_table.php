<?php

use App\Models\User;
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
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("categorie");
            $table->text("description");
            $table->string("picture");
            $table->float("prix");
            $table->string("emplacement");
            $table->timestamps();
        });
        Schema::table('works', function (Blueprint $table) {
            $table->foreignIdFor(User::class);
        });
    }
    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
