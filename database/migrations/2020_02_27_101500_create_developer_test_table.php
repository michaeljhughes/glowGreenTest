<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\DeveloperTest;

class CreateDeveloperTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developer_tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference');
            $table->string('name');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
        });

        DeveloperTest::create([
            'reference' => '01AA-lkads',
            'name' => 'Object A',
            'description' => 'Just a boring object in the database.',
        ]);

        DeveloperTest::create([
            'reference' => '02BB-l0a7n',
            'name' => 'Object B',
            'description' => 'Just another boring object in the database.',
        ]);

        DeveloperTest::create([
            'reference' => '03CC-l0a7n',
            'name' => 'Object C',
            'description' => 'Yet another boring object in the database.',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
}
