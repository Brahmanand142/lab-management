<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\Register; 

class RegisterController extends Controller
{
    //
    public function index(){
        return view('frontend.login.register');
    }

//        public function update(Request $request){
  
//    try{
//  $request->validate([
       
//         'email' => 'required|email|max:250',
//         'name' => 'required|string|max:250',
//         'password' => 'required|string|min:8|confirmed',
         
//     ]);

//     foreach($request->except('_token') as $key=> $value){
//         Register::updateOrCreate(['key' =>$key],['key' => $key ,'value' => $value]);
//     }

//     return redirect()->back();
//    }catch(\Exception $e){
//     dd($e);
//    }
//     }
 public function store(Request $request)
    {
        try {
            // Validate the incoming request data
            // This is the "validation" part
            $request->validate([
                'email' => 'required|email|max:250|unique:registers,email', // Ensure email is unique
                'name' => 'required|string|max:250',
                'password' => 'required|string|min:8|confirmed', // 'confirmed' checks for a password_confirmation field
            ]);

            // Create a new Register record
            // This is the "create" part
            Register::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password), // Hash the password before saving
                // Add any other fields you have in your 'registers' table
            ]);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Registration successful!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // If validation fails, Laravel automatically redirects back with errors
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Catch any other general exceptions
            // In a real application, you would log this error.
            return redirect()->back()->with('error', 'An error occurred during registration. Please try again.');
        }
    }
}


