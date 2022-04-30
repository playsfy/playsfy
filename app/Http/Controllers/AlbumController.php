<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('album.create');
    }

    public function list($username)
    {
        return view('album.list', [
            'user' => User::where('username', $username)->first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $validated = $request->validate([
            'albumname' => 'required | max:255',
            'artistname' => 'required | max:64',
            'year' => 'required'
            //'albumart' => 'required'
        ]);

        $unq; $loopx = true;
        while($loopx) {
            $unq = $this->createRandomIdentifier(3) . '-' . $this->createRandomIdentifier(3);
            if(Album::where('identifier' , $unq)->count() == 0) {
                $loopx = false;
            } 
            else {
                $loopx = true;
            }
        }

        if($request->hasFile('albumart')){
            $filenameWithExt = $request->file('albumart')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('albumart')->getClientOriginalExtension();
            $fileNameToStore= 'music_album_'.time().'.'.$extension;
            $path = $request->file('albumart')->move('uploads/images/album', $fileNameToStore);
        } else {
            $fileNameToStore = null;
        }

        $data = new Album;

        $data->identifier = $unq;
        $data->title = $request->albumname;
        $data->artist = $request->artistname;
        $data->year = $request->year;
        $data->description = $request->description;
        $data->art = $fileNameToStore;
        $data->user_id = Auth::user()->id;

         
        if ($data->save()) {
            $request->session()->flash('success', 'Successfully added album');
            return redirect('/'.Auth::user()->username.'/albums');
        } 
        
        //dd($request->all());
    }
    
    public function createRandomIdentifier($length = 6)
    {
        $characters = 'aceimnorsuvwxz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album, $username, $albumid)
    {
        $albuminfo = $album->where('identifier', $albumid)->first();

        return view('album.show', [
            'album' => $albuminfo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
    }
}
