<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Http\Controllers\UploadHelperController;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('list_image', ['images' => Image::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        //$upload_helper = new UploadHelperController; 
        //$result = $upload_helper->upload($image->getRealPath(), $image->getClientOriginalName());
        $result = UploadHelperController::upload($image->getRealPath(), $image->getClientOriginalName()); 
        Image::create(['image' => $result]);
        return redirect()->route('images.index')->withSuccess('berhasil upload');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        return view('upload_update', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $file = $request->file('image');
        //$upload_helper = new UploadHelperController;
        //$result = $upload_helper->replace($image->image, $file->getRealPath(), $file->getClientOriginalName());
        $result = UploadHelperController::replace($image->image, $file->getRealPath(), $file->getClientOriginalName());
        $image->update(['image' => $result]);
        return redirect()->route('images.index')->withSuccess('berhasil upload');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {   
        //$upload_helper = new UploadHelperController;
        //$upload_helper->delete($image->image);
        $check = UploadHelperController::delete($image->image);
        $image->delete();
        return redirect()->route('images.index')->withSuccess('berhasil hapus');;
    }
}
