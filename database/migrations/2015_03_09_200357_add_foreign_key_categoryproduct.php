<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyCategoryproduct extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('categories_products', function(Blueprint $table)
		{
			$table->integer('product_id')->change()->unsigned();
			$table->foreign('product_id')->references('id')
			->on('products')
			->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('categories_products', function(Blueprint $table)
		{
			$table->dropForeign('categories_products_product_id_foreign');
		});
	}

}
