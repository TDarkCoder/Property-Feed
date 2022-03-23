<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        $file = file_get_contents(base_path('public/data/property-data.csv'));

        if (!$file) {
            return;
        }

        [$properties, $lines] = [
            [],
            explode(PHP_EOL, $file),
        ];

        foreach ($lines as $index => $line) {
            if (!$index) {
                $headers = str_getcsv($line);
                continue;
            }

            $property = str_getcsv($line);

            foreach ($property as $key => $value) {
                if (!isset($properties[$index - 1])) {
                    $properties[$index - 1]['uuid'] = str()->uuid();
                }

                $properties[$index - 1][strtolower($headers[$key])] = $value;
            }
        }

        DB::table('properties')->insert($properties);
    }
}
