<?php
//php artisan db:seed --class=NelsonEAX\Ymap\database\seeds\YmapSeeder
namespace NelsonEAX\Ymap\database\seeds;
use Illuminate\Database\Seeder;

class YmapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
    }
}
