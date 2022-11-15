<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lesson_id')->comment('课程ID');
            $table->unsignedBigInteger('chapter_id')->comment('章ID');
            $table->string('title')->comment('节名称');
            $table->text('content')->comment('节内容');
            $table->unsignedTinyInteger('type')->default(0)->comment('类型');
            $table->unsignedInteger('order')->default(0)->comment('排序');
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
        Schema::dropIfExists('section');
    }
};
