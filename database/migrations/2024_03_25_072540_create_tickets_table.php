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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('no_ticket')->unique()->nullable();
            $table->string('kendala');
            $table->string('detail_kendala');
            $table->string('asset_id');
            $table->string('client_id');
            $table->string('lokasi_id');
            $table->string('agent_id')->nullable();
            $table->enum('status', ['Created', 'Onprocess', 'Pending', 'Resolved', 'Finished', 'Deleted','Assign'])->default('Created');
            $table->string('ticket_for');
            $table->enum('role', ['Service Desk', 'Agent']);
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
        Schema::dropIfExists('tickets');
    }
};
