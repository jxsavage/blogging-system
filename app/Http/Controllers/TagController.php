<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request as Request;

use App\Tag;

class TagController extends Controller {

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
    public function store(Request $tag)
    {
        Tag::create(['tag' => $tag->new_tag]);

        return view('blog.partials.manageTagModalContent', ['tags' => Tag::all()]);
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
    public function update($id, Request $tagUpdate)
    {
        $tag = Tag::find($id);

        $tag->tag = $tagUpdate['updated_tag'];

        $tag->save();
        return view('blog.partials.manageTagModalContent', ['tags' => Tag::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);

        $tag->articles()->detach();

        $tag->delete();

        return view('blog.partials.manageTagModalContent', ['tags' => Tag::all()]);
    }
}
