<?php

namespace App\Http\Controllers;
use App\Models\Photo;

use Illuminate\Http\Request;

class PhotoController extends Controller
{

    public function index()
    {
        return view('upload.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $photo = new Photo();
        $photo->name = $request->name;
        $photo->description = $request->description;
        $photo->image = 'images/'.$imageName;
        $photo->save();
        return redirect()->route('upload.index')->with('success', 'Product created successfully.');
    }

    public function mediaIndex()
    {
        $photos = Photo::all();
        return view('media.index', ['photos' => $photos]);
    }
}
