<?php

use App\Animal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use League\Csv\Reader;
use League\Csv\Statement;

class AnimalSeeder extends Seeder
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

        $csv = Reader::createFromPath('database/csv/animal.csv', 'r');
        $csv->setDelimiter(',');
        $csv->setEnclosure('"');
        $csv->setHeaderOffset(0); //set the CSV header offset

        $stmt = (new Statement())->offset(0);
        $records = $stmt->process($csv);

        foreach ($records as $record) {
            Animal::create([
                'id' => $record["id"],
                'type' => $record["type"],
                'speed' => $record["speed"],
                'defense' => $record["defense"],
                'loyalty' => $record["loyalty"],
                'owner' => $record["owner"],
            ]);
        }
    }
}
