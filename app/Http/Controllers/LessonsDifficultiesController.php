<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\File;
use App\Models\LessonsDifficulties;
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
