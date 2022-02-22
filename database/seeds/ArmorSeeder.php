<?php

use App\Armor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use League\Csv\Reader;
use League\Csv\Statement;

class ArmorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (Schema::hasTable('armors') == false) {
            $this->command->warn("Seeding armors failed; table 'armors' doesn't exist in database...");
            return;
        }

        $csv = Reader::createFromPath('database/csv/armor.csv', 'r');
        $csv->setDelimiter(',');
        $csv->setEnclosure('"');
        $csv->setHeaderOffset(0); //set the CSV header offset

        $stmt = (new Statement())->offset(0);
        $records = $stmt->process($csv);

        foreach ($records as $record) {
            Armor::create([
                "id" => $record["id"],
                "name" => $record["name"],
                "price" => $record["price"],
                "defense" => $record["defense"],
            ]);
        }
    }
}
