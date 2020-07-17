<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;

class userManagmentController extends Controller
{
  public function index()
  {
    $user = User::all();
    //    $projects2 = Project::orderBy('created_at', 'DESC')->paginate(1);
    return view('auth/userManagment', compact('user'));
  }

  public function update(User $user)
  {
    $user->is_enabled = request('changeStatus');
    $user->save();
    return back()->with('status','El usuario fue actualizado exitosamente');
  }
}
