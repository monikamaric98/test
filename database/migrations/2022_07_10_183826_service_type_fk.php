<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ServiceTypeFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('termins', function ($table) {
            $table->foreignId('service_type_id')->constrained('service_types');
            $table->foreignId('salon_id')->constrained('salons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('termins', function ($table) {
            $table->dropForeign(['service_type_id']);
            $table->dropForeign(['salon_id']);
        });
    }
}
