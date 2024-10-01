<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_tag', function (Blueprint $table) {
            //creao la colonna in relazione con posts
            $table->unsignedBigInteger('post_id');

            //assegno la FK
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->cascadeOnDelete();
                //in caso di eliminazione di un post viene cancellato tutto il record della relazione 
   

              //creao la colonna in relazione con posts
              $table->unsignedBigInteger('tag_id');

              //assegno la FK
              $table->foreign('tag_id')
                  ->references('id')
                  ->on('tags')
                  ->cascadeOnDelete();
                  //in caso di eliminazione di un post viene cancellato tutto il record della relazione 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
    }
};
