<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModuleSeeder extends Seeder
{

    public function run(): void
    {
        $modules = [
            'Doctors',
            'User',
        ];
        $links = [
            'doctors',
            'users',
        ];

        foreach ($modules as $key => $module) {
            Module::create([
                'name' => $module,
                'link' => $links[$key],
            ]);
        }
    }
}
