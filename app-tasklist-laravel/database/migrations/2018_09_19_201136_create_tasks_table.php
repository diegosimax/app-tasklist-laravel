<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');                //Identificador Sequencial
            $table->string('title', 50);             //Título da tarefa 
            $table->char('finished', 1);             //Concluído a tarefa? (Y-Sim | N-Não) 
            $table->text('description')->nullable(); //Descrição da tarefa
            $table->timestamps();                    //Criado em/Alterado em              
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
