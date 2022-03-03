<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

class DatabaseChanges2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('is_available');
            $table->string('status')->after('added_date')->default('available');
            $table->unsignedBigInteger('outlet_id')->after('status')->nullable();

            $table
                ->foreign('outlet_id')
                ->references('id')
                ->on('outlets')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('item_categories', function (Blueprint $table) {
            $table->string('code')->after('id')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('first_name')->after('id');
            $table->string('last_name')->after('first_name');
            $table->json('phone_numbers')->after('email')->nullable();
            $table->unsignedBigInteger('supervisor_id')->after('password')->nullable();

            $table
                ->foreign('supervisor_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        $roles = ['administrator', 'outlet manager', 'technical operator', 'delivery', 'data entry user'];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
