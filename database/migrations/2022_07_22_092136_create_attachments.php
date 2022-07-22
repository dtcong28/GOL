<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->bigIncrements('id')->primary()->unsigned();
            $table->string('uuid', 36);
            $table->string('attachable_type', 255);
            $table->bigInteger('attachable_id',20)->unsigned();
            $table->string('file_path', 255);
            $table->string('extension', 255);
            $table->string('mime_type', 255);
            $table->integer('size', 10);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachments');
    }
};
