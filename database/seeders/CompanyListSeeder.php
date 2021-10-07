<?php

namespace Database\Seeders;

use App\Models\Search\CompanyList;
use Illuminate\Database\Seeder;

class CompanyListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyList::truncate();
        $csvFile = fopen(base_path("database/data/companyList.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {

                CompanyList::create([

                    "company_name" => $data['0'],

                ]);

            }

            $firstline = false;

        }



        fclose($csvFile);
    }
}
