<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Album;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class AlbumController.
 *
 * @author  The scaffold-interface created at 2019-06-09 11:09:35pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class AlbumController extends Controller
{
    public function getList()
    {
        $albums = Album::with('Photos')->get();
        return view('album.index')
            ->with('albums',$albums);
    }
    public function getAlbum($id)
    {
        $album = Album::with('Photos')->find($id);
        return View::make('album')
            ->with('album',$album);
    }
    public function getForm()
    {
        return View::make('createalbum');
    }
    public function postCreate()
    {
        $rules = array(

            'name' => 'required',
            'cover_image'=>'required|image'

        );

        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){

            return Redirect::route('create_album_form')
                ->withErrors($validator)
                ->withInput();
        }

        $file = Input::file('cover_image');
        $random_name = str_random(8);
        $destinationPath = 'albums/';
        $extension = $file->getClientOriginalExtension();
        $filename=$random_name.'_cover.'.$extension;
        $uploadSuccess = Input::file('cover_image')
            ->move($destinationPath, $filename);
        $album = Album::create(array(
            'name' => Input::get('name'),
            'description' => Input::get('description'),
            'cover_image' => $filename,
        ));

        return Redirect::route('show_album',array('id'=>$album->id));
    }

    public function getDelete($id)
    {
        $album = Album::find($id);

        $album->delete();

        return Redirect::route('index');
    }
}
