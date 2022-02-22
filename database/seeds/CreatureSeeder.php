<?php

use App\Creature;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use League\Csv\Reader;
use League\Csv\Statement;

class CreatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (Schema::hasTable('creatures') == false) {
        $this->command->warn("Seeding creatures failed; table 'creatures' doesn't exist in database...");
        return;
    }

        $csv = Reader::createFromPath('database/csv/creature.csv', 'r');
        $csv->setDelimiter(',');
        $csv->setEnclosure('"');
        $csv->setHeaderOffset(0); //set the CSV header offset

        $stmt = (new Statement())->offset(0);
        $records = $stmt->process($csv);

        foreach ($records as $record) {
            Creature::create([
                "id" => $record["id"],
                "name" => $record["name"],
                "attack" => $record["attack"],
                "defense" => $record["defense"],
                "max_health" => $record["max_health"],
                "health" => $record["health"],
                "gold" => $record["gold"],
                "experience" => $record["experience"],
                "spawn" => $record["spawn"],
            ]);
        }
    }
}
