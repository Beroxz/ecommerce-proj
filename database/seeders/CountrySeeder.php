<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usaStates = [
            "AL" => 'Alabama',
            "AK" => 'Alaska',
            "AZ" => 'Arizona',
            "AR" => 'Arkansas',
            "CA" => 'California',
        ];

        $countries = [
            ['code' => 'geo', 'name' => 'Georgia', 'states' => null],
            ['code' => 'ind', 'name' => 'India', 'states' => null],
            ['code' => 'usa', 'name' => 'United States of America', 'states' => json_encode($usaStates)],
            ['code' => 'ger', 'name' => 'Germany', 'states' => null],
            ['code' => 'tha', 'name' => 'Thailand', 'states' => null],
            ['code' => 'chn', 'name' => 'China', 'states' => null],
            ['code' => 'lao', 'name' => 'Laos', 'states' => null],
            ['code' => 'vnm', 'name' => 'Vietnam', 'states' => null],
        ];

        Country::insert($countries);
    }
}
