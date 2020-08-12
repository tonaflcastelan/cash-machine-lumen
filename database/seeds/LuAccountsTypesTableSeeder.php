<?php

use App\LuAccountType;
use Illuminate\Database\Seeder;

class LuAccountsTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LuAccountType::create([
            'name' => 'Débito',
        ]);

        LuAccountType::create([
            'name' => 'Crédito',
        ]);
    }
}
