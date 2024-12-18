<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThailandSubDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subdistricts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code');
            $table->string('name_in_thai', 150);
            $table->string('name_in_english', 150)->nullable();
            $table->decimal('latitude', 6, 3);
            $table->decimal('longitude', 6, 3);
            $table->integer('district_id')->unsigned();
            $table->integer('zip_code');

            $table->unique('code', 'ux_sub_districts_code');
            $table->index('district_id', 'ix_sub_districts_district_id');
            $table->index('zip_code', 'ix_sub_districts_zip_code');
            $table->foreign('district_id', 'fk_sub_districts_districts')
                ->references('id')
                ->on('districts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subdistricts');
    }
}
