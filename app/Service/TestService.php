<?php

namespace App\Service;

use Illuminate\Http\Request;

class TestService{
    public function handle(Request $request)
    {
        dd($request->all());
    }
}




?>
