<?php

use App\Region;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use League\Csv\Reader;
use League\Csv\Statement;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (Schema::hasTable('regions') == false) {
            $this->command->warn("Seeding regions failed; table 'regions' doesn't exist in database...");
            return;
        }

        $csv = Reader::createFromPath('database/csv/region.csv', 'r');
        $csv->setDelimiter(',');
        $csv->setEnclosure('"');
        $csv->setHeaderOffset(0); //set the CSV header offset

        $stmt = (new Statement())->offset(0);
        $records = $stmt->process($csv);

        foreach ($records as $record) {
            Region::create([
                'id' => $record["id"],
                'name' => $record["name"],
                'holder' => $record["holder"],
            ]);
        }
    }
}
