<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class UsersController extends Controller
{
	public function index() {
		
		$loggedInUser = \Auth::user();
		
		$users = User::where('id', '!=', $loggedInUser->id)
				->orderBy('name')->get();
		
		return view('admin.users.index', [
			'users' => $users
		]);
		
	}
	
	public function add() {
		
		return view('admin.users.add');
	}
	
	public function insert() {
		
		$request = request();
		
		$formData = $request->validate([
			'name' => 'required|string|min:2',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|string|min:5',
			'password_confirmation' => 'required|same:password'
		]);
		
		$user = new User($formData);
		
		$user->password = bcrypt($formData['password']);
		
		$user->save();
		
		return redirect()->route('admin.users.index')
				->with('systemMessage', 'User has been added!');
	}
	
	public function edit($id) {
		
		$loggedInUser = \Auth::user();
		
		if ($loggedInUser->id == $id) {
			//logged in user is trying to edit himself
			return abort(404);
		}
		
		$user = User::findOrFail($id);
		
		return view('admin.users.edit', [
			'user' => $user
		]);
	}
	
	public function update($id) {
		$loggedInUser = \Auth::user();
		
		if ($loggedInUser->id == $id) {
			//logged in user is trying to edit himself
			return abort(404);
		}
		
		$user = User::findOrFail($id);
		
		$request = request();
		
		$formData = $request->validate([
			'name' => 'required|string|min:2',
			'email' => 'required|email|unique:users,email,' . $user->id,
		]);
		
		$user->fill($formData);
		$user->save();
		
		return redirect()->route('admin.users.index')
				->with('systemMessage', 'User has been saved');
	}
	
	public function delete() {
		
	}
	
	public function checkEmail() {
		
		$request = request();
		
		$email = $request->input('email');
		$excludeId = (int) $request->input('exclude_id');
		
		if (empty($email)) {
			return response()->json('Please enter email');
		}
		
		$userWithEmail = User::where('email', '=', $email)->first();
		
		if (!empty($userWithEmail) && $userWithEmail->id != $excludeId) {
			
			return response()->json('Emial is not available');
		}
		
		return response()->json(true);
	}
}
