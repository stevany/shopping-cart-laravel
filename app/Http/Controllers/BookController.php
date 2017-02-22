<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Book::paginate(5),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return app('Illuminate\Contracts\Auth\Guard')->user();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //Book::create($request->all());
         //echo '<script>console.log("test")</script>';
        //
        Book::create([
            'title' => $request->input('title'),
            'isbn' => $request->input('isbn'),
            'price' => $request->input('price'),
            // 'cover' => 'requiem.jpg',
            'author_id' =>$request->input('author_id')]);
        return response(array(
            'error' =>'rerr',
            'message' => 'test' ,
            ),200);
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
        return Book::findOrFail($id);
    }
    /**
     * Display the specified resource.
     *
     * @param  string  $title
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        //
        return Book::where('title','like','%'.$title.'%')->get();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * 
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
        Book::find($id)->update($request->all());
        return response(array(
            'error'=>false,
            'message' => 'Product updated successfully',
            ),200);
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
        Book::findOrFail($id)->delete();

    }
}
