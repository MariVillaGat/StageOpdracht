<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PointsController extends Controller
{
    public function addPointsAdmin(Request $request)
    {
        // Retrieve the user ID and points from the request
        $userId = $request->input('user_id');
        $points = $request->input('points');

        // Find the user by ID and update their score
        $user = User::findOrFail($userId);
        $user->points += $points;
        $user->save();

        // Redirect back to the previous page with a success message
        return redirect()->back()->with('success', 'Points added successfully!');
    }

    public function showPoints()
    {
        // Retrieve all users with their scores
        $users = User::select('id', 'name', 'points')->get();

        // Pass the users data to the view
        return view('users.points', compact('users'));
    }
}
