<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use App\Models\Course;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($course_id)
    {
        Session::put(['course_id' => $course_id]);

        $courses_count = Course::where('user_id'  , Auth::user()->id)->count();
        $members_count = $this->allMembersPerUser();
        $paid_members_count = $this->paidCourses();
       // $income = $this->income();
        return view('dashboard', compact('course_id', 'courses_count' ,'members_count', 'paid_members_count'));
        
    }
    public function redirectSuperadmin(){
        return view('superadmin.superadminDashboard');
    }

    public function activeAndNonActiveMembers(){
        $members = Member::where('cours');

        $active_members = Member::where('is_active', 1)->count();
        $non_active_members = Member::where('is_active', 0)->count();

        $activeAndNonActiveMembers = array(
            'active_members' => $active_members,
            'non_active_members' => $non_active_members
        );

        return $activeAndNonActiveMembers;
       
    }

    public function membersPerCourse(){
        $courses = Course::where('user_id'  , Auth::user()->id)->get();
        
        $course_names = array();
        $members_count = array();
        foreach($courses as $course ){
            $members = Member::whereHas('courses', function($q) use($course){
                $q->where('id' , $course->id);
            })->count();
            array_push($course_names, $course->name);
            array_push($members_count, $members);
        }
        $course_member = array(
            'courses_names' => $course_names,
            'members' => $members_count
        );
        return $course_member;
    }

    public function allMembersPerUser(){
        $courses = Course::where('user_id'  , Auth::user()->id)->get();
        $all_members = 0;
        foreach($courses as $course ){
            $members = Member::whereHas('courses', function($q) use($course){
                $q->where('id' , $course->id);
            })->count();
            $all_members += $members;
        }
        return $all_members;
    }

    public function paidCourses(){
        $courses = Course::where('user_id'  , Auth::user()->id)->get();
        $all_members = 0;
        foreach($courses as $course ){
            $members = Member::whereHas('courses', function($q) use($course){
                $q->where('id' , $course->id)
                    ->where('paid' , 1);
            })->count();
            $all_members += $members;
        }
        return $all_members;
    }

    // public function income(){
    //     $courses = Course::where('user_id'  , Auth::user()->id)->get();
    //     $income = 0;
    //     foreach($courses as $course ){
    //         $members = Member::whereHas('courses', function($q) use($course){
    //             $q->where('id' , $course->id)
    //                 ->where('paid' , 1);
    //         })->sum('course_fee');
    //         $income += $members;
    //     }
    //     dd( $income);
    // }
}
