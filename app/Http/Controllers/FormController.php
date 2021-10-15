<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Haversini\Haversini;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class FormController extends Controller
{

    public function index()
    {
        return view('index');
    }


    public function search(Request $request)
    {
        $latitudeUser = (float)$request->get('latitude');
        $longitudeUser = (float)$request->get('longitude');

        $response = Cache::remember('locations', 7200, function(){
           return Http::get('https://buzzvel-interviews.s3.eu-west-1.amazonaws.com/hotels.json')->json();
        });

        $infos = $response['message'];

        foreach($infos as &$info)
        {
            $info[4] = Haversini::calculate(
                $latitudeUser,
                $longitudeUser,
                (float)$info[1],
                (float)$info[2],
                'km' // Output length unit
            );
        }

        $infos = collect($infos);

        $infosOrd = $infos->sortBy(4)->take(3);

        return view('result', compact('infosOrd'));

    }


}
