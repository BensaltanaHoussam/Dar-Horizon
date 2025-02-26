<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Remove the foreign key constraint first (adjust the foreign key name if necessary)
        Schema::table('listings', function (Blueprint $table) {
            // Replace 'listings_country_id_foreign' with the actual name of your foreign key
            $table->dropForeign('listings_country_id_foreign');  // Use your actual foreign key name
        });

        // Drop the 'country_id' column from the 'listings' table
        Schema::table('listings', function (Blueprint $table) {
            $table->dropColumn('country_id');  // Drop the foreign key column
        });

        // Add the 'country' enum column to the 'listings' table
        Schema::table('listings', function (Blueprint $table) {
            $table->enum('country', ['Portugal', 'Morocco', 'Spain'])->after('location');
        });
    }

    public function down()
    {
        // Rollback: Recreate the 'country_id' column and drop the 'country' enum column
        Schema::table('listings', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
        });

        // Remove the 'country' enum column
        Schema::table('listings', function (Blueprint $table) {
            $table->dropColumn('country');
        });
    }
};
