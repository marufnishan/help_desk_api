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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->text('groups');
            $table->text('requester_name');
            $table->text('technician');
            $table->text('subject');
            $table->date('dateofcreate');
            $table->longText('description');
            $table->text('priority');
            $table->enum('request_type',['new', 'existing', 'reopen']);
            $table->enum('status',['open', 'closed', 'archieved']);
            $table->date('due_date');
            $table->date('date_closed');
            $table->date('date_archived');
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
        Schema::dropIfExists('requests');
    }
};
