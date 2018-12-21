<?php

use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seasons')->insert([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'picture' => 'storage/images/Season-Icons/Icon-Season1.png',
            'seasonindex' => '1',
            'active' => 0
        ]);

        DB::table('seasons')->insert([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'picture' => 'storage/images/Season-Icons/Icon-Season2.png',
            'seasonindex' => '2',
            'active' => 0
        ]);

        DB::table('seasons')->insert([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'picture' => 'storage/images/Season-Icons/Icon-Season3.png',
            'seasonindex' => '3',
            'active' => 0
        ]);

        DB::table('seasons')->insert([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'picture' => 'storage/images/Season-Icons/Icon-Season4.png',
            'seasonindex' => '4',
            'active' => 0
        ]);

        DB::table('seasons')->insert([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'picture' => 'storage/images/Season-Icons/Icon-Season5.png',
            'seasonindex' => '5',
            'active' => 0
        ]);

        DB::table('seasons')->insert([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'picture' => 'storage/images/Season-Icons/Icon-Season6.png',
            'seasonindex' => '6',
            'active' => 0
        ]);

        DB::table('seasons')->insert([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'picture' => 'storage/images/Season-Icons/Icon-Season7.png',
            'seasonindex' => '7',
            'active' => 0
        ]);

        DB::table('seasons')->insert([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'picture' => 'storage/images/Season-Icons/Icon-Season8.png',
            'seasonindex' => '8',
            'active' => 0
        ]);

        DB::table('seasons')->insert([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'picture' => 'storage/images/Season-Icons/Icon-Season9.png',
            'seasonindex' => '9',
            'active' => 0
        ]);

        DB::table('seasons')->insert([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'picture' => 'storage/images/Season-Icons/Icon-Season10.png',
            'seasonindex' => '10',
            'active' => 0
        ]);

        DB::table('seasons')->insert([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'picture' => 'storage/images/Season-Icons/Icon-Season11.png',
            'seasonindex' => '11',
            'active' => 0
        ]);

        DB::table('seasons')->insert([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'picture' => 'storage/images/Season-Icons/Icon-Season12.png',
            'seasonindex' => '12',
            'active' => 0
        ]);

        DB::table('seasons')->insert([
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'picture' => 'storage/images/Season-Icons/Icon-Season13.png',
            'seasonindex' => '13',
            'active' => 1
        ]);
    }
}
