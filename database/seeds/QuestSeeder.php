<?php

use App\Quest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use League\Csv\Reader;
use League\Csv\Statement;

class QuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (Schema::hasTable('quests') == false) {
            $this->command->warn("Seeding quests failed; table 'quests' doesn't exist in database...");
            return;
        }

        $csv = Reader::createFromPath('database/csv/quest.csv', 'r');
        $csv->setDelimiter(',');
        $csv->setEnclosure('"');
        $csv->setHeaderOffset(0); //set the CSV header offset

        $stmt = (new Statement())->offset(0);
        $records = $stmt->process($csv);

        foreach ($records as $record) {
            Quest::create([
                'id' => $record["id"],
                'title' => $record["title"],
                'experience' => $record["experience"],
                'gold' => $record["gold"],
                'publisher' => $record["publisher"],
                'holder' => $record["holder"],
            ]);
        }
    }
}
