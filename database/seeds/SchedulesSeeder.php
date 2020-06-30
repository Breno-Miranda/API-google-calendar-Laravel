// AgendasSeed.php
<?php

use Illuminate\Database\Seeder;

class AgendasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\agenda::create([
            'titulo' => str_random(10),
            'description' => str_random(50),
        ]);
    }
}