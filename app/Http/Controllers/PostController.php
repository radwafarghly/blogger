<?php

namespace App\Http\Controllers;

use App\Article;
use App\ModelRelation;
use App\Post;
use App\Repositories\ModelRelationRepository;
use App\Repositories\PostRepository;
use App\Repositories\RepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Lang;
use Illuminate\Support\Facades\App;

class PostController extends Controller
{

    /**
     * @var $task
     */
//
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    private $post;
    private $ModelRelationRepository;



    public function __construct(PostRepository $post, ModelRelationRepository $ModelRelationRepository)
    {
        $this->middleware('auth')->except('index','show');//,['except'=>'index','show']);
        $this->post = $post;
        $this->ModelRelationRepository = $ModelRelationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->getAll();

        return view('posts.index', compact('posts'));

    }
    public function trash()
    {
        $posts = $this->post->getAlltrach();

        return view('posts.trashpost', compact('posts'));

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule=[
            'title' => Lang::get('admin.title'),
            'body' => trans('admin.body'),
        ];
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
        ],[],$rule);

        $attributes = $request->all();
        $current_userid = \Auth::user()->id;
        $attributes['user_id'] = $current_userid;
        // dd($attributes);
//        $attributes=[
//            'title'   => $request->input('title'),
//            'body'    => $request->input('body'),
//            'user_id' => $current_userid
//        ];
//        dd($attributes);
         $this->post->create($attributes);
         session()->flash('success','Post created successfully');
        return redirect()->route('posts.index');//->with('success','Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->post->getById($id);

        return view('posts.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->post->getById($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attributes = $request->all();
        $this->post->update($id, $attributes);
        return redirect()->route('posts.index');


    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->post->delete($id);

        return redirect()->route('posts.index');
    }

    public function forceDelete($id)
    {
        $this->post->forceDelete($id);

        return redirect()->route('posts.index');
    }

    public function restore($id){
        $this->post->restore($id);
        return redirect()->route('posts.index');

    }
    public function getrelation()
    {
        $path=app_path();
        $lenpass=strlen($path);
        $models = [];
        $results = scandir($path);
        //dd($results);
        foreach ($results as $result) {
            if ($result === '.' or $result === '..') continue;
            $filename = $path . '\\' . $result;
           // dd($filename);
            if (is_dir($filename)) {
                $models = array_merge($models);
            }else{
                $models[] = ucfirst(substr($filename,$lenpass-3,-4));
            }
        }
//       return $models;
         $modelrelationS=[];
        if (is_array($models)){
            foreach ($models as $model){
                $modelnew=new $model;
                //dd($modelnew);
                $modelrelation=$modelnew->relationships();
                foreach($modelrelation as $test) {
                    if ($test['model'] == 'App\User') {
                        // array_push($modelrelationS, $test);
                         ModelRelation::create(['model' => $model, 'relation' => $test['relation'], 'relationdisplayname' => $model.' '.$test['type'].' '.$test['relation']]);
                        //dd($modelrelationS);
                    }
                }
            }
        }
        //return $modelrelationS;
        return view('getnotifcationuser', compact('relation'));

        //////////////////////////////
        //$post = new Post();
       // $modelrelations = $post->relationships();
     // dd($modelrelations);
        //$relation=[];
//        foreach ($modelrelations as $modelrelation) {
//           // $relation[] = $modelrelation['name'];
//            if ($modelrelation['model']== 'App\User'){
//                $relation[] = $modelrelation['name'];
//            }
//            dd($relation);
//        }
//        if (is_array($modelrelations)){
//            foreach ($modelrelations as $modelrelation) {
//                  if ($modelrelation['model'] === 'App\User')
//                  {
//                      $relation['name']  =  $modelrelation['name'] ;
//                      $relation['type']  =  $modelrelation['type'] ;
//                      $relation['model'] =  $modelrelation['model'] ;
//                  }
//                else
//                    {
//                    if ($modelrelation['model'] =! 'App\User'){
//                       $relation =  "no Relation";
//                    }
//                }
//            }
//            dd($relation);
//
//        }
    }





//    function getModels($path){
//
//        $out = [];
//        $results = scandir($path);
//        foreach ($results as $result) {
//            if ($result === '.' or $result === '..') continue;
//            $filename = $path . '/' . $result;
//            if (is_dir($filename)) {
//                $out = array_merge($out, getModels($filename));
//            }else{
//                $out[] = substr($filename,0,-4);
//            }
//        }
//        return $out;
//    }

//dd(getModels($path));
}