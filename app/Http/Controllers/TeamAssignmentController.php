<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class TeamAssignmentController extends Controller
{
    public function index(Request $request, string $id)
    {
        if (!view()->exists("team.$id")) {
            return abort(404);
        }

        $roleList = Role::all()->map(fn ($role) => $role->name)->toArray();

        return view("team.$id", ['roleList' => $roleList]);
    }
}
