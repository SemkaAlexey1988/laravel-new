<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id'    => '1',
                'name'  => 'Site 1',
                'link'  => 'https://site.com',
                'date'  => '01.01.2022',
                'color' => '#000000',
                'code'  => '200',
            ],
            [
                'id' => '2',
                'name' => 'Site 2',
                'link' => 'https://site2.com',
                'date' => '02.01.2022',
                'color' => '#000000',
                'code'  => '200',
            ],
            [
                'id' => '3',
                'name' => 'Site 3',
                'link' => 'https://site3.com',
                'date' => '03.01.2022',
                'color' => '#000000',
                'code'  => '200',
            ],
            [
                'id' => '4',
                'name' => 'Site 4',
                'link' => 'https://site4.com',
                'date' => '04.01.2022',
                'color' => '#000000',
                'code'  => '200',
            ],
            [
                'id' => '5',
                'name' => 'Site 5',
                'link' => 'https://site5.com',
                'date' => '05.01.2022',
                'color' => '#000000',
                'code'  => '200',
            ],
        ];

        DB::table('page')->insert($data);
    }
}
