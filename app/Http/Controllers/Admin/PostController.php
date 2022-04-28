<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class PostController extends Controller
{
    protected function validateForm(Post $post=null) : array
    {
        $post ??= new Post();
        return request()->validate([
            'excerpt' => 'required',
            'title' => 'required',
            'image' => 'image',
            'description' => 'required',
            'category_id' => ['required', Rule::exists('post_categories','id')],
        ]);
    }

    public function index(){
        return view('admin.post.index',[
            'posts' => Post::orderBy('updated_at','DESC')->paginate(3)
        ]);
    }
    public function create(){
        return view('admin.post.create',[
            'users' => User::all(),
            'categories' => PostCategory::all()
        ]);
    }
    public function store(){
        Post::create(array_merge($this->validateForm(),[
            'user_id' => request()->user()->id,
            'slug' => Str::slug(request()->title, '-'),
            'image' => request()->file('image')->store('thumbnails'),
        ]));
        return redirect('/admin/posts')->with('msg','Thêm Mới  Thành Công'); 
    }
    public function show($slug){
        return view('admin.post.show',[
            'post' => Post::where('slug',$slug)->first()
        ]);
    }
    public function edit($slug){
        return view('admin.post.edit',[
            'post' => Post::where('slug',$slug)->first(),
            'categories' => PostCategory::all(),
            'users' => User::all()
        ]);
    }
    public function update(Post $post){
        // dd('helleo');
        $attribute = $this->validatePost();
        $attribute['user_id'] = request()->user_id;
        if($attribute['image'] ?? false){
            $attribute['image'] = request()->file('image')->store('thumbnails');
        }
        $post->update($attribute);
        return back()->with('msg','Cap nhat thanh cong');
    }
    public function destroy($slug){
        Post::where('slug',$slug)->delete();
        return redirect('/admin/posts')->with('msg','Xóa Thành Công'); 
    }

}
