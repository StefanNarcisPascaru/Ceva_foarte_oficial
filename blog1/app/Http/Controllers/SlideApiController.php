<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slideapi;

use App\Http\Requests;

class SlideApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all=slideapi::all();
        return $all;
    }
    public function get()
    {
        if(isset($_GET['lang']))
            $limba=$_GET['lang'];
        else $limba='en';
        if(isset($_GET['format']))
            $format=$_GET['format'];
        else $format='pdf';
        if(isset($_GET['take']))
            $take=$_GET['take'];
        else $take=10;
        
        $all=slideapi::where('titlu', 'like', '%'.$_GET['q'].'%')
                ->where('format', $format)
                ->where('limba', $limba)
               ->orderBy('data_cautare', 'desc')
               ->take($take)
               ->get();

        return $all;
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
}
