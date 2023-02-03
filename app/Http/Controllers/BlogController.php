<?php

namespace App\Http\Controllers;

use App\Events\EventMail;
use App\Http\Requests\StoreBlogRequest;
use App\Mail\BlogCreated;
use App\Mail\Gmail;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Notifications\BlogCreated as NotificationsBlogCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->authorizeResource(Blog::class, 'blog');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->paginate(6);

        // $blogs = Blog::latest()->paginate(4);

        // $blogs = DB::table('blogs')->orderBy('id', 'desc')->paginate(8);=============this way u cannt use reletionship in model class
        return view('blogs.index', [
            'blogs' => $blogs,
            'top_products' => Blog::latest()->get()->take(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('blogs.create', [
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        if ($request->hasFile('image')) {

            $path = $request->file('image')->store('blog-images');
        }
        $blog = Blog::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'image' => $path ?? null,
            'title' => $request->title,
            'short_text' => $request->short_text,
            'content' => $request->content,
            'text_headline' => $request->text_headline,
        ]);
        if (isset($request->tags)) {
            foreach ($request->tags as $tag) {
                $blog->tags()->attach($tag);
            }
        }
        // Mail::to($request->user()->email)->send(new BlogCreated($blog, $request));
        // Notification::send(auth()->user(), new NotificationsBlogCreated($blog));
        // auth()->user()->notify(new NotificationsBlogCreated($blog));
        return redirect()->route('blogs.index')->with('toast_success', 'Muvaffaqiyatli yaratildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {

        return view('blogs.show', [
            'blog' => $blog,
            'similar_products' => Blog::orderBy('id', 'desc')->get()->except($blog->id)->take(3),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        // Gate::authorize('update', $blog);


        $categories = Category::all();
        return view('blogs.edit', [
            'blog' => $blog,
            'categories' => $categories,
            'tags' => Tag::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogRequest $request, Blog $blog)
    {

        // Gate::authorize('update', $blog);
        $this->authorize('update', $blog);

        if ($request->category_id == null) {
            $category_id = $blog->category_id;
        }

        if ($request->hasFile('image')) {
            if (isset($blog->image)) {
                Storage::delete($blog->image);
            }
            $path = $request->file('image')->store('blog-images');
        }
        $blog->update([
            'category_id' => $request->category_id ?? $category_id,
            'image' => $path ?? $blog->image,
            'title' => $request->title,
            'short_text' => $request->short_text,
            'content' => $request->content,
            'text_headline' => $request->text_headline,
        ]);
        if (isset($request->tags)) {
            $tags = Tag::all();

            foreach ($tags as $tag) {
                $blog->tags()->detach($tag->id);
            }
            foreach ($request->tags as $tag) {
                $blog->tags()->attach($tag);
            }
        }
        return redirect()->route('blogs.show', ['blog' => $blog->id])->with('success', 'Changes Applied');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        Gate::authorize('delete', $blog);

        if (isset($blog->image)) {
            Storage::delete($blog->image);
        }
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Successfully deleted');
    }
}
