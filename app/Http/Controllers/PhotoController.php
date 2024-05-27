<?php

namespace App\Http\Controllers;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;

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
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if($request->hasfile('image'))
        {
            foreach($request->file('image') as $image)
            {
                $imageName = time().'.'.$image->extension();  
                $image->move(public_path('images'), $imageName);  

                $photo = new Photo();
                $photo->name = $request->name;
                $photo->description = $request->description;
                $photo->image = 'images/'.$imageName;
                $photo->user_id = Auth::id(); 
                $photo->save();
            }
        }

        return redirect()->route('upload.index')->with('success', 'Product created successfully.');
    }

public function mediaIndex(Request $request)
{
    $search = $request->query('search');
    $photos = Photo::query();

    if ($search) {
        $photos->where('name', 'LIKE', "%{$search}%")
               ->orWhere('description', 'LIKE', "%{$search}%");
    }

    $photos->orderBy('created_at', 'desc');

    return view('media.index', ['photos' => $photos->get()]);
}

    public function destroy($id)
    {
        $photo = Photo::find($id);

        if ($photo) {
            $photo->delete();
            return redirect()->route('media.index')->with('success', 'Photo deleted successfully');
        }

        return redirect()->route('media.index')->with('error', 'Photo not found');
    }
}
