<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Barang;
use App\Models\Gudang;
use App\Models\Supplier;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_barang');
            $table->string('merk');
            $table->string('jenis');
            $table->string('tipe');
            $table->integer('stok');
            $table->foreignIdFor(Gudang::class,'id_gudang');
            $table->foreignIdFor(Supplier::class,'id_supplier');
            $table->softDeletes();
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
        Schema::dropIfExists('barangs');
    }
};
