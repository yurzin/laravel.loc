<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Rubric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        //dump($request->session()->all());
        /*$request->session()->put('test', 'TEST VALUE');
        dump(session()->all());*/
        /*$query = DB::insert("INSERT INTO posts (title, content, created_at) VALUES (?, ?, ?)", ['Статья 7893', 'Контент статья №78953', now()]);*/

        /*$query = DB::insert("INSERT INTO posts (title, content, created_at) VALUES (:title, :content, :created_at)", ['title' => 'Статья 7893', 'content' => 'Контент статья №78953', 'created_at' => now()]);*/

        /*DB::update("UPDATE posts SET created_at = ?, updated_at =? WHERE created_at IS NULL OR updated_at IS NULL", [now(), now()]);*/

        /*DB::delete("DELETE FROM posts WHERE id = ?", [6]);*/

        /*$posts = DB::select("SELECT * FROM posts WHERE id > :id", ["id" => 5]);*/
        /*dump(env('APP_NAME'));
        dump(config('database.connections.mysql'));*/

        // $data = DB::table('country')->get();
        // $data = DB::table('country')->limit(10)->get();
        // $data = DB::table('country')->select('Code', 'Name')->limit(10)->get();

        // $data = DB::table('city')->where('id', '<', 5)->get();
        /*$post = new Post();
        $post->title = 'Статья №1';
        $post->content = 'Контент статьи №1';
        $post->save();*/
        //$data = Country::query()->where('Code', '=', 'AFG')->get();

        /*$data = Country::query()->find('RUS');*/

        //dd($data);

        //Post::query()->create(['title' => 'Post new!', 'content' => 'Lorem ipsum ....']);

        /*$post = new Post();
        $post->fill(['title' => 'Post new! new!!!', 'content' => 'Lorem ipsum .... new']);
        $post->save();*/

        /*$post = Post::query()->find(6);
        $post->title = 'new title update';
        $post->save();*/

        //Post::query()->where('id', '>', 5)->update(['updated_at' => now()]);

        /*$post = Post::query()->find(6);
        $post->delete();*/

        // Post::destroy(2, 3, 21);
        /*$post = Post::query()->find(23);
        dd($post->rubric->title);*/

        /*$rubric = Rubric::query()->find(2);
        dd($rubric->post->title);*/

        // $posts = Rubric::query()->find(4)->posts()->select('content')->where('title', '=', 'Статья №33')->get();

        /*$posts = Post::query()->with('rubric')->where('title', '=', 'Статья №33')->get();*/

        /*$post = Post::query()->find(2);

        dump($post->title);
        foreach ($post->tags as $tag) {
            dump($tag->title);
        }*/

        // $tag = Tag::query()->find(2);

        /*dump($tag->title);
        foreach ($tag->posts as $post) {
            dump($post->title);
        }*/

        $title = 'Home Page';
        /*$h1 = '<h1>home page</h1>';
        $data = range(1, 20);*/

        /*if (Cache::has('posts')) {
            $posts = Cache::get('posts');
        } else {
            $posts = Post::query()->orderBy('id', 'desc')->get();
            Cache::put('posts', $posts);
        }*/
        $posts = Post::query()->orderBy('id', 'desc')->paginate(12);
        return view('home', compact('title', 'posts'));
    }

    public function create() {
        $title = 'Create Post';
        $rubrics = Rubric::query()->pluck('title', 'id')->all();
        return view('create', compact('title', 'rubrics'));
    }

    public function store(StorePostRequest  $request) {
        /*dd($request->input('title'));*/
        // dd($request->all());
        /*$this->validate($request, [
            'title' => 'required|min:5|max:50',
            'content' => 'required|min:50|max:500',
            'rubric_id' => 'required|integer'
        ]);*/

        /*$rules = [
            'title' => 'required|min:5|max:50',
            'content' => 'required|min:50|max:500',
            'rubric_id' => 'required|integer'
        ];
        $messages = [
            'title.required' => 'Заполните поле Название',
            'content.required' => 'Заполните поле Текст',
            'rubric_id.required' => 'Выберите рубрику'
        ];*/
        //$validator = Validator::make($request->all(), $rules, $messages)->validate();

        $validated = $request->validated();
        Post::query()->create($request->all());

        /*if (Post::validate($request)) {
            Post::query()->create($request->all());
         }*/
        return redirect()->route('home');
    }
}
