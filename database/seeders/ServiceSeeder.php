<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::updateOrCreate(['name' => 'Web Development']);
        Service::updateOrCreate(['name' => 'UI/UX']);
    }
}
