<?php

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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(column:"product_id");
            $table->foreign(columns:"product_id")->references(columns:"id")->on(table:"products")
            ->cascadeOnUpdate()->restrictOnDelete();
            $table->integer(column:"quantity");

            



            $table->timestamp(column:"created_at")->useCurrent();
            $table->timestamp(column:"updated_at")->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
