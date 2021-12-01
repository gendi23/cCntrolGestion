<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarcosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barcos', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->integer('numero_IMO')->nullable();
            $table->string('armador')->nullable();
            $table->integer('numero_registro')->nullable();
            $table->string('indicativo_chamada')->nullable();
            $table->date('ano_construcao')->nullable();
            $table->string('numero_construcao')->nullable();
            $table->string('estaleiro')->nullable();
            $table->string('tipo_barco')->nullable();
            $table->string('navegacao')->nullable();
            $table->string('servico')->nullable();
            $table->integer('n_p_a')->nullable();
            $table->integer('cpmto_total')->nullable();
            $table->integer('cpmto_perpendicular')->nullable();
            $table->string('manga')->nullable();
            $table->string('strut')->nullable();
            $table->string('tonelagem_bruta')->nullable();
            $table->string('tonelagem_líquida')->nullable();
            $table->string('transporte_bruto')->nullable();
            $table->string('motor_ignicao')->nullable();
            $table->integer('qantidade')->nullable();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('potencia/velocidade')->nullable();

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
        Schema::dropIfExists('barcos');
    }
}
