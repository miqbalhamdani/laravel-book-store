<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = array(
            (Object) array("name" => 'Simple CRUD Author', "slug" => "author"),
            (Object) array("name" => 'CRUD Book', "slug" => "book"),
        );

        return view('index', [
            'lessons' => $lessons,
        ]);
    }
}
