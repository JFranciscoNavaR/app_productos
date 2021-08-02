<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            $table->string('codigo', 255);
            $table->string('nombre', 255);
            $table->string('marca', 255);
            $table->string('descripcion', 255);
            $table->decimal('precio', $precision = 8, $scale = 2);
            $table->integer('cantidad');

            $table->unsignedBigInteger('statu_id')->nullable();
            $table->foreign('statu_id')
                ->references('id')
                ->on('status')
                ->onDelete('set null');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
                
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
        Schema::dropIfExists('productos');
    }
}
