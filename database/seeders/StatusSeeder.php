<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{

    public $statusCode = array (
        "New Enquiry",
        "Follow Up-RNR",
        "Follow Up-Call Back",
        "Follow Up-Hot",
        "Follow Up-Warm",
        "Follow Up-Cold",
        "Lead Dropped",
        "Follow Up-Later",
        "Proposal Completed",
        "Documents Collected",
        "Logged In",
        "FTNR",
        "Under Process",
        "Process Hold",
        "Re Work",
        "Re Login",
        "Approved",
        "Disbursed",
        "Declined",
        "Cancelled"
      );
      public $statusRemark = array (
            "Default Status for all enquiry",
            "client not responsing to calls",
            "client asked for a call back",
            "For conversions expected within the week",
            "For conversions expected within the calender month",
            "For conversions expected within 2 months",
            "Non Qualified leads",
            "For conversions expected after 2 months",
            "Waiting For Accept Proposal",
            "Once the file collected",
            "Once the file is logged in",
            "If the application is not accepted by the banker for any query",
            "Accepted and under verification",
            "additional requirement raised and file on hold",
            "File rejected and under re work",
            "file rejected by the first bank and planned to login the file in a different bank",
            "file approved",
            "Loan disbursed",
            "file rejected",
            "customer cancelled"
      );
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<count($this->statusCode);$i++)
        {
            for($j=$i;$j<=$i;$j++)
            {
            DB::table('statuses')->insert([
                'status_code' => $this->statusCode[$i],
                'status_remark' => $this->statusRemark[$j],
            ]);
            }
        }




    }
}
