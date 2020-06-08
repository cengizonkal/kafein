<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_tables', function (Blueprint $table) {
            $table->id();
            $table->string('code', '50')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('service_table_status_id');
            $table->foreign('service_table_status_id')
                ->references('id')
                ->on('service_table_statuses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_tables');
    }
}
