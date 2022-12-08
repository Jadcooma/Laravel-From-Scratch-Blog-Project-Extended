<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPostsAddViewsCount extends Migration
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
          $table->integer('views_count')->after('body')->nullable()->default(0);
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      if (!Schema::hasColumn('posts', 'views_count')) {
        return;
      }

      Schema::dropColumns('posts', 'views_count');
    }
}
