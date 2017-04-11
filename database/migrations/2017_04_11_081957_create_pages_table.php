<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('project_id')->nullable();
            $table->string('subdomain')->nullable();
            $table->string('company_name')->nullable();
            $table->string('description')->nullable();
            $table->string('offer')->nullable();
            $table->text('bullets')->nullable();
            $table->string('video')->nullable();
            $table->string('lead_magnet')->nullable();
            $table->string('call_to_action')->nullable();
            $table->string('name_form_enabled')->nullable();
            $table->string('email_form_enabled')->nullable();
            $table->string('phone_form_enabled')->nullable();
            $table->string('comment_form_enabled')->nullable();
            $table->string('background_image')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->text('legal_information')->nullable();
            $table->string('comments_enabled')->nullable();
            $table->text('google')->nullable();
            $table->text('yandex')->nullable();
            $table->string('title')->nullable();
            $table->string('redirect')->nullable();
            $table->string('lead_magnet_file')->nullable();
            $table->string('letter_id')->nullable();
            $table->text('letter')->nullable();
            $table->string('mailchimp_id')->nullable();
            $table->string('mailchimp_list_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
