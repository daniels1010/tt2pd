<?php

namespace App\Http\Controllers;

use App\Models\LessonsDifficulties;
class LessonsDifficultiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LessonsDifficulties::where('id', $id)->delete();
        return redirect()->back();
    }
}
