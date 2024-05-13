<?php

namespace App\Http\Controllers;
use App\Models\Image;

use Illuminate\Http\Request;

class ImageController extends Controller
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
        $image = new image();
        $image->name = $request->name;
        $image->description = $request->description;
        $image->image = 'images/'.$imageName;
        $image->save();
        return redirect()->route('upload.index')->with('success', 'image created successfully.');
    }
}
