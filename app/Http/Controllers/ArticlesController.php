<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Controllers\Controller;



use Illuminate\Http\Request as Request;

use App\Article;
use App\Tag;
use App\ArticlePicture;

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
	public function store(StoreArticleRequest $article)
	{
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
		return view('blog.partials.articleUpdate')->with(['article' => Article::find($id)]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,  Request $articleUpdate)
	{
		$article = Article::find($id);

		$article->tags()->sync($articleUpdate['tags']);

		$article->meta_description = $articleUpdate['meta_description'];
		$article->title = $articleUpdate['title'];
		$article->content = $articleUpdate['content'];
		$article->publish_on = $articleUpdate['publish_on'];

		$article->save();

		$article = Article::find($id);


		return view('blog.partials.article', compact('article'));
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

		return "";
	}

}
