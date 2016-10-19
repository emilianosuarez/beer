<?php

namespace App\Http\Controllers;

use App\Bar;
use Illuminate\Http\Request;

class BarController extends Controller
{
    /* TODO: move this method to another place where other controllers
     * could reused it.
    */
    public function showList(Request $request)
    {
        $tags = ($request->tags ? $request->tags : array());
        $searchText = ($request->search ? $request->search : '');

        if (count($tags) || strlen($searchText)) {
            $barResults = Bar::whereIn('tags', $tags)->orWhere(function($query)
                    {
                        $query->where('name', 'like', '%{$searchText}%')
                              ->where('description',  'like', '%{$searchText}%%');
                    })
                    ->get();
        }
        else {
            $barResults = Bar::all();
        }

        $bars = $barResults->all();

        return view('bars.list', [ 'bars' => $bars ]);
    }

    public function showBar($slug)
    {
        $bar = Bar::where('slug', $slug)->first();
        return view('bars.detail', [ 'bar' => $bar ]);
    }

    public function getNearby(Request $request) {

        $lat = floatval($request->lat ? $request->lat : 0);
        $lng = floatval($request->lng ? $request->lng : 0);
        $radius = floatval($request->radius ? $request->radius : 1000);
/*
        $lat = -34.5769758;
        $lng = -58.4367746;
*/
        $query = array(
                    'location' => array(
                        '$nearSphere' => array(
                            '$geometry' => array(
                                'type' => "Point",
                                'coordinates' => array($lat, $lng)
                            ),
                            '$minDistance' => 0,
                            '$maxDistance' => $radius
                        )
                    )
                );

        $results = Bar::where($query)->get()->all();
        return $results;
    }
}
