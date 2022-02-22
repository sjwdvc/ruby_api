<?php

use App\Npc;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use League\Csv\Reader;
use League\Csv\Statement;

class NpcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (Schema::hasTable('npcs') == false) {
            $this->command->warn("Seeding npcs failed; table 'npcs' doesn't exist in database...");
            return;
        }

        $csv = Reader::createFromPath('database/csv/npc.csv', 'r');
        $csv->setDelimiter(',');
        $csv->setEnclosure('"');
        $csv->setHeaderOffset(0); //set the CSV header offset

        $stmt = (new Statement())->offset(0);
        $records = $stmt->process($csv);

        foreach ($records as $record) {
            Npc::create([
                'id' => $record["id"],
                'health' => $record["health"],
                'profession' => $record["profession"],
                'city' => $record["city"],
                'person' => $record["person"]
            ]);
        }
    }
}
