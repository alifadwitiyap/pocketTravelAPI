<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiaryRequest;
use App\Http\Requests\UpdateDiaryRequest;
use App\Models\Diary;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
            $data = Diary::all()->where('user_id', Auth::id());
            return response()->json([ "data" => $data ], 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiaryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiaryRequest $request)
    {
        if(Auth::check())
        {
            $diary = new Diary;
            $diary->user_id = Auth::id();
            $diary->country = $request->country;
            $diary->location = $request->location;
            $diary->image = $request->image;
            $diary->caption = $request->caption;
            $diary->date = $request->date;

            $diary->save();
            return response()->json([], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function show(Diary $diary)
    {
        if(Auth::check() && Auth::id() == $diary->user_id)
        {
            return response()->json([ 'data' => $diary ], 200);
        }
        return response()->json([], 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function edit(Diary $diary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiaryRequest  $request
     * @param  \App\Models\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiaryRequest $request, Diary $diary)
    {
        if(Auth::check() && Auth::id() == $diary->user_id)
        {
            $diary = Diary::find($diary->_id);
            $diary->user_id = Auth::id();
            $diary->country = $request->country;
            $diary->location = $request->location;
            $diary->image = $request->image;
            $diary->caption = $request->caption;
            $diary->date = $request->date;
            $diary->save();

            return response()->json([], 204);
        }
        return response()->json([], 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diary $diary)
    {
        if(Auth::check() && Auth::id() == $diary->user_id)
        {
            $diary = Diary::find($diary->_id);
            $diary->delete();

            return response()->json([], 204);
        }
        return response()->json([], 403);
    }
}
