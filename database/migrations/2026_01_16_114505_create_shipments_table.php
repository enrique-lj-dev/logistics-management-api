<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {
	    $table->id();
	    $table->string('reference')->unique();
	    $table->foreignId('client_id')->constrained()->cascadeOnDelete();
	    $table->enum('channel', ['b2b', 'b2c']);
	    $table->enum('priority', ['low', 'normal', 'high'])->default('normal');
	    $table->text('origin_address');
	    $table->text('destination_address');
	    $table->date('sla_date')->nullable();
	    $table->string('current_status');
	    $table->timestamps();
	});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
