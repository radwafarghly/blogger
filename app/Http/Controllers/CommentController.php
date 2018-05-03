<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Notifications\AddComment;
use App\Post;
use App\Repositories\ModelRelationRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Notification ;

class CommentController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $modelRelationRepository;


    public function __construct(ModelRelationRepository $modelRelationRepository)
    {
        $this->middleware('auth');
        $this->modelRelationRepository=$modelRelationRepository;
    }
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $post = Post::find($id);
       // $comments=Comment::select(['content'])->with('commentable')->get();
        return view('comments.create',compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id,Request $request)
    {

        $comment = new Comment([
            'content' => $request->content,
            'user_id'=> auth()->id()
        ]);
         $post = Post::find($id);
        $comment=$post->comments()->save($comment);
        if($comment){
            $users=$this->modelRelationRepository->getnotifcationuser($comment);
           //$users=User::all();
            Notification::send($users, new AddComment($comment));

        }

        return redirect()->route('posts.show', ['id' => $id]);
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
