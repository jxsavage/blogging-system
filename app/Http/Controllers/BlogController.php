<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tag;
use App\Article;
use App\User;


use Illuminate\Http\Request;

class BlogController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		  //$articles = \App\Article::first()->present()->tags()->toArray();
		  $articles = Article::published()->orderBy('publish_on', 'DESC')->get();
		  $tags = Tag::all();
		  //dd(\Auth::user()->roles->first()->role);
		  return view('blog.index', compact('articles', 'tags'));
	}
        /**
         * Returns the article with the coresponding tag.
         *
         * @param $tag
         */
        public function tag($tag)
        {


            $tagQuery = Tag::where('tag', '=', $tag);

            $result = $tagQuery->get();

            if ($result->isEmpty())
            {
                return 'Sorry no tags matching '.$tag.'.';
            }

            $articles = $tagQuery->with('articles')->get();

            if ($articles->isEmpty())
            {
                return 'Sorry no articles have the tag of '.$tag.'.';
            }
            //dd($articles->first()->articles);
            $articles = $articles->first()->articles;

            return view('blog.index', compact('articles'));
        }
        /**
         * Returns the article with the coresponding title.
         *
         * @param $title
         */
        public function title($title)
        {
            $title = str_replace('_', ' ', $title);

            $titleQuery = Article::where('title', '=', $title);

            $articles = $titleQuery->get();

            if ($articles->isEmpty())
            {
                return 'Sorry no title matching: '.$title.'.';
            }

            return view('blog.index', compact('articles'));
        }

        /**
         * Returns the articles associated with the $user.
         *
         * @param $user string of the users name.
         */
        public function user($user)
        {
            $userQuery = User::where('user_name', '=', $user);

            $articles = $userQuery->with('articles')->get()->first()->articles;
						//dd($articles->first()->articles);

            if ($articles->isEmpty())
            {
                return 'Sorry no articles authored by: '.$user.'.';
            }

            return view('blog.index', compact('articles'));
        }
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		return view('blog.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
