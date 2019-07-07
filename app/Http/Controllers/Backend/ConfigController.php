<?php

namespace App\Http\Controllers\Backend;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configs = Config::get();
        return view('backend.config.index', ['configs' => $configs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Config $config)
    {
        return view('backend.config.edit', ['config' => $config]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Config $config)
    {
        $config->update(['value' => $request->value]);
        return redirect()->route('backend.config.edit', $config->id)->with('success', 'แก้ไข Config: <b>'.$config->key.'</b> เรียบร้อย');
    }
}
