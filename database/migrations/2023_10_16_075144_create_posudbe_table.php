
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Clan; 
use App\Models\Knjiga;

class CreatePosudbeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posudbe', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clan_id');
            $table->unsignedBigInteger('knjiga_id');
            $table->date('datum_posudbe');
            $table->date('datum_povratka')->nullable();
            $table->timestamps();

            $table->foreign('clan_id')->references('id')->on('clans');
            $table->foreign('knjiga_id')->references('id')->on('knjige');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posudbe');
    }
}
