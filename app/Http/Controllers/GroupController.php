<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function store()
    {
        $group = Group::create(['name' => request('name')]);
    
        $users = collect(request('users'));
        $users->push(auth()->user()->id);
    
        $group->users()->attach($users);
    }
}
