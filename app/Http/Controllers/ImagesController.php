<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateImageRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Image;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateImageRequest $request)
    {
        // uploaded vinyl cover or URL
        if($request->hasFile('imageFile')){
              $path = public_path() . '/images';
              $file = $request->file('imageFile');
              $fileName =  time(). '_' .$file->getClientOriginalName();
              $file->move($path,$fileName);
              $image = '/images/' . $fileName;
        }
         $image = Image::create([
            'project_id' => $request->input('project_id'),
            'position' => 1,
            'filename' => $image
        ]);
        if($image){
            flash()->success('Image uploaded successfully!');
        }
        else{
            flash()->error('Oops! Something went wrong.');
        }
        return redirect(route('backend'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
