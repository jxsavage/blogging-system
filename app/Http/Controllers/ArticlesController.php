<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request as Request;

use App\Article;
use App\Tag;

use Carbon\Carbon as Carbon;


class ArticlesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return redirect to index
	 */
	public function store(Request $article)
	{
		dd($article['tags']);
		$newArticle = $article->all();

		$newArticle['user_id'] = \Auth::user()->id;

		Article::create($newArticle);

		return redirect('blog');
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
	public function update($id, Request $articleUpdate)
	{
		$article = Article::find($id);

		$existingTagIds = $article->tags->lists('id');
		$updatedTagIds = $articleUpdate['tags'];

		$addTagIds = array_diff($updatedTagIds, $existingTagIds);
		$removeTagIds = array_diff($existingTagIds, $updatedTagIds);

		if($addTagIds)
		{
			$article->tags()->attach($addTagIds);
		}
		if($removeTagIds)
		{
			$article->tags()->detach($removeTagIds);
		}

		$article->meta_keywords = $articleUpdate['meta_keywords'];
		$article->meta_description = $articleUpdate['meta_description'];
		$article->title = $articleUpdate['title'];
		$article->content = $articleUpdate['content'];
		$article->publish_on = $articleUpdate['publish_on'];

		$article->save();
		return redirect('blog');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$article = Article::find($id);

		$article->delete();

		return redirect('blog');
	}

}
