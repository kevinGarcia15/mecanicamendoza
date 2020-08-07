<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\DB;

class userManagmentController extends Controller
{
  public function index()
  {
    $user = User::all();
    return view('auth/userManagment', compact('user'));
  }

  public function update(User $user)
  {
    $user->is_enabled = request('changeStatus');
    $user->save();
    return back()->with('status','El usuario fue actualizado exitosamente');
  }

  public function edit($id)
  {
    $user = User::findOrFail($id);
    return view('auth/editUser', compact('user'));
  }

  public function updateUser($userId)
  {
    $user = request()->validate([
      'name'=>'required',
      'email'=>'required',
      'rol'=>'required',
    ]);
    User::where('id', $userId)->update($user);
    return redirect()->route('userManagment')->with('status','El usuario fue actualizado exitosamente');
  }
}
