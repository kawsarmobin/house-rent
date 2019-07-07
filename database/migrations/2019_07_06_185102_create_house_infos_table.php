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
            $table->bigInteger('user_id');
            $table->bigInteger('house_type_id');
            $table->string('title');
            $table->string('house_address');
            $table->string('house_token');
            $table->boolean('status')->default(HouseInfo::STATUS['Deactive']);
            $table->boolean('approved')->default(HouseInfo::IS_APPROVED['Unapproved']);
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
