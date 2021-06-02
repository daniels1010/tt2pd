<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\UserLessons;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($user->isTeacher()){
            $school = $user->school;
            $students = $school->getStudents()->get();
            return view('users/index', [
                'students' => $students,
                'type' => 2,
                'school_id' => $user->school->id,
            ]);
        }  
        return view('users/index', [
            'students' => User::all(),
            'type' => 1,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        $assignedLessonIds = UserLessons::where(['user_id' => $id])->pluck('lesson_id');
        $availableLessons = Lesson::whereNotIn('id', $assignedLessonIds)->where('school_id',$user->school_id)->get();
        $assignedLessons = Lesson::whereIn('id', $assignedLessonIds)->get();
        //var_dump($availableLessons); die();
        return view('users/view', [
            'assignedLessons' => $assignedLessons,
            'availableLessons' => $availableLessons,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
  
        return view('users/update')->with('user', $user);
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
        $user = User::where('id', $id);
        $user->update($request->except(['_method', '_token']));

        return redirect('users/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back();
    }

    public function assignLesson(Request $request){
        $userLesson = new UserLessons();
        $userLesson->fill($request->all());
        $userLesson->save();

        return redirect()->back();
    }
}
