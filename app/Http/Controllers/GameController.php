<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Game;
use App\User;

class GameController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); // 컨트롤러에 정의된 함수들을 이용하려면 auth라는 미들웨어를 이용해야함 auth는 요청ㅇ르 컨트롤러에게 전달해서 로그인한 사용자인지 확인ㅇ하는 것임 
        // 로그인한 사용자가 아니면 로그인 페이지로 이동하게 되어있음
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('score.index');
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
 
        $user = Auth::user()->id;
        $name = Auth::user()->name;

        $playtime = Game::where('name', $name)->orderBy('playtime','desc')->first()->playtime;

        Game::create(['score'=>$request->score,'user_id'=>$user,'playtime'=>$playtime+1,'name'=>$name]);
 


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
