<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThailandAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->command->info('Start seeding thailand address...');

        $table = 'provinces';
        $fileName = database_path() . '/csv/thailand_provinces.csv';
        $this->seed($table, $fileName);

        $table = 'districts';
        $fileName = database_path() . '/csv/thailand_districts.csv';
        $this->seed($table, $fileName);

        $table = 'subdistricts';
        $fileName = database_path() . '/csv/thailand_sub_districts.csv';
        $this->seed($table, $fileName);

        $this->command->info('Thailand address table seeded!');
    }

    private function seed($table, $filename)
    {
        DB::table($table)->delete();
        $seedData = $this->seedFromCsv($filename, ',');
        DB::table($table)->insert($seedData);
        $this->command->warn("Insert table '{$table}' completed...");
    }

    private function seedFromCsv($fileName, $delimitor = ",")
    {
        if (!file_exists($fileName) || !is_readable($fileName)) {
            return false;
        }

        $header = null;
        $data = array();

        if (($handle = fopen($fileName, 'r')) === false) {
            return array();
        }

        while (($row = fgetcsv($handle, 1000, $delimitor)) !== false) {
            if (!$header) {
                $header = $row;
            } else {
                $data[] = array_combine($header, $row);
            }
        }
        fclose($handle);

        return $data;
    }
}
