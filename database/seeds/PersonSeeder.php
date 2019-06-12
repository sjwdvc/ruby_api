<?php

use App\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use League\Csv\Reader;
use League\Csv\Statement;


class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (Schema::hasTable('people') == false) {
            $this->command->warn("Seeding people failed; table 'people' doesn't exist in database...");
            return;
        }

        $csv = Reader::createFromPath('database/csv/person.csv', 'r');
        $csv->setDelimiter(',');
        $csv->setEnclosure('"');
        $csv->setHeaderOffset(0); //set the CSV header offset

        $stmt = (new Statement())->offset(0);
        $records = $stmt->process($csv);

        foreach ($records as $record) {
            Person::create([
                'id' => $record["id"],
                'name' => $record["name"],
                'sex' => $record["sex"],
                'max_health' => $record["max_health"],
                'attack' => $record["attack"],
                'defense' => $record["defense"],
                'agility' => $record["agility"],
                'experience' => $record["experience"],
                'gold' => $record["gold"],
                'weapon' => $record["weapon"],
                'armor' => $record["armor"],
            ]);
        }

    }
}
