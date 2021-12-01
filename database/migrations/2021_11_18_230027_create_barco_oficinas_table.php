<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarcoOficinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barco_oficinas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('barco_id');
            $table->foreign('barco_id')
                ->references('id')->on('barcos')
                ->onDelete('cascade');

            $table->unsignedBigInteger('oficina_id');
            $table->foreign('oficina_id')
                ->references('id')->on('oficinas')
                ->onDelete('cascade');
                
            $table->string('numero_orden')->nullable();
            $table->string('nome')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->string('nome_documento')->nullable();
            $table->string('url_documento')->nullable();


            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barco_oficinas');
    }
}
