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
            'picture' => 'storage/images/Hero-Icons/Icon-reinhardt.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 1,
            'name' => 'Zarya',
            'picture' => 'storage/images/Hero-Icons/Icon-zarya.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 1,
            'name' => 'Dva',
            'picture' => 'storage/images/Hero-Icons/Icon-dva.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 1,
            'name' => 'Roadhog',
            'picture' => 'storage/images/Hero-Icons/Icon-roadhog.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 1,
            'name' => 'Winston',
            'picture' => 'storage/images/Hero-Icons/Icon-winston.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 1,
            'name' => 'Orisa',
            'picture' => 'storage/images/Hero-Icons/Icon-orisa.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 1,
            'name' => 'Wrecking_Ball',
            'picture' => 'storage/images/Hero-Icons/Icon-wrecking_ball.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Genji',
            'picture' => 'storage/images/Hero-Icons/Icon-genji.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Mccree',
            'picture' => 'storage/images/Hero-Icons/Icon-mccree.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Pharah',
            'picture' => 'storage/images/Hero-Icons/Icon-pharah.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Reaper',
            'picture' => 'storage/images/Hero-Icons/Icon-reaper.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Soldier76',
            'picture' => 'storage/images/Hero-Icons/Icon-soldier76.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Sombra',
            'picture' => 'storage/images/Hero-Icons/Icon-sombra.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Tracer',
            'picture' => 'storage/images/Hero-Icons/Icon-tracer.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Bastion',
            'picture' => 'storage/images/Hero-Icons/Icon-bastion.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Hanzo',
            'picture' => 'storage/images/Hero-Icons/Icon-Hanzo.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Junkrat',
            'picture' => 'storage/images/Hero-Icons/Icon-junkrat.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Widowmaker',
            'picture' => 'storage/images/Hero-Icons/Icon-widowmaker.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Doomfist',
            'picture' => 'storage/images/Hero-Icons/Icon-doomfist.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);


        DB::table('heroes')->insert([
            'type' => 2,
            'name' => 'Mei',
            'picture' => 'storage/images/Hero-Icons/Icon-mei.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 3,
            'name' => 'Torbjorn',
            'picture' => 'storage/images/Hero-Icons/Icon-torbjorn.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 3,
            'name' => 'Ana',
            'picture' => 'storage/images/Hero-Icons/Icon-ana.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 3,
            'name' => 'Mercy',
            'picture' => 'storage/images/Hero-Icons/Icon-mercy.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 3,
            'name' => 'Lucio',
            'picture' => 'storage/images/Hero-Icons/Icon-lucio.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 3,
            'name' => 'Symmetra',
            'picture' => 'storage/images/Hero-Icons/Icon-symmetra.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 3,
            'name' => 'Zenyatta',
            'picture' => 'storage/images/Hero-Icons/Icon-zenyatta.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 3,
            'name' => 'Moira',
            'picture' => 'storage/images/Hero-Icons/Icon-moira.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('heroes')->insert([
            'type' => 3,
            'name' => 'Brigitte',
            'picture' => 'storage/images/Hero-Icons/Icon-brigitte.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
