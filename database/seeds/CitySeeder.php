<?php

use App\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use League\Csv\Reader;
use League\Csv\Statement;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (Schema::hasTable('cities') == false) {
            $this->command->warn("Seeding cities failed; table 'cities' doesn't exist in database...");
            return;
        }

        $csv = Reader::createFromPath('database/csv/city.csv', 'r');
        $csv->setDelimiter(',');
        $csv->setEnclosure('"');
        $csv->setHeaderOffset(0); //set the CSV header offset

        $stmt = (new Statement())->offset(0);
        $records = $stmt->process($csv);

        foreach ($records as $record) {
            City::create([
                "id" => $record["id"],
                "name" => $record["name"],
                "region" => $record["region"],
            ]);
        }
    }
}
