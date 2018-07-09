<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Facades\Storage에 있는 파일 Delete메소드를 사용하기 위해 라이브러리 추가하였다.
use App\Post; // POST 모델에서 POST 테이블을 사용하기 위해 모델을 추가하였다.

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // 정렬 및 페이지네이션
        $posts = Post::orderby('created_at','desc')->paginate(12);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Check Activation_code

        if(auth()->user()->status == 0){
            return redirect('/posts')->with('error', '이메일 인증이 필요한 서비스입니다.');
        }
        
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); // pathinfo 는 php 내장 함수이다.
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension; // file name completely unique.
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'no_image.png'; // 만약 제대로된 파일 업로드가 아니라면 default image를 올린다.
        }

        // Create Post
        $post = new Post; // 포스트 모델을 불러왔으므로 이렇게 사용 가능
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', '글이 작성되었습니다.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post); // with 메소드의 첫번째 파라미터는 뷰에서 쓰일 변수명을 의미한다.         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        // Check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', '접근이 제한된 페이지입니다.');
        }

        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); // pathinfo 는 php 내장 함수이다.
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension; // file name completely unique.
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'no_image.png'; // 만약 제대로된 파일 업로드가 아니라면 default image를 올린다.
        }

        // Update Post
        $post = Post::find($id); // 포스트 모델을 불러왔으므로 이렇게 사용 가능
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success', '글이 수정되었습니다.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // Check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', '접근이 제한된 페이지입니다.');
        }

        if($post->cover_image != 'no_image.png'){
            // Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);

        }

        $post->delete();
        return redirect('/posts')->with('error', '글이 삭제되었습니다.');
    }
}
