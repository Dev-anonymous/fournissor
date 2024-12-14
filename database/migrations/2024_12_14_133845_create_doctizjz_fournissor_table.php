<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('appconfig', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('email')->nullable();
            $table->string('tel')->nullable();
            $table->string('adresse')->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
        });

        Schema::create('business', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedBigInteger('users_id')->index('fk_profil_users1_idx');
            $table->integer('category_id')->index('fk_profil_category1_idx');
            $table->string('businessname')->nullable();
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('category', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('category')->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('config', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('config')->nullable();
        });

        Schema::create('contact', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nom')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('sujet')->nullable();
            $table->text('message')->nullable();
            $table->dateTime('date')->nullable();
        });

        Schema::create('devis', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('service_id')->index('fk_devise_service1_idx');
            $table->unsignedBigInteger('users_id')->index('fk_devise_users1_idx');
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tokenable_type');
            $table->unsignedBigInteger('tokenable_id');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            $table->index(['tokenable_type', 'tokenable_id']);
        });

        Schema::create('service', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('business_id')->index('fk_service_business1_idx');
            $table->string('service')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->dateTime('date')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->enum('user_role', ['admin', 'provider', 'user'])->default('user');
            $table->string('phone')->nullable()->unique('phone_UNIQUE');
            $table->string('image')->nullable();
            $table->tinyInteger('active')->nullable()->default(1);
        });

        Schema::table('business', function (Blueprint $table) {
            $table->foreign(['category_id'], 'fk_profil_category1')->references(['id'])->on('category')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['users_id'], 'fk_profil_users1')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('devis', function (Blueprint $table) {
            $table->foreign(['service_id'], 'fk_devise_service1')->references(['id'])->on('service')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['users_id'], 'fk_devise_users1')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('service', function (Blueprint $table) {
            $table->foreign(['business_id'], 'fk_service_business1')->references(['id'])->on('business')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign(['users_id'], 'fk_users_users1')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('fk_users_users1');
        });

        Schema::table('service', function (Blueprint $table) {
            $table->dropForeign('fk_service_business1');
        });

        Schema::table('devis', function (Blueprint $table) {
            $table->dropForeign('fk_devise_service1');
            $table->dropForeign('fk_devise_users1');
        });

        Schema::table('business', function (Blueprint $table) {
            $table->dropForeign('fk_profil_category1');
            $table->dropForeign('fk_profil_users1');
        });

        Schema::dropIfExists('users');

        Schema::dropIfExists('service');

        Schema::dropIfExists('personal_access_tokens');

        Schema::dropIfExists('password_resets');

        Schema::dropIfExists('failed_jobs');

        Schema::dropIfExists('devis');

        Schema::dropIfExists('contact');

        Schema::dropIfExists('config');

        Schema::dropIfExists('category');

        Schema::dropIfExists('business');

        Schema::dropIfExists('appconfig');
    }
};
