<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableTransactionAddAndModifiedColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('transactions', 'code')) {
            Schema::table('transactions', function (Blueprint $table) {
                $table->string('code')->change();
                $table->float('grandtotal')->after('user_id');
                $table->text('address')->after('user_id');
                $table->string('phone')->after('user_id');
                $table->string('email')->after('user_id');
                $table->string('name')->after('user_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        if (Schema::hasColumn('transactions', 'code')) {
            Schema::table('transactions', function (Blueprint $table) {
                $table->integer('code')->change();
                $table->dropColumn('name');
                $table->dropColumn('email');
                $table->dropColumn('phone');
                $table->dropColumn('address');
                $table->dropColumn('grandtotal');
            });
        }
    }
}
