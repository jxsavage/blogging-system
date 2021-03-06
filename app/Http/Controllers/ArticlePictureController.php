<?php namespace App\Http\Controllers;

use App\Http\Requests\StoreArticlePictureRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request as Request;

use App\ArticlePicture;

class ArticlePictureController extends Controller {

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
    public function store(StoreArticlePictureRequest $articlePictures)
    {
        $picture = $articlePictures['picture'];
        $articleId = $articlePictures['article_id'];


        $imgName = md5($picture->getClientOriginalName());
        $picture->move(public_path().'/img/articles/article'.$articleId, $imgName.'.'.$picture->getClientOriginalExtension());
        ArticlePicture::create([
            'article_id' => $articleId,
            'url' => '/img/articles/article'.$articleId.'/'.$imgName.'.'.$picture->getClientOriginalExtension()
        ]);


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
    public function update($id, Request $pictureUpdate)
    {
        $picture = ArticlePicture::find($id);

        $picture->url = $pictureUpdate['updated_picture'];

        $picture->save();
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
        $picture = ArticlePicture::find($id);

        $picture->delete();

        return redirect('blog');
    }
}
