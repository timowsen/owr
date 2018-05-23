<?php

use Illuminate\Database\Seeder;

class MapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maps')->insert([
            'type' => 1,
            'name' => 'Hanamura',
            'picture' => '350px-Hanamura_concept.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 1,
            'name' => 'Temple-of-Anubis',
            'picture' => '350px-Anubis_concept.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 1,
            'name' => 'Volskaya-Industries',
            'picture' => '350px-Volskaya_Industries.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 2,
            'name' => 'Dorado',
            'picture' => '350px-Dorado-streets2.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 2,
            'name' => 'Route-66',
            'picture' => '350px-Route_66.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 2,
            'name' => 'Watchpoint-Gibraltar',
            'picture' => '350px-Gibraltar.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 3,
            'name' => 'Hollywood',
            'picture' => '350px-Hollywood-set.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 3,
            'name' => 'Kings-Row',
            'picture' => '350px-King\'s_Row_concept.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 3,
            'name' => 'Numbani',
            'picture' => '350px-Numbani3.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 3,
            'name' => 'Eichenwalde',
            'picture' => '350px-Eichenwalde.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 3,
            'name' => 'Junkertown',
            'picture' => '350px-Junkertown.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 3,
            'name' => 'Horizon-Lunar-Colony',
            'picture' => '350px-Horizon_Lunar_Colony2.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 3,
            'name' => 'Blizzard-World',
            'picture' => '350px-Blizzard_World.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 4,
            'name' => 'Ilios',
            'picture' => '350px-Ilios.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        
        DB::table('maps')->insert([
            'type' => 4,
            'name' => 'Lijiang-Tower',
            'picture' => '350px-Lijiang_Tower_loading_screen.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 4,
            'name' => 'Nepal',
            'picture' => '350px-Nepal_loading_screen.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        

        DB::table('maps')->insert([
            'type' => 4,
            'name' => 'Oasis',
            'picture' => '350px-Oasis.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
