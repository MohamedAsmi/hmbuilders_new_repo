<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'category')) {
                $table->string('category')->nullable()->after('location');
            }

            if (!Schema::hasColumn('projects', 'year')) {
                $table->string('year', 4)->nullable()->after('category');
            }

            if (!Schema::hasColumn('projects', 'description')) {
                $table->text('description')->nullable()->after('year');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'description')) {
                $table->dropColumn('description');
            }

            if (Schema::hasColumn('projects', 'year')) {
                $table->dropColumn('year');
            }

            if (Schema::hasColumn('projects', 'category')) {
                $table->dropColumn('category');
            }
        });
    }
};
