<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Post\PostRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PostController extends Controller
{
    private $post;
    public function __construct(PostRepositoryInterface $post)
    {
        $this->post=$post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View with Response
     */
    public function index()
    {
        $posts=$this->post->getPaginate(20);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {

        return view('admin.posts.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data=$request->except('_token','files');
        $data['status']=isset($request->status)?1:0;
        $this->post->create($data);
        return redirect()->route('post.index')->with('success','Post has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post=$this->post->find($id);
        return view('admin.posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->except('_token','files');
        $data['status']=isset($request->status)?1:0;
        $post=$this->post->update($id,$data);
        return redirect()->route('post.index')->with('success',$post->title.'Post has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $post=$this->post->delete($id);
        if ($post){
            return redirect()->back()->with('success',$post->title.'has been deleted successfully');
        }
        redirect()->with('errors','Something went wrong');
    }
}
