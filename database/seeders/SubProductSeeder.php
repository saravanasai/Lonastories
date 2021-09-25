<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubProductSeeder extends Seeder
{
    public $personalLoan=array('New Loan',
                               'Top-Up Loan',
                               'Top-Up Parallel',
                               'Pure BT-Single',
                               'Pure BT-Multiple',
                               'Single BT Plus Top Up',
                               'Multiple BT Plus Top Up',
                               'CC BT',
                               'Loan Consolidation'
                            );

    public $HomeLoan=array( 'New Loan',
                            'Top-Up Loan',
                            'Pure BT',
                            'BT Plus Top Up',
                            'Loan Consolidation'
                            );

    public $BusinessLoan=array( 'New Loan',
                                'Top-Up Loan',
                                'Top-Up Parallel',
                                'Pure BT-Single',
                                'Pure BT-Multiple',
                                'Single BT Plus Top Up',
                                'Multiple BT Plus Top Up',
                                'CC BT',
                                'Loan Consolidation'
                                );


    public $Mortgages=array('New Loan',
                            'Top-Up Loan',
                            'Pure BT',
                            'BT Plus Top Up',
                            'Loan Consolidation'
                            );


    public $EducationLoan=array('New Loan-India',
                                'New Loan - Abroad'

                            );

                            //IDS OF PRODUCT
                            // 1.PERSONAL LOAN
                            // 2.HOME LOAN
                            // 3.Business Loan
                            // 4.Mortgages
                            // 5.Education Loan
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //LOOP FOR PERSONAL LOAN
        for($i=0;$i<count($this->personalLoan);$i++)
        {

             DB::table('subproducts')->insert([
            'product_id'=>1,
            'subproductname' => $this->personalLoan[$i],

        ]);

        }

         //LOOP FOR HOME LOAN
         for($i=0;$i<count($this->HomeLoan);$i++)
          {
            DB::table('subproducts')->insert([
            'product_id'=>2,
            'subproductname' => $this->HomeLoan[$i],

            ]);
        }

           //LOOP FOR business LOAN
           for($i=0;$i<count($this->BusinessLoan);$i++)
           {
             DB::table('subproducts')->insert([
             'product_id'=>3,
             'subproductname' => $this->BusinessLoan[$i],

             ]);
         }
          //LOOP FOR Mortgages LOAN
          for($i=0;$i<count($this->Mortgages);$i++)
          {
            DB::table('subproducts')->insert([
            'product_id'=>4,
            'subproductname' => $this->Mortgages[$i],

            ]);
        }
         //LOOP FOR Education Loan
         for($i=0;$i<count($this->EducationLoan);$i++)
         {
           DB::table('subproducts')->insert([
           'product_id'=>5,
           'subproductname' => $this->EducationLoan[$i],

           ]);
       }
    }
}
