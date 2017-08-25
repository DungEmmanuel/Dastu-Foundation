<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use Illuminate\Support\Str;
use App\Http\Requests\PostFormRequest;
use App\Http\Requests\PostEditFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Image;
use Illuminate\Support\Facades\Input;


class PostsController extends Controller
{
    public function create() 
    {
          $categories = Category::all();
          return view('backend.posts.create', compact('categories'));
    }

    public function store(PostFormRequest $request)
    {
         $post= new Post(array(
        'title' => $request->get('title'),
        'content' => $request->get('content'),
        'slug' => Str::slug($request->get('title'), '-'),
        'user_id' => Auth::user()->id,
         ));
         
         $post->save();
         $post->categories()->sync($request->get('categories'));
         $postid = $post->id; 

         //$images = array();
         $images = $request->file('images');


         if ($images !== null) 
         {

                   foreach ($images as $theImage) 
                   {

                        // Ignore array member if it's not an UploadedFile object, just to be extra safe
                        if (!is_a($theImage, 'Symfony\Component\HttpFoundation\File\UploadedFile')) 
                        {
                           continue;
                        }
                            $fileName=$theImage->getFilename();
                            $imagess=new Image();
                            $imagess->image=$fileName.'.'.$theImage->getClientOriginalExtension();
                            $imageName=$fileName.'.'.$theImage->getClientOriginalExtension();
                            $theImage->move('images', $imageName);
                            $imagess->post()->associate($post);
                            $imagess->save();

         
                    } 

          }

        
            
         
         //$input['image'] = time().'.'.$request->image->getClientOriginalExtension();
         ///$request->image->move(public_path('images'), $input['image']);
         //$input['post_id'] = $postid;
         
         //Image::create(array('image'=>time().'.'.$request->image->getClientOriginalExtension(), 'post_id'=>$postid));



         return redirect('/admin/posts/create')->with('status', 'The post has been created!');
    }

    public function index() 
    {
         $posts = Post::all();
         //$images= Image::get();
         return view('backend.posts.index', compact('posts'));
    }

     public function edit($id) 
     {
          $post = Post::whereId($id)->firstOrFail();
          $categories = Category::all();
          $selectedCategories = $post->categories->lists('id')->toArray();;
          return view('backend.posts.edit', compact('post', 'categories', 'selectedCategories'));
     }

     public function update($id, PostEditFormRequest $request) 
     {
            $post = Post::whereId($id)->firstOrFail();
            $post->title = $request->get('title');
            $post->content = $request->get('content');
            $post->slug = Str::slug($request->get('title'), '-');
            $post->save();
            $post->categories()->sync($request->get('categories'));
            return redirect(action('Admin\PostsController@edit', $post->id))->with('status', 'The post has been updated!');
     }



}
