<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateImageRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Image;
use Storage;
use Resizer;

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
              $path = public_path() . '/uploads';
              $file = $request->file('imageFile');
              $fileName =  time(). '_' .$file->getClientOriginalName();
              $file->move($path,$fileName);
              $image = $fileName;
        }
         $image = Image::create([
            'project_id' => $request->input('project_id'),
            'position' => 1,
            'filename' => $image
        ]);
        if($image){
            $filename = substr($image->filename, 0, -4);
            // Resize image
            $img640 = Resizer::make('uploads/'.$image->filename)->widen(640);
            $img1280 = Resizer::make('uploads/'.$image->filename)->widen(1280);
            $img1920 = Resizer::make('uploads/'.$image->filename)->widen(1920);
            $img2560 = Resizer::make('uploads/'.$image->filename)->widen(2560);
            // Save images
            $img640->save('uploads/'.$filename.'_640.png');
            $img1280->save('uploads/'.$filename.'_1280.png');
            $img1920->save('uploads/'.$filename.'_1920.png');
            $img2560->save('uploads/'.$filename.'_2560.png');
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
        $image = Image::find($id);
        $filename = substr($image->filename, 0, -4);
        $extension = substr($image->filename, -3);
        $image->delete();

        if(file_exists(public_path().'/uploads/'.$image->filename)){
            unlink(public_path().'/uploads/'.$image->filename);
        }

        if(file_exists(public_path().'/uploads/'.$filename.'_640.'.$extension)){
            unlink(public_path().'/uploads/'.$filename.'_640.'.$extension);
        }

        if(file_exists(public_path().'/uploads/'.$filename.'_1280.'.$extension)){
            unlink(public_path().'/uploads/'.$filename.'_1280.'.$extension);
        }

        if(file_exists(public_path().'/uploads/'.$filename.'_1920.'.$extension)){
            unlink(public_path().'/uploads/'.$filename.'_1920.'.$extension);
        }

        if(file_exists(public_path().'/uploads/'.$filename.'_2560.'.$extension)){
            unlink(public_path().'/uploads/'.$filename.'_2560.'.$extension);
        }

        flash()->info('Image deleted successfully.');
        return redirect(route('backend'));
    }
}
