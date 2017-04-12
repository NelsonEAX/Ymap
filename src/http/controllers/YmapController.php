<?php

namespace NelsonEAX\Ymap\http\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Carbon\Carbon;
use NelsonEAX\Ymap\models\Place;

 
class YmapController extends Controller
{
 
    public function index($timezone = NULL)
    {
        $current_time = ($timezone)
            ? Carbon::now(str_replace('-', '/', $timezone))
            : Carbon::now();        
        //echo $time->toDateTimeString();
        
        $places = Place::where('population', '>', 10000)
                ->where('population', '<', 1000000)
                ->get();;
        //echo $places;
        return view('ymapviews::ymain', compact('places', 'current_time'));
    }
 
}
