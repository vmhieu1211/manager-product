<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suggest', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->enum('suggest_type', ['buy', 'sell']);
            $table->dateTime('suggest_date');
            $table->integer('person_suggest_id');
            $table->enum('state', ['chua_duyet', 'da_duyet', 'da_thuc_hien']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suggest');
    }
};
