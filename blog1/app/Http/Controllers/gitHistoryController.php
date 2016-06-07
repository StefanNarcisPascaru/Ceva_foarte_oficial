<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\gitHistory;

use App\User;
use App\Http\Controllers\Controller;
use GrahamCampbell\GitHub\Facades\GitHub;


class gitHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "faceva";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gitHub.create');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gitHistory = new gitHistory;
        $gitHistory -> search_username = $request -> search_username;
        $gitHistory -> search_text = $request -> search_text;
        $gitHistory -> url = 'https://en.wikipedia.org/wiki/Example_(musician)';
        $gitHistory -> save();

        GitHub::me()->organizations();
        $sami = "stefa08";

        $ceva = GitHub::repo()->show($request -> search_username,$request -> search_text);
        $merge = $ceva['html_url'];

        $user = true;
        
        $apis = gitHistory::all();
        
        return view('gitHub.api')
            ->with("html_url",$ceva['html_url'])
            ->with("user",$user)
            ->with("date",$apis);
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
