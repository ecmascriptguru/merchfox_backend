<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBulletPointsIntoProductsAndItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->longText('bullet_points')->nullable()->after('title')->default(null);
            $table->longText('brand_url')->nullable()->after('img_url')->default(null);
        });

        Schema::table('items', function (Blueprint $table) {
            $table->longText('bullet_points')->nullable()->after('title')->default(null);
            $table->longText('brand_url')->nullable()->after('img_url')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('bullet_points');
            $table->dropColumn('brand_url');
        });

        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('bullet_points');
            $table->dropColumn('brand_url');
        });
    }
}
