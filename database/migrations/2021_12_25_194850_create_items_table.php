<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->text('description')->nullable();
            $table->json('properties')->comment('Rent prices etc');
            $table->date('added_date')->comment('Real date of product adding');
            $table->enum('status', ['broken','in_repair', 'rented', 'available_for_rent']);
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table
                ->foreign('category_id')
                ->references('id')
                ->on('item_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table
                ->foreign('type_id')
                ->references('id')
                ->on('types')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
