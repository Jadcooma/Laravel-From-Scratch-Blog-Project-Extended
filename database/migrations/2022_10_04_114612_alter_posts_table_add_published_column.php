<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPostsTableAddPublishedColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('posts')) {
          return;
        }

        Schema::table('posts', function(Blueprint $table) {
          $table->boolean('published')->after('body');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      if (!Schema::hasColumn('posts', 'published')) {
        return;
      }

      Schema::dropColumns('posts', 'published');
    }
}
