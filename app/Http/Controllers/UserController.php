<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    //Show register/create form
    public function create(){
        return view('users.register');
    }

    //Create new user
    public function store(Request $request){
        $formFields = $request->validate([
        'name'=> ['required', 'min:3'],
        'email' => ['required', 'email', Rule::unique('users','email')],
        'password' => 'required|confirmed|min:6'
    ]);

    //Hash password
   $formFields['password']= bcrypt($formFields['password']);

   // Create user
   $user = User::create($formFields);

   //Login
   auth()->login($user);

    return redirect('/')->with('message', 'User created and logged in successfully!');

    }

    //Logout
    public function logout(Request $request){
    auth()->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('message', 'You have been logged out!');
    }

    //Show login form
    public function login(){
        return view('users.login');
    }

     // Authenticate user
     public function authenticate(Request $request)
     {
         $formFields = $request->validate([
             'email' => ['required', 'email'],
             'password' => 'required'
         ]);
 
         if (auth()->attempt($formFields)) {
             $request->session()->regenerate();
 
             // Check user's role
             if (auth()->user()->role == 1) {
                 return redirect('/admin/admin')->with('message', 'You are logged in as Admin!');
             }
 
             return redirect('/')->with('message', 'You are now logged in!');
         }
 
         return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
     }


    // Administrat
    //show all users
    public function index(Request $request)
    {
        $search = $request->input('search');
        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'LIKE', '%'.$search.'%')
                         ->orWhere('email', 'LIKE', '%'.$search.'%');
        })->get();
    
        return view('admin.users', compact('users'));
    }

    
   //Show single user
   public function show($id)
    {
        $user = User::find($id);
        return view('admin.user', ['user' => $user]);
    }

     // Show edit form for user
   public function edit(User $user)
   {
       return view('admin.edit-user', ['user' => $user]);
   }

   // Update user details
   public function update(User $user, Request $request)
   {
       $formFields = $request->validate([
           'name'=> ['required', 'min:3'],
           'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
           'password' => 'nullable|confirmed|min:6'
       ]);

       if(isset($formFields['password'])) {
           $formFields['password'] = bcrypt($formFields['password']);
       } else {
           unset($formFields['password']);
       }

       $user->update($formFields);

       return redirect('/admin/users')->with('message', 'User details updated successfully!');
   }

   public function destroy(User $user) {
    $user->delete();
    return redirect('/admin/users')->with('message', 'User deleted successfully!');
   }

}





