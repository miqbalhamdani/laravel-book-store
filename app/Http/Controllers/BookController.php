<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'books' => Book::orderBy('created_at', 'desc')->get(),
        ];

        return view('book.bookIndex', $data);
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
    public function store(Request $request, $id = '')
    {
        $book = null;

        if ($id) $book = Book::find($id);

        if ($request->isMethod('post')) {
            $data = [
                'title' => $request->input('inputTitle'),
                'author_id' => $request->input('inputAuthorId'),
                'status' => $request->input('inputStatus'),
                'price' => $request->input('inputPrice'),
            ];

            if ($id) {
                $book->save($data);
            } else {
                Book::create($data);
            }

            return redirect('/book');
        }

        $data = [
            'book' => $book,
            'authors' => \App\Models\Author::get(),
        ];

        return view('book.bookForm', $data);
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
        Author::destroy($id);

        return redirect('/author');
    }
}
