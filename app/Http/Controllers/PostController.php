<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view ('ADMIN.POST.create');
    }

    public function save(Request $request){
            $data=request()->validate([
                'title' => ['required', 'string', 'max:255'],
                'content' => ['required', 'string'],
                'file' =>['required'],
            ]);
            // $file = $request->file('file');
          
            $file=$data['file'];
            $extension = $file->getClientOriginalExtension();
            $path='Assets/'.$data['title'].'/';
            $name=rand().'.'.$extension;
            $file->move(public_path($path),$name);
            $filesrc= $path.$name;
            Post::create([
                'title' =>$data['title'],
                'file' =>$filesrc,
                'content' =>$data['content']
            ]);
            return redirect()->back();
    }

    public function edit($id){
        $post=Post::where('id',$id)->first();
        return view ('ADMIN.POST.edit',compact('post'));
    }

    public function update($id){
        $data=request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'file' =>[],
        ]);
        if(!empty($data['file'])){
            $file=$data['file'];
            $extension = $file->getClientOriginalExtension();
            $path='Assets/'.$data['title'].'/';
            $name=rand().'.'.$extension;
            $file->move(public_path($path),$name);
            $filesrc= $path.$name;

            Post::where('id',$id)->update([
                'title' =>$data['title'],
                'content' =>$data['content'],
                'file' =>$filesrc,
            ]);

        }else{
            Post::where('id',$id)->update([
                'title' =>$data['title'],
                'content' =>$data['content']
            ]);
        }

        return redirect()->back();
    }

    public function delete($id){
        Post::where('id',$id)->delete();
        return redirect()->back();
    }
}
