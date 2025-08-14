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
        //
        Schema::table('item_user', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->change();
            $table->dropPrimary();
            $table->dropColumn('id');
            $table->primary(['user_id', 'item_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
