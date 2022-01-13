<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use Illuminate\Support\Facades\Http;
use Yajra\Datatables\Datatables;

class ClubController extends Controller
{

    /**
     * Get Teams / Clubs Data from API
     */

    public function getTeams()
    {
        $response = Http::get('https://fantasy.premierleague.com/api/bootstrap-static/');
        return TeamResource::collection($response['teams']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.clubs.index');
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
        //
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
        $clubs = $this->getTeams();
        return Datatables::of($clubs)
            ->editColumn('logo_small', function ($club) {
                $img = '<img class="img-fluid" width="70px" src="' . $club['logo_small'] . '"/>';
                return $img;
            })
            ->addIndexColumn()
            ->addColumn('action', function ($club) {
                $html = '<a type="button" class="btn btn-xs waves-effect waves-light btn-primary mr-1" href="#">View</a>';
                return $html;
            })
            ->rawColumns(['logo_small', 'action'])
            ->make(true);
    }
}
