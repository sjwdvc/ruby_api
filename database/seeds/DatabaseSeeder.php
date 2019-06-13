<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['people', 'animals', 'armors', 'cities', 'creatures', 'heroes', 'npcs', 'quests', 'regions'];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        foreach($this->toTruncate as $table) {
            DB::table($table)->truncate();
            $this->command->info("Truncated table: " . $table);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $this->call(PersonSeeder::class);
        $this->call(AnimalSeeder::class);
        $this->call(ArmorSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CreatureSeeder::class);
        $this->call(HeroSeeder::class);
        $this->call(NpcSeeder::class);
        $this->call(QuestSeeder::class);
        $this->call(RegionSeeder::class);

        Model::reguard();
    }
}
