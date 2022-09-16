<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Country::truncate();

        $csvFile = fopen(base_path("database/data/countries.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Country::firstOrCreate([
                    "name" => $data['0'],
                    "code" => $data['1']
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);

        $csvFile = fopen(base_path("database/data/timezone.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Country::where('code', $data['1'])->update([
                    'timezone' => $data[0],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
        // \App\Models\User::factory(10)->create();
    }
}
