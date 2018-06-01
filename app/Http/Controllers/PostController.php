<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use App\Category;
use App\Author;
use App\Publisher;
use Image;
use Purifier;
use Storage;

class PostController extends Controller
{
  public function __construct()
  {
    $this->middleware('role:superadministrator|administrator|editor|author|contributor');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // create a variable and store all the books in it from the database
    //$posts = POST::all();
    $posts = POST::orderBy('id', 'desc')->paginate(10);

    // return a view and pass in the above variable
    return view('manage.books.index')->withPosts($posts);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $categories = Category::all();
      $authors = Author::all();
      $publishers = Publisher::all();
      return view('manage.books.create')->withCategories($categories)->withAuthors($authors)->withPublishers($publishers);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // validate the data
    $this->validate($request, array(
      'title' => 'required|max:255',
      'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
      'category_id' => 'required|integer',
      'body' => 'required',
      'featured_image' => 'sometimes|image'
    ));

    // store in the database
    $post = new Post;

    // redirect to another page
    $post->title = $request->title;
    $post->slug = $request->slug;
    $post->category_id = $request->category_id;
    $post->author_id = $request->author_id;
    $post->publisher_id = $request->publisher_id;
    $post->body = $request->body;

    // Save our image
    if ($request->hasFile('featured_image')) {
      $image = $request->file('featured_image');
      $filename = time() . '.' . $image->getClientOriginalExtension();
      $location = public_path('images/' . $filename);
      Image::make($image)->resize(400, 800)->save($location);

      $post->image = $filename;
    }

    $post->save();

    Session::flash('success', 'The book created successfully');

    return redirect()->route('books.show', $post->id);
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
    return view('manage.books.show')->withPost($post);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    // find the post in the database and save as a variable
    $post = Post::find($id);
    $categories = Category::all();
    $authors = Author::all();
    $publishers = Publisher::all();
    $cats = array();
    $auts = array();
    $pubs = array();
    
    foreach($categories as $category) {
      $cats[$category->id] = $category->name;
    }

    foreach($authors as $author) {
      $auts[$author->id] = $author->name;
    }

    foreach($publishers as $publisher) {
      $pubs[$publisher->id] = $publisher->name;
    }

    // return the view and pass in the var we previously created
    return view('manage.books.edit')->withPost($post)->withCategories($cats)->withAuthors($auts)->withPublishers($pubs);
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
    // Validate the data
    $post = Post::find($id);


    $this->validate($request, array(
      'title' => 'required|max:255',
      'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
      'category_id' => 'required|integer',
      'body' => 'required',
      'featured_image' => 'image'
    ));

 

    // Save the data to the database
    $post = Post::find($id);
    
    $post->title = $request->input('title');
    $post->slug = $request->input('slug');
    $post->category_id = $request->input('category_id');
    $post->author_id = $request->input('author_id');
    $post->publisher_id = $request->input('publisher_id');
    $post->body = $request->input('body');

    if ($request->hasFile('featured_image')) {
      // add the new imagae
      $image = $request->file('featured_image');
      $filename = time() . '.' . $image->getClientOriginalExtension();
      $location = public_path('images/' . $filename);
      Image::make($image)->resize(400, 800)->save($location);
      $oldFilename = $post->image;

      // update the database
      $post->image = $filename;
      // Delete the old image
      Storage::delete($oldFilename);



    }

    $post->save();

    // set flash data with success message
    Session::flash('success', 'This book detail was successfully updated');

    // redirect with flash data to books.show
    return redirect()->route('books.show', $post->id);
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
      $post = POST::find($id);

      Storage::delete($post->image);

      $post->delete();

      Session::flash('success', 'The book was successfully deleted.');

      return redirect()->route('books.index');
  }

  public function apiCheckUnique(Request $request)
  {
    return json_encode(!Post::where('slug', '=', $request->slug)->exists());
  }
}
