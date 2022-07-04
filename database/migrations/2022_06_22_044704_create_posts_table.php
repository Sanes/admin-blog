<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Category;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('pagetitle')->unique();
            $table->string('longtitle')->nullable();
            $table->string('alias')->unique();
            $table->string('description')->nullable();
            $table->text('introtext')->nullable();
            $table->text('content')->nullable();
            $table->boolean('published')->default(false);
            $table->dateTime('published_at')->default(now());
            $table->foreignIdFor(User::class)->constrained()->onUpdate('cascade')->onDelete('cascade');;
            $table->foreignIdFor(Category::class)->nullable()->constrained()->nullOnDelete();
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
        Schema::dropIfExists('posts');
    }
};
