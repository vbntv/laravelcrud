<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Student;

class GroupController extends Controller
{
    public function getAllGroups()
    {
       return Group::all();
    }

    public function addClass(Request $r)
    {
        $group = new Group;  
        $r->validate([
            'litera' => 'required|min:1|max:1|regex:/[а-в]/u',
            'numbergroup' => 'required|max:2|min:1',
            'group' => 'unique:groups'
        ]);
        $group->group = $r->numbergroup.$r->litera;
        $group->litera = 'а';
        $group->numbergroup = $r->numbergroup;
        $group->save();
    }
}
