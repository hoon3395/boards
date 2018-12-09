<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Attachment;
use App\Board;

class AttachmentsController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); // 컨트롤러에 정의된 함수들을 이용하려면 auth라는 미들웨어를 이용해야함 auth는 요청을 컨트롤러에게 전달해서 로그인한 사용자인지 확인하는 것임 
        // 로그인한 사용자가 아니면 로그인 페이지로 이동하게 되어있음
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        /*
        1.전송받은 파일을 지정된 폴더에 저장한다.
          어느 폴더에 저장하나?
          public/files/사용자_아이디/
        2.파일정보를 attachments 테이블에 저장한다.
        3.잘 저장 되었어요라는 결과를 클라이언트에게 송신하다.


        */
        $attachment = null;
        \Log::debug('AttachmentsController store', ['stpe'=>1]);
        if($request->hasFile('file')) {
            $file = $request->file('file');
            
            $filename = /*str_random().*/filter_var($file->getClientOriginalName(), FILTER_SANITIZE_URL);
            $bytes = $file->getSize();
            $user = \Auth::user();
            $path = public_path('files') . DIRECTORY_SEPARATOR .  $user->id;
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            
            $file->move($path, $filename);
          
            /*
            2번구현
            */

            $payload = [
                    'filename'=>$filename,
                    'bytes'=> $bytes,
                    'mime'=>$file->getClientMimeType()
                ];
                
            $attachment =  Attachment::create($payload);
        }
        \Log::debug('AttachmentsController store', ['stpe'=>7]);
        return response()->json($attachment, 200);
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
    public function destroy(Request $request, $id) {
        $filename =  $request->filename;
        $attachment = Attachment::find($id);
        $attachment->deleteAttachedFile($filename);
        $attachment->delete();
        $user = \Auth::user();
        /*
        $path = public_path('files') . DIRECTORY_SEPARATOR .  $user->id . DIRECTORY_SEPARATOR . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        */
        return $filename;  
    }
}
