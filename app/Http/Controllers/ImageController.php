<?php

namespace App\Http\Controllers;

use Amranidev\Ajaxis\Ajaxis;
use App\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use URL;

/**
 * Class ImageController.
 *
 * @author  The scaffold-interface created at 2019-06-09 11:34:56pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class ImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:image-list', ['only' => ['index']]);
        $this->middleware('permission:image-create', ['only' => ['create', 'store', 'createInfo']]);
        $this->middleware('permission:image-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:image-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - image';

        if (auth()->user()->hasRole('client')) {
            $images = Image::all()->where('user_id', '=', auth()->user()->id);
        } else {
            $images = Image::all();
        }

        return view('image.index', compact('title', 'images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - image';

        $users = User::all()->where('role_user', '=', 2)->pluck('name', 'id');
        return view('image.create', compact('title', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//dd($request->all());
        $image = new Image();


        $image->user_id = $request->user_id;

        $file = $request->file('image');
        $content = $file->openFile()->fread($file->getSize());
        $image->image = $content;


        $image->filename = $request->image->getClientOriginalName();


        $image->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
            'test-event',
            ['message' => 'A new image has been created !!']);

        return redirect('images');
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $image = Image::find($id);

        if (auth()->user()->hasRole('client')) {
            abort_if($image->user_id !== auth()->user()->id, '403');
        }
        $filename = $image->filename;

        $extension = explode(".", $filename);
        $extension = strtolower($extension[count($extension) - 1]);

        $headers = [
            "Content-Type" => "image/${extension}",
            "Content-Disposition" => "inline; filename=\"${filename}\""
        ];

        return response($image->image, 200, $headers);
    }

    /**
     * Show the form for editing the specified resource.
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $title = 'Edit - image';
        if ($request->ajax()) {
            return URL::to('image/' . $id . '/edit');
        }


        $image = Image::findOrfail($id);
        return view('image.edit', compact('title', 'image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id, Request $request)
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
     * @param \Illuminate\Http\Request $request
     * @return  String
     */
    public function DeleteMsg($id, Request $request)
    {
        $msg = Ajaxis::MtDeleting('Warning!!', 'Would you like to remove This?', '/image/' . $id . '/delete');

        if ($request->ajax()) {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrfail($id);
        $image->delete();
        return redirect()->route('images.index');
    }
}
