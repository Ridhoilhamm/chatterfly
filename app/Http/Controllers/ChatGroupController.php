<?php

namespace App\Http\Controllers;

use App\Models\chatGroup;
use App\Models\ChatGroupMember;
use Illuminate\Http\Request;

class ChatGroupController extends Controller
{
    public function index()
    {
        $groups = ChatGroup::with('members')->get();
        return response()->json($groups);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $group = chatGroup::create([
            'name' => $request->name,
            'created_by' => Auth::id(),
        ]);

        // Tambahkan admin sebagai member pertama
        ChatGroupMember::create([
            'group_id' => $group->id,
            'user_id' => Auth::id(),
        ]);

        return response()->json(['message' => 'Group created', 'group' => $group]);
    }

    public function addMember(Request $request, $groupId)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        ChatGroupMember::create([
            'group_id' => $groupId,
            'user_id' => $request->user_id,
        ]);

        return response()->json(['message' => 'Member added']);
    }
}
