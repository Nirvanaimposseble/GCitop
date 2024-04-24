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
        Schema::create('detailtickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_id')->nullable();
            $table->string('ssubkategori');
            $table->string('kkategoriticket');
            $table->decimal('biaya',10,3);
            $table->string('saran');
            $table->string('jenis');
            $table->date('process_at')->nullable();
            $table->date('pending_at')->nullable();
            $table->bigInteger('pending_time')->nullable();
            $table->bigInteger('solved_time')->nullable();
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
        Schema::dropIfExists('detailtickets');
    }
};
