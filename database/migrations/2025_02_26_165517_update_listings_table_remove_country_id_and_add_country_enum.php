<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateListingsTableRemoveCountryIdAndAddCountryEnum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listings', function (Blueprint $table) {
            // Check if the foreign key exists, then drop it
            // No need to drop constraint if it doesn't exist
            if (Schema::hasColumn('listings', 'country_id')) {
                $table->dropForeign(['country_id']);  // Drop the foreign key if exists
            }

            // Drop the country_id column
            $table->dropColumn('country_id');

            // Add the enum column for country
            $table->enum('country', ['Portugal', 'Morocco', 'Spain'])->after('location');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('listings', function (Blueprint $table) {
            // Add back the country_id column (with foreign key)
            $table->unsignedBigInteger('country_id')->after('location');

            // Add back the foreign key constraint
            $table->foreign('country_id')->references('id')->on('countries');

            // Drop the enum column
            $table->dropColumn('country');
        });
    }
}
