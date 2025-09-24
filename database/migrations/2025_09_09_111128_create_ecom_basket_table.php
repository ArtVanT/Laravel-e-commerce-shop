<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ecombaskets', function (Blueprint $table) {
            $table->id();
            $table->string("name")->default("default");
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('basket_items', function (Blueprint $table) {
            $table->id();

            // Columns
            $table->unsignedBigInteger('basket_id');
            $table->unsignedBigInteger('item_id');

            $table->integer('quantity')->default(1);
            $table->decimal('price_at_time', 10, 2)->nullable();
            $table->timestamps();

            // Foreign keys with custom names
            $table->foreign('basket_id', 'unique_basket_items_basket_fk')
                ->references('id')->on('ecombaskets')
                ->onDelete('cascade');

            $table->foreign('item_id', 'unique_basket_items_item_fk')
                ->references('id')->on('items')
                ->onDelete('cascade');

            $table->unique(['basket_id', 'item_id']);
        });
    }

    public function down(): void
    {
        Schema::table('basket_items', function (Blueprint $table) {
            // Drop FKs explicitly by their names
            $table->dropForeign('unique_basket_items_basket_fk');
            $table->dropForeign('unique_basket_items_item_fk');
        });

        Schema::dropIfExists('basket_items');
        Schema::dropIfExists('baskets');
    }
};
