<?php

namespace App\Http\Controllers\Backend;

use stdClass;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\PlayerResource;

class PlayerController extends Controller
{

    /**
     * Get Elements / Players Data from API
     */

    public function getPlayers($code = null)
    {
        $response = Http::get('https://fantasy.premierleague.com/api/bootstrap-static/');
        if($code){
            $data = new stdClass();
            foreach ($response['elements'] as $value) {
                if($value['code'] == $code){
                   $data = $value;
                }
            }
            return $this->getPlayerDetails($data);
        }else{
            return PlayerResource::collection($response['elements']);
        }
    }

    public function getPlayerDetails($data)
    {
        $photo_name = 'p' . $data['code'] . '.png';
        $photo_large = 'https://resources.premierleague.com/premierleague/photos/players/250x250/' . $photo_name;
        $data['photo_large'] = $photo_large;
        return new PlayerResource($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.players.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = $this->getPlayers($id);
        return view('backend.players.show',compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ssd()
    {
        $players = $this->getPlayers();
        return Datatables::of($players)
            ->editColumn('photo_small', function ($player) {
                $img = '<img class="img-fluid" width="70px" src="' . $player['photo_small'] . '"/>';
                return $img;
            })
            ->addIndexColumn()
            ->addColumn('action', function ($player) {
                $html = '<a type="button" class="btn btn-xs waves-effect waves-light btn-primary mr-1" href="'.route('backend.players.show' , $player['code']).'">View</a>';
                return $html;
            })
            ->rawColumns(['photo_small', 'action'])
            ->make(true);
    }
}
