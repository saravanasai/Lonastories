<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{

    public $productlist=array('Personal Loan','Home Loan','Business Loan','Mortgages','Education Loan');
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<count($this->productlist);$i++)
        DB::table('products')->insert([
            'productname' => $this->productlist[$i],

        ]);
    }
}
