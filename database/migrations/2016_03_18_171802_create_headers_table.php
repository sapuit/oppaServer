<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headers', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('title');
            $table->string('sub_title');
            $table->string('image');
            $dt = \Carbon\Carbon::createFromFormat('Y/m/d', $value)->toDateString();
            $this->attributes['id'] = $dt;
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
        Schema::drop('headers');
    }
}
