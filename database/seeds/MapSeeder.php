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
            'picture' => 'storage/images/Map-Icons/350px-Hanamura_concept.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 1,
            'name' => 'Temple-of-Anubis',
            'picture' => 'storage/images/Map-Icons/350px-Anubis_concept.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 1,
            'name' => 'Volskaya-Industries',
            'picture' => 'storage/images/Map-Icons/350px-Volskaya_Industries.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 2,
            'name' => 'Dorado',
            'picture' => 'storage/images/Map-Icons/350px-Dorado-streets2.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 2,
            'name' => 'Route-66',
            'picture' => 'storage/images/Map-Icons/350px-Route_66.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 2,
            'name' => 'Watchpoint-Gibraltar',
            'picture' => 'storage/images/Map-Icons/350px-Gibraltar.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 2,
            'name' => 'Rialto',
            'picture' => 'storage/images/Map-Icons/350px-Rialto.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 3,
            'name' => 'Hollywood',
            'picture' => 'storage/images/Map-Icons/350px-Hollywood-set.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 3,
            'name' => 'Kings-Row',
            'picture' => 'storage/images/Map-Icons/350px-Kings_Row_concept.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 3,
            'name' => 'Numbani',
            'picture' => 'storage/images/Map-Icons/350px-Numbani3.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 3,
            'name' => 'Eichenwalde',
            'picture' => 'storage/images/Map-Icons/350px-Eichenwalde.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 3,
            'name' => 'Junkertown',
            'picture' => 'storage/images/Map-Icons/350px-Junkertown.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 3,
            'name' => 'Horizon-Lunar-Colony',
            'picture' => 'storage/images/Map-Icons/350px-Horizon_Lunar_Colony2.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 3,
            'name' => 'Blizzard-World',
            'picture' => 'storage/images/Map-Icons/350px-Blizzard_World.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 4,
            'name' => 'Ilios',
            'picture' => 'storage/images/Map-Icons/350px-Ilios.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        
        DB::table('maps')->insert([
            'type' => 4,
            'name' => 'Lijiang-Tower',
            'picture' => 'storage/images/Map-Icons/350px-Lijiang_Tower_loading_screen.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('maps')->insert([
            'type' => 4,
            'name' => 'Nepal',
            'picture' => 'storage/images/Map-Icons/350px-Nepal_loading_screen.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        

        DB::table('maps')->insert([
            'type' => 4,
            'name' => 'Oasis',
            'picture' => 'storage/images/Map-Icons/350px-Oasis.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
