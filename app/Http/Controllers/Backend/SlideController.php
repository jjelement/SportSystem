<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Slide\CreateSlideRequest;
use App\Http\Requests\Slide\UpdateSlideRequest;
use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::orderBy('id', 'DESC')->paginate();
        return view('backend.slide.index', ['slides' => $slides]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSlideRequest $request)
    {
        $slide = $request->validated();
        $slide['link'] = Str::start($slide['link'], 'https://');

        $extension = $request->profileImage->extension();
        $slide['profileImage'] = $request->profileImage->storeAs('images/slides', time().'.'.$extension);
        $slide['created_at'] = now();
        $slide['updated_at'] = now();

        $event = new Slide($slide);
        $event->save();

        return redirect()->route('backend.slide.index')->with('success', 'เพิ่ม Slide: <b>'.$slide['title'].'</b> เรียบร้อย');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        return view('backend.slide.edit', ['slide' => $slide]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSlideRequest $request, Slide $slide)
    {
        $slideData = $request->validated();
        $slideData['link'] = Str::start($slideData['link'], 'https://');

        if($request->hasFile('profileImage')) {
            $extension = $request->profileImage->extension();
            @Storage::delete($slide->profileImage);
            $slideData['profileImage'] = $request->profileImage->storeAs('images/slides', time().'.'.$extension);
        }
        $slideData['updated_at'] = now();
        $slide->update($slideData);
        return redirect()->route('backend.slide.edit', $slide->id)->with('success', 'แก้ไข Slide: <b>'.$slide['title'].'</b> เรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
