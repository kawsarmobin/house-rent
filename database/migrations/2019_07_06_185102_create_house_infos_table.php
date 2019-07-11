<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\HouseInfo;

class CreateHouseInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('house_type_id');
            $table->string('title');
            $table->string('house_address');
            $table->string('house_token');
            $table->boolean('status')->default(HouseInfo::STATUS['Deactive']);
            $table->boolean('approved')->default(HouseInfo::IS_APPROVED['Unapproved']);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('house_type_id')->references('id')->on('house_types')->onDelete('cascade');
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
        Schema::dropIfExists('house_infos');
    }
}
