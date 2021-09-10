<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::where('user_id'  , Auth::user()->id)->get();
        $course_member = array();
        foreach($courses as $course ){
            $members = Member::whereHas('courses', function($q) use($course){
                $q->where('id' , $course->id);
            })->count();
            array_push($course_member , [
                'id' => $course->id,
                'name'=> $course->name,
                'description' => $course->description,
                'course_fee' => $course->course_fee,
                'members' => $members,
            ]);
        }

        return view('courses.index')->with('courses',$course_member);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    public function newCourse()
    {
        return view('courses.new_course');
    }
    
    public function save(Request $request){

        Course::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'course_fee' => $request->input('course_fee'),
            'user_id' => Auth::user()->id
        ]);

        return redirect('/choose-course')->with('success', 'Course created');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Course::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'course_fee' => $request->input('course_fee'),
            'user_id' => Auth::user()->id
        ]);

        return redirect('/courses')->with('success', 'Course created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('courses.edit')->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $course->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'course_fee' => $request->input('course_fee'),
            'user_id' => Auth::user()->id
        ]);

        return redirect('/courses')->with('success', 'Course updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::where('id',$id);
        $course->delete();
        return redirect('/courses')->with('success', 'Course deleted');
    }

    public function chooseCourse(){

        $courses = Course::where('user_id'  , Auth::user()->id)->get();

        return view('courses.choose-course')->with('courses',$courses);
    }
}
