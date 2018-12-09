<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Board;
use App\Game;

class BoardsController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); // 컨트롤러에 정의된 함수들을 이용하려면 auth라는 미들웨어를 이용해야함 auth는 요청을 컨트롤러에게 전달해서 로그인한 사용자인지 확인하는 것임 
        // 로그인한 사용자가 아니면 로그인 페이지로 이동하게 되어있음
        $this->middleware('own')->only(['update','destroy']); //own이라는 미들웨어는 update,destroy 함수내에서만 사용, 사용하게되면 두 함수에서 실행전에 미들웨어를 거치기 때문에 따로 체크하는 동작을 구현하지 않아도 됨 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $page = $request->page;
        $msgs = Board::orderBy('created_at','desc')->paginate(10);

        $id = Auth::user()->name;
        $name = Game::where('name',$id)->first();
        $score = Game::where('name',$id)->max('score');
        $playtime = Game::where('name',$id)->max('playtime');
        return view('bbs.index')->with('msgs',$msgs)->with('page',$page)->with('name',$name)->with('score',$score)->with('playtime',$playtime);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = Auth::user()->name;
        $name = Game::where('name',$id)->first();
        $score = Game::where('name',$id)->max('score');
        $playtime = Game::where('name',$id)->max('playtime');
       return view('bbs.write_form')->with('name',$name)->with('score',$score)->with('playtime',$playtime);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* 1. 사용자 입력한 게시글 정보를 boards 테이블에 insert
           (title, content)

        */
        $user = Auth::user();
        /* ORM 미사용 
        DB::insert('insert into boards(title, content, user_id) values(?,?,?',[$request->title,$request->content,$user->id]);
        */

        // ORM 사용

        Board::create(['title'=>$request->title,'content'=>$request->content,'user_id'=>$user->id]);
        return redirect(route('boards.index',['page'=>1]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $page = $request->page;
        $board = Board::find($id);
        $board->hits++;
        $board->user; // 하는순간  select * from where id = $board->user_id
        $board->save();
        $id = Auth::user()->name;
        $name = Game::where('name',$id)->first();
        $score = Game::where('name',$id)->max('score');
        $playtime = Game::where('name',$id)->max('playtime');
        return view('bbs.show')->with('board',$board)->with('page', $page)->with('name',$name)->with('score',$score)->with('playtime',$playtime);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $page = $request->page;
        $b = Board::find($id);

        $id = Auth::user()->name;
        $name = Game::where('name',$id)->first();
        $score = Game::where('name',$id)->max('score');
        $playtime = Game::where('name',$id)->max('playtime');

        return view('bbs.edit')->with('board',$b)->with('page',$page)->with('name',$name)->with('score',$score)->with('playtime',$playtime);
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
         $this->validate($request,['title'=>'required','content'=>'required']);

        /*
        수정하고자 하는 글이 로그인한 사용자의 글인지 체크
        그렇지 않으면 back()
        그렇다면아래로,,
        */

        $b = Board::find($id);
        $b->title=$request->title;
        $b->content=$request->content;
        $b->save();
        return redirect(route('boards.index',['page'=>$request->page])); // db변경 연산 후 redirect해줘야함
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                /*
        삭제하고자 하는 글이 로그인한 사용자의 글인지 체크
        그렇지 않으면 back()
        그렇다면아래로,,
        DB에서 $id에 해당하는 게시글을 읽어온다.
        읽어 온 그 글에 대해 삭제 요청한다.

        */
        $b = Board::find($id);
        $b->delete();


        return redirect(route('boards.index'));
    }

    public function myArticles(Request $request) {
       // $msgs = Auth::user()->boards;

       $msgs = Board::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(10);

        return view('bbs.index')->with('msg',$msgs)->with('page',$request->page);
    }


}
