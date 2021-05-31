<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 8 ; $i++) { 
            Order::create([
                'code' => "FAC-".\Str::random(6),
                'user_id' => 1,
                'amount' =>  20000,
                'nom' => 'guy',
                'prenom' => 'roland',
                'phone1' => '68357397',
                'phone2' => '68357397',
                'region' => 'lagune',
                'ville' => 'abidjan',
                'country' => 'cote d\'ivoire',
                'adresse' => 'fgrgg'
            ]);
        }
    }
}
