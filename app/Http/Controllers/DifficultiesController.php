<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Difficulty;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DifficultiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolId = Auth::user()->school_id;
        $difficulties = Difficulty::where(['school_id' => $schoolId])->get();
        
        return view('difficulties/index', ['difficulties' => $difficulties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('difficulties/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rData = $request->all();
        $validator = Validator::make($rData, [
            'name' => 'required|string|min:2|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $difficulty = new Difficulty();
        $difficulty->fill($rData);
        $difficulty->school_id = Auth::user()->school_id;
        $difficulty->created_at = date('Y-m-d H:i:s');
        $difficulty->save();

        return redirect('difficulties/' . $difficulty->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $difficulty = Difficulty::where('id', $id)->first();

        return view('difficulties/view', ['difficulty' => $difficulty]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $difficulty = Difficulty::where('id', $id)->first();
        return view('difficulties/update', ['difficulty' => $difficulty]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $difficulty = Difficulty::where('id', $id);
        $difficulty->update($request->except(['_method', '_token']));

        return redirect('difficulties/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Difficulty::where('id', $id)->delete();
        return redirect()->back();
    }
}
