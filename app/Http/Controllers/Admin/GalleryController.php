<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\Gallery;
use App\TravelPackage;
use File;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metaTitle = 'Halaman Gallery';
        $items = Gallery::all();
        return view('pages.admin.gallery.index', 
            [
                'items' => $items,
                'metaTitle' => $metaTitle,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $metaTitle = 'Halaman Tambah Gallery';
        $travel_package = TravelPackage::all();

        return view('pages.admin.gallery.create', 
            [
                'metaTitle' => $metaTitle,
                'travel_package' => $travel_package,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $data = $request->all();
        $data['images'] = $request->file('images')->store('assets/gallery', 'public');

        Gallery::create($data);
        return redirect()->route('gallery.index');
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
        $travel_package = TravelPackage::all();
        $gallery = Gallery::with('travel_package')->findOrFail($id);
        // dd($gallery);
        $metaTitle = 'Halaman Edit Gallery';
        
        return view('pages.admin.gallery.edit',
            [
                'gallery' => $gallery,
                'metaTitle' => $metaTitle,
                "travel_package" => $travel_package,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        $data = $request->all();
        $data['images'] = $request->file('images')->store('assets/gallery', 'public');

        $item = Gallery::findOrFail($id);
        File::delete('storage/'.$item->images);
        $item->update($data);

        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Gallery::findOrFail($id);
        $item->delete();

        return redirect()->route('gallery.index');
    }
}
