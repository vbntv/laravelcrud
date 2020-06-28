<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Group;

class StudentController extends Controller
{
    public function getAllStudents(){
        return Student::all();
    }

    public function addStudent(Request $r){


        $r->validate([
            'firstname' => 'required|min:2|max:20|regex:/[А-Яа-я]/u',
            'lastname' => 'required|min:2|max:20|regex:/[А-Яа-я]/u',
            'sname' => 'required|min:2|max:20|regex:/[А-Яа-я]/u',
            'birthdate' => 'required|min:8|regex:/[А-Яа-я.]/u'
        ]);
  
        $student = new Student;
        $group = Group::where('group', '=', $r->groupcreate)->first();
        $student->firstname = $r->firstname;
        $student->lastname = $r->lastname;
        $student->sname = $r->sname;
        $student->birthdate = $r->birthdate;
        $student->gender = $r->gender;
        $student->group_id = $group->id;
        $student->save();
    
    }
}
