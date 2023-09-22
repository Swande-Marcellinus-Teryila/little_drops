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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('referral_code');
            $table->integer('invest')->default(0);
            $table->integer("i_have_payed")->default(0);
            $table->integer("is_payment_confirmed")->default(0);
            $table->integer("little_drop_payment_status")->default(0);
            $table->integer("cash_out_status")->default(0);
            $table->integer("merge_status")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
