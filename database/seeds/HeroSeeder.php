<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use League\Csv\Reader;
use League\Csv\Statement;
use App\Hero;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (Schema::hasTable('heroes') == false) {
            $this->command->warn("Seeding heroes failed; table 'heroes' doesn't exist in database...");
            return;
        }

        $csv = Reader::createFromPath('database/csv/hero.csv', 'r');
        $csv->setDelimiter(',');
        $csv->setEnclosure('"');
        $csv->setHeaderOffset(0); //set the CSV header offset

        $stmt = (new Statement())->offset(0);
        $records = $stmt->process($csv);

        foreach ($records as $record) {
            Hero::create([
                'id' => $record["id"],
                'level' => $record["level"],
                'health' => $record["health"],
                'stamina' => $record["stamina"],
                'intelligence' => $record["intelligence"],
                'charisma' => $record["charisma"],
                'resilience' => $record["resilience"],
                'person' => $record["person"],
            ]);
        }
    }
}
