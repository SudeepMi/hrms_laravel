<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Chatbox;
use App\Models\Post;
use App\Models\Pow;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('replies')->where('user_id', \Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('home', compact('posts'));
    }

    public function pow(){
        if(\Auth::user()->isAd() || \Auth::user()->isHR()){
            $pow = Pow::with('user')->orderBy('id', 'DESC')->get();
        }else{
            $pow = Pow::with('user')->where('user_id', \Auth::user()->id)->orderBy('id', 'DESC')->get();
        }
        // dd($pow);
        return view('hrms.pow.show', compact('pow'));
    }

    public function addPow(Request $request){
        $pow = new Pow();
        $pow->title = $request->title;
        $pow->user_id = \Auth::user()->id;
        if(($request->hasFile('file'))){
            $file = $request->file;
            $filename = "OMS_".time()."_".$file->getClientOriginalName();
            try {
                $file->move(public_path('/storage/pow'), $filename);
                $pow->pow = 'http://localhost:8000/storage/pow/'.$filename;
                $pow->save();
                \Session::flash('flash_message', 'Proof of work successfully added!');
                return redirect()->back();
            } catch (\Exception $e) {
                // dd($e);
                \Session::flash('flash_message', 'Failed to upload proof of work');
                return redirect()->back();
                // return response()->json(['message'=>'Internal Server Error'],500);
            } catch (\Throwable $th) {
                // dd($th);
                \Session::flash('flash_message', 'Failed to upload proof of work');
                // return response()->json(['message'=>'Internal Server Error'],500);
            }

        }else{
            return response()->json(['message'=>'please input file and id']);
        }
       
    }

    public function add_pow(){
        return view('hrms.pow.add');
    }

    public function chatPage(){
        $allchat = Chatbox::with('user')->orderBy('id', 'ASC')->get();
        return view('hrms.chatbox.home', compact('allchat'));
    }

    public function addChat(Request $request){
        $chat = new Chatbox();
        $chat->user_id = \Auth::user()->id;
        $chat->message = $request->message;
        $chat->save();
        $chat->user->name = \Auth::user()->name;
        return response()->json(['message'=>'success','data'=>$chat]);
    }

}
