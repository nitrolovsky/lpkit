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

            $table->string('company_name')->nullable();
            $table->string('description')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();

            $table->string('offer')->nullable();
            $table->text('bullets')->nullable();
            $table->string('video')->nullable();

            $table->string('lead_magnet')->nullable();
            $table->string('call_to_action')->nullable();

            $table->string('name_form_enabled')->nullable();
            $table->string('email_form_enabled')->nullable();
            $table->string('phone_form_enabled')->nullable();
            $table->string('comment_form_enabled')->nullable();
            $table->text('money_button')->nullable();

            $table->string('background_image')->nullable();
            $table->text('legal_information')->nullable();

            $table->string('case_enabled')->nullable();
            $table->string('case_title')->nullable();
            $table->string('case_video_1')->nullable();
            $table->text('case_text_1')->nullable();
            $table->string('case_video_2')->nullable();
            $table->text('case_text_2')->nullable();
            $table->string('case_video_3')->nullable();
            $table->text('case_text_3')->nullable();
            $table->string('case_video_4')->nullable();
            $table->text('case_text_4')->nullable();
            $table->string('case_video_5')->nullable();
            $table->text('case_text_5')->nullable();
            $table->string('case_video_6')->nullable();
            $table->text('case_text_6')->nullable();
            $table->string('case_video_7')->nullable();
            $table->text('case_text_7')->nullable();
            $table->string('case_video_8')->nullable();
            $table->text('case_text_8')->nullable();
            $table->string('case_video_9')->nullable();
            $table->text('case_text_9')->nullable();

            $table->string('comments_enabled')->nullable();

            $table->string('lead_magnet_file')->nullable();
            $table->string('subdomain')->nullable()->unique();
            $table->string('title')->nullable();
            $table->string('redirect')->nullable();

            $table->text('google')->nullable();
            $table->text('yandex')->nullable();
            $table->text('yandex_target_button')->nullable();

            $table->string('mailchimp_api_key')->nullable();
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
