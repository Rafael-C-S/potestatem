<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_curso', function (Blueprint $table) {
            $table->id();
            $table->integer('aluno_id')->unsigned();
            $table->foreign('aluno_id')->references('id')->on('al_aluno');

            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')->references('id')->on('cr_curso');
            
            $table->string('matricula')->unique();
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
        Schema::dropIfExists('aluno_curso');
    }
}
