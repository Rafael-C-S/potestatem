<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AcreateCrCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cr_curso', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 200);
            // $table->date('data_inicial');
            // $table->date('data_final');
            $table->date('imagem')->nullable();
            $table->text('conteudo_programatico');
            $table->softDeletes();
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
        Schema::dropIfExists('cr_curso');
    }
}
