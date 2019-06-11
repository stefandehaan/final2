<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class ImageController.
 *
 * @author  The scaffold-interface created at 2019-06-09 11:34:56pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - image';
        $images = Image::paginate(6);
        return view('image.index',compact('images','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - image';
        
        return view('image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = new Image();

        
        $image->album_id = $request->album_id;

        
        $image->image = $request->image;

        
        $image->description = $request->description;

        
        
        $image->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new image has been created !!']);

        return redirect('image');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $title = 'Show - image';

        if($request->ajax())
        {
            return URL::to('image/'.$id);
        }

        $image = Image::findOrfail($id);
        return view('image.show',compact('title','image'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - image';
        if($request->ajax())
        {
            return URL::to('image/'. $id . '/edit');
        }

        
        $image = Image::findOrfail($id);
        return view('image.edit',compact('title','image'  ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $image = Image::findOrfail($id);
    	
        $image->album_id = $request->album_id;
        
        $image->image = $request->image;
        
        $image->description = $request->description;
        
        
        $image->save();

        return redirect('image');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     * @link      https://github.com/amranidev/ajaxis
     * @param    \Illuminate\Http\Request  $request
     * @return  String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/image/'. $id . '/delete');

        if($request->ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$image = Image::findOrfail($id);
     	$image->delete();
        return URL::to('image');
    }
}
