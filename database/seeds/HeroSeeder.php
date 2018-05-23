<?php

use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('heroes')->insert([
            'type' => 1,
            'name' => 'Reinhardt',
            'picture' => 'Icon-reinhardt.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 1,
            'name' => 'Zarya',
            'picture' => 'Icon-zarya.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 1,
            'name' => 'Dva',
            'picture' => 'Icon-dva.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 1,
            'name' => 'Roadhog',
            'picture' => 'Icon-roadhog.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 1,
            'name' => 'Winston',
            'picture' => 'Icon-winston.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 1,
            'name' => 'Orisa',
            'picture' => 'Icon-orisa.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Genji',
            'picture' => 'Icon-genji.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Mccree',
            'picture' => 'Icon-mccree.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Pharah',
            'picture' => 'Icon-pharah.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Reaper',
            'picture' => 'Icon-reaper.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Soldier 76',
            'picture' => 'Icon-soldier76.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Sombra',
            'picture' => 'Icon-sombra.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Tracer',
            'picture' => 'Icon-tracer.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Bastion',
            'picture' => 'Icon-bastion.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Hanzo',
            'picture' => 'Icon-Hanzo.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Junkrat',
            'picture' => 'Icon-junkrat.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Widowmaker',
            'picture' => 'Icon-widowmaker.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Doomfist',
            'picture' => 'Icon-doomfist.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);


        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Mei',
            'picture' => 'Icon-mei.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 3,
            'name' => 'Torbjoern',
            'picture' => 'Icon-torbjorn.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 3,
            'name' => 'Ana',
            'picture' => 'Icon-ana.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 3,
            'name' => 'Mercy',
            'picture' => 'Icon-mercy.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 3,
            'name' => 'Lucio',
            'picture' => 'Icon-lucio.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 3,
            'name' => 'Symmetra',
            'picture' => 'Icon-symmetra.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 3,
            'name' => 'Zenyatta',
            'picture' => 'Icon-zenyatta.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        
        DB::table('heroes')->insert([
            'type' => 3,
            'name' => 'Moira',
            'picture' => 'Icon-moira.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        
        DB::table('heroes')->insert([
            'type' => 3,
            'name' => 'Brigitte',
            'picture' => 'Icon-brigitte.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
