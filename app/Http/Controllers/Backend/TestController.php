<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    /*
        Get API Data
    */
    public function getData()
    {
        $response = Http::get('https://fantasy.premierleague.com/api/bootstrap-static/');
        return $response['elements'];
    }
}
