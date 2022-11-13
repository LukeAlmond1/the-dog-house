<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Picture;

class PictureController extends Controller
{
    /**
     * Display a listing of all submitted dogs
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pictures = Picture::orderBy('votes', 'desc')->get();

        return view('index', ['pictures' => $pictures]);
    }

    /**
     * Show the form for uploading a new dog.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload');
    }

    /**
     * Handle the form submission and save the uploaded dog
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // #Step 1: Validate the form fields
        // ----------------------------------------------------------------------------------------
        $validator = [
            'fields' => [
                'name' => 'required',
                'image' => ['mimes:jpg,jpeg,png,gif', 'required', 'max:2048']
            ],
            'rules' => [
                'name.required' => 'Ooops, you forgot to add a name',
                'image.required' => 'Ooops, you forgot to add a picture of the doggo',
                'image.mimes' => 'Ooops, please upload an image of the format .jpg .jpeg .png .gif'
            ]
        ];

        $request->validate($validator['fields'], $validator['rules']);

        // #Step 2: Add image to public folder
        // ----------------------------------------------------------------------------------------
        $request->file('image')->store("public");

        // #Step 3: Save the data in the database
        // ----------------------------------------------------------------------------------------
        $picture = new Picture();
        $picture->name = $request->name;
        $picture->file_path = $request->file('image')->hashName();
        $picture->save();

        // #Step 4: Redirect user back to the home page
        // ----------------------------------------------------------------------------------------
        return redirect("/")->with([
            'success' => 'Successfully uploaded dog image'
        ]);
    }

    /**
     * Upvote a dog by ID
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upvote(Request $request, Picture $picture)
    {
        // Step 1: Increment the votes for that picture by 1
        // ----------------------------------------------------------------------------------------
        if ($picture) $picture->increment('votes');

        // Step 1: Redirect back to home page
        // ----------------------------------------------------------------------------------------
        return redirect('/')->with([
            'success' => 'Successfully upvoted dog'
        ]);
    }
}
