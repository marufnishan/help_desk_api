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
            $table->string('dateofcreate',20);
            $table->longText('description');
            $table->text('priority');
            $table->enum('request_type',['new', 'existing', 'reopen']);
            $table->enum('status',['open', 'closed', 'archieved']);
            $table->string('due_date',20);
            $table->string('date_closed',20);
            $table->string('date_archived',20);
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
