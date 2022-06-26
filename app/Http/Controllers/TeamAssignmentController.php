<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamAssignmentController extends Controller
{
    public function index(Request $request, string $id)
    {
        if (!view()->exists("team.$id")) {
            return abort(404);
        }

        return view("team.$id");
    }
}
