<?php

use App\LuTransactionType;
use Illuminate\Database\Seeder;

class LuTransactionsTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LuTransactionType::create([
            'name' => 'Pago',
        ]);

        LuTransactionType::create([
            'name' => 'Retiro',
        ]);
    }
}
