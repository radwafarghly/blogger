<?php
/**
 * Created by PhpStorm.
 * User: Radwa Ahmed
 * Date: 4/17/2018
 * Time: 03:25 م
 */

namespace App\Http\Controllers;
use App\Repositories\ArticlesRepository;
use App\Repositories\RepositoryInterface;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    /**
     * @var $task
     */
//
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    private $article;
    /**
     * TaskController constructor.
     *
     * @param App\Repositories\ $task
     */
    public function __construct(ArticlesRepository $article)
    {
        $this->middleware('auth');

        $this->article = $article;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->article->getAll();

        return view('articles.index', compact('articles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->all();
        $current_userid = \Auth::user()->id;
        $attributes['user_id']=$current_userid;
        // dd($attributes);
        $this->article->create($attributes);
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $article = $this->article->getById($id);
        $comments=\App\Comment::select(['content'])->with('commentable')->get();

        return view('articles.show', compact('article'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = $this->article->getById($id);
        return view('articles.edit',compact('article'));
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
        $attributes = $request->all();
        $this->article->update($id, $attributes);
        return redirect()->route('articles.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->article->delete($id);

        return redirect()->route('posts.index');
    }
}



