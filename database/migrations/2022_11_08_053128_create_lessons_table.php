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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('标题');
            $table->string('description', 1024)->nullable()->comment('描述');
            $table->string('cover')->nullable()->comment('课程封面');
            $table->tinyInteger('state')->default(0)->comment('状态');
            $table->unsignedBigInteger('views')->default(0)->comment('浏览量');
            $table->unsignedTinyInteger('mode')->default(0)->comment('模式：章，节');
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
        Schema::dropIfExists('lesson');
    }
};
