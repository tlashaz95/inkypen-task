<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // Home Gallery
    public function index()
    {
        $galleries = Gallery::all();
        return view('gallery.index')->with('galleries', $galleries);
    }

    // Manage Galleries
    public function manage()
    {
        $galleries = Gallery::all();
        return view('gallery.manage')->with('galleries', $galleries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Create new Gallery
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Store Gallery
    public function store(Request $request)
    {
        // Saving Display Image
        if($request->hasFile("display_image"))
        {
            $request->validate([
                'display_image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048'
            ]);
            
            $file = $request->file("display_image");
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("display_images/"), $imageName);

            // Saving All fields
            $gallery = new Gallery([
                "title" => $request->title,
                "description" => $request->description,
                "display_image" => $imageName,
            ]);
            $gallery->save();
        }

        // Saving all other images
        if($request->hasFile("images"))
        {
            $files = $request->file("images");
            foreach($files as $file)
            {
                $imageName = time().'_'.$file->getClientOriginalName();
                $request['gallery_id'] = $gallery->id;
                $request['image'] = $imageName;
                $file->move(\public_path("/images"), $imageName);
                Image::create($request->all());
            }
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */

     // Display a specific gallery
    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('gallery.show')->with('gallery', $gallery);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */

     // Edit Gallery
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('gallery.edit')->with('gallery', $gallery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */

     // Updating Gallery (all fields / images)
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        if($request->hasFile("display_image"))
        {
            if(File::exists("display_images/".$gallery->display_image))
            {
                File::delete("display_images/".$gallery->display_image);
            }

            $file = $request->file("display_image");
            $gallery->display_image = time()."_".$file->getClientOriginalName();
            $file->move(\public_path("/display_images"), $gallery->display_image);
            $request['display_image'] = $gallery->display_image;
        }

        $gallery->update([
            "title" => $request->title,
            "description" => $request->description,
            "display_image" => $gallery->display_image
        ]);

        if($request->hasFile("images"))
        {
            $files = $request->file("images");
            foreach($files as $file)
            {
                $imageName = time()."_".$file->getClientOriginalName();
                $request["gallery_id"] = $id;
                $request["image"] = $imageName;
                $file->move(\public_path("/images"), $imageName);
                Image::create($request->all());
            }
        }

        return redirect('/manage-gallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */

     // Deleting a Gallery including all images
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if(File::exists("display_images/".$gallery->display_image))
        {
            File::delete("display_images/".$gallery->display_image);
        }

        $images = Image::where("gallery_id", $gallery->id)->get();
        foreach($images as $image)
        {
            if(File::exists("images/".$image->image))
            {
                File::delete("images/".$image->image);
            }
        }
        $gallery->delete();
        return back();
    }
}
