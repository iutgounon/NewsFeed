<?php

namespace App\Http\Controllers;

use App\Favorites;
use Illuminate\Http\Request;


class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // Get favorites from db with the user_id
        $favorites = Favorites::where('user_id', '=',$id)->paginate(6);

        return view('favorites')->with('favorites',$favorites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Create a Favorite

        $favorites = new Favorites([
            'user_id' => $request->get('user_id'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'urlToImage' => $request->get('urlToImage'),
            'url' => $request->get('url'),
            'author' => $request->get('author')
        ]);

        // Save data into DB
        $favorites->save();

        // Return to the favorites page
        return redirect()->route('favorites',['id' => $request->get('user_id')]);




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $favorite = Favorites::find($id);
        $favorite->delete();

        // redirect to home page
        return redirect()->route('welcome');

    }
}
