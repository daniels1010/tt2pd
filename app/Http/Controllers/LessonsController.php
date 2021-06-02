<?php

namespace App\Http\Controllers;

use App\Models\Difficulty;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\File;
use App\Models\LessonsDifficulties;
use App\Models\UserLessons;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LessonsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $isTeacher = $user->isTeacher();
        $isAdmin = $user->isAdmin();


        if ($isTeacher) {
            $lessons = Lesson::where('school_id', $user->school_id)->get();
        } else {
            $asssignedLessonIds = UserLessons::where('user_id',$user->id)->pluck('lesson_id');
            $lessons = Lesson::whereIn('id',$asssignedLessonIds)->get();
        }
        //var_dump($lessons->get()); die();
        return view('lessons/index', [
            'user' => $user,
            'lessons' => $lessons, 
            'isTeacher' => $isTeacher,
            'isAdmin' => $isAdmin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $schoolId = $request->user()->school_id;
        $files = File::where(['school_id' => $schoolId])->pluck('name', 'id');
        return view('lessons/create', ['files' => $files]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:5|max:50',
            'description' => 'string|min:2|max:255|nullable',
            'poster_url' => 'required|string|min:5|max:500',
            'file_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } 

        $userId = Auth::user()->id;
        $schoolId = Auth::user()->school_id;
        $lesson = new Lesson();
        $lesson->fill($request->all());
        $lesson->school_id = $schoolId;
        $lesson->author_id = $userId;
        $lesson->created_at = date('Y-m-d H:i:s');
        $lesson->save();

        return redirect('lessons/' . $lesson->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::where('id', $id)->first();
        $file = File::where('id', $lesson->file_id)->get();
        return view('lessons/view', ['lesson' => $lesson, 'file' => $file]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $lesson = Lesson::where('id', $id)->first();
        $schoolId = $request->user()->school_id;
        $files = File::where(['school_id' => $schoolId])->pluck('name', 'id');
        return view('lessons/update', ['lesson' => $lesson, 'files' => $files]);
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
        $lesson = Lesson::where('id', $id);
        $lesson->update($request->except(['_method', '_token']));

        return redirect('lessons/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lesson::where('id', $id)->delete();
        return redirect('lessons');
    }

    public function addDifficulties($id){
        $lesson = Lesson::where('id', $id)->first();    
        $lessonDifficulties = $lesson->lessonDifficulties;
        $usedDiffIds = $lesson->lessonDifficulties->pluck('difficulty_id');
        $availableDifficulties = Difficulty::whereNotIn('id', $usedDiffIds)->pluck('name', 'id');

        return view('lessons/add-difficulty', [
            'lessonDifficulties' => $lessonDifficulties, 
            'lessonId' => $id,
            'schoolDifficulties' => $availableDifficulties,
        ]);
    }

    public function saveDifficulty(Request $request, $id){
        $rData = $request->all();
        $validator = Validator::make($rData, [
            'value' => 'required|integer|min:0|max:10',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $lessonDiff = new LessonsDifficulties();
        $lessonDiff->fill($rData);
        $lessonDiff->lesson_id = $id;
        $lessonDiff->created_at = date('Y-m-d H:i:s');
        $lessonDiff->save();

        return redirect()->back();
    }
}
