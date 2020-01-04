<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRandevuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('randevu', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->default(0);                     //user kayıt eden id?
            $table->integer('staff')->default('0');                     //personel atandımı ? 0 hayır
            $table->integer('branch');                                  //şube
            $table->string('name_surname',200);                         //adı soyadı
            $table->string('phone',20)->nullable();                     //telefon
            $table->tinyInteger('number_people')->default('0');         //kişi sayısı
            $table->dateTime('start_date')->nullable();                 //randevu tarihi başlangıç
            $table->dateTime('end_date')->nullable();                   //randevu tarihi bitiş
            $table->dateTime('transaction_date')->nullable();           //işlem yapılma tarihi
            $table->text('action_to_be_taken',5000);                    //yapılacak işlem
            $table->text('transaction',10000);                          //yapılan işlemler
            $table->float('amount')->default('0.00');                   //tutar
            $table->float('discount')->default('0.00');                 //yapılan indirim
            $table->float('total')->default('0.00');                    //toplam tutar
            $table->tinyInteger('continuous_customer')->default('0');   //sürekli müşterimi 1 evet 0 hayır
            $table->tinyInteger('invoice')->default('1');               //faturalandırma 1 evet 0 hayır
            $table->string('number_of_appointments',20)->nullable();    //randevu takip numarası
            $table->string('color',20)->nullable();                     //randevu rengi
            $table->tinyInteger('completion')->default(0);              //randevu tamamlanma
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
		Schema::drop('randevu');
	}

}
