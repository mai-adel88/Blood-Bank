<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\User;

class PostsController extends Controller
{
    public function index()
    {
        $records = Post::paginate(10);
        return view('admin.posts.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $users = User::get();

        return view('admin.posts.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = [
            'title'     =>'required',
            'content'   =>'required',
            
        ]; 
        $input = $request->all();

        $validator = \Validator::make($input, $validator);


        //if i want to upload img
        if(isset($input['image'])){ 
            //upload image
            $input['image']=$this->upload($input['image']);
        }else{ //if there is no image to upload -> it will be here an img by default
            $input['image'] = 'images/defImg.jpg';
        }

        $input['user_id'] = auth()->user()->id;
        $input['category_id'] = $request->category_id;
        Post::create($input);

        flash()->success("added successfully");
        return redirect('admin/post');
    }


    public function upload($file)
    {
        $extension = $file->getClientOriginalExtension(); //2
        $sha1 = sha1($file->getClientOriginalName()); //hash name of file //3
        $filename = date('Y-m-d-h-i-s').".".$sha1.".".$extension; //finally name
        $path = public_path('images/Postsimg/');
        $file->move($path, $filename); //step 1

        return 'images/Postsimg/'.$filename;
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
        $records = Post::findOrFail($id);
        $users   = User::get();
        $categories= Category::get();

        return view('admin/posts/edit', compact('records', 'users', 'categories'));
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
        $input = $request->all();
        if(isset($input['image'])) //if i want to upload img //upload image
            $input['image']=$this->upload($input['image']);
        
        $input['user_id']=auth()->user()->id;

        $records = Post::find($id);
        $records->update($input);

        flash()->success('Edited Successfully');
        return redirect(route('post.index'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $records = Post::findOrFail($id);
        $records->delete();
        flash()->success('Deleted Successfully');
        return back();
    }
}
