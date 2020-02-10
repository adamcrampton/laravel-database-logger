<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Logs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function(Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable();
            $table->string('origin')->nullable();
            $table->enum('type', [
                        'log', 'store', 'change', 'delete'
                    ]);
            $table->enum('result', [
                        'success', 'neutral', 'failure'
                    ]);
            $table->enum('level', [
                        'emergency', 'alert', 'critical', 'error', 'warning', 'notice', 'info', 'debug'
                    ]);
            $table->timestamps();
        });
    }
}
