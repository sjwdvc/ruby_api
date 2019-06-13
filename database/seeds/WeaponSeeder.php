<?php

use App\Weapon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use League\Csv\Reader;
use League\Csv\Statement;

class WeaponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (Schema::hasTable('weapons') == false) {
            $this->command->warn("Seeding weapons failed; table 'weapons' doesn't exist in database...");
            return;
        }

        $csv = Reader::createFromPath('database/csv/weapon.csv', 'r');
        $csv->setDelimiter(',');
        $csv->setEnclosure('"');
        $csv->setHeaderOffset(0); //set the CSV header offset

        $stmt = (new Statement())->offset(0);
        $records = $stmt->process($csv);

        foreach ($records as $record) {
            Weapon::create([
                'id' => $record["id"],
                'name' => $record["name"],
                'price' => $record["price"],
                'attack' => $record["attack"],
            ]);
        }
    }
}
