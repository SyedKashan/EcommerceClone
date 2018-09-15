<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{   public function login(Request $request){
        if($request->isMethod('post')){
$data = $request->input();
if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1'])){
    // Session::put('admin_session',$data['email']);
    return redirect('/admin/dashboard');
}
else{
    return redirect('/admin')->with('flash_message_error','please provide valid credentials!');
 }
}

        return view('admin/admin_login');

    }

    public function dashboard()
{
    // if(Session::has('admin_session')){
        return view('admin/dashboard');
    // }
    // else{

    //     return redirect('/admin')->with('flash_message_error','Please login to continue!');
    // }
    
}

public function logout(){

    Session::flush();
    return redirect('/admin')->with('flash_message_error','logout Successfully!');
}

public function settings(){

    return view('admin/settings');
}
public function chkpswd(Request $request){
    
    $data = $request->all();
    $current_pass = $data['pwd'];
    $chk_pwd = User::where(['admin'=> '1'])->first();
    if(hash::check($current_pass,$chk_pwd->password)){
    echo "true";
}
    else{
        echo "false";
    }
}

public function updatepassword(Request $request){
    if ($request->isMethod('post')){
        $data = $request->all();
       $chk_password= User::where(['email'=> Auth::user()->email])->first();
       $current_password = $data['pwd'];
       if(hash::check($current_password,$chk_password->password)){
       $newpass = bcrypt($data['pwd1']);
       User::where(['password'=>Auth::user()->password])->update(['password'=>$newpass]);
        return redirect('/admin/settings')->with('flash_message_error','Successfully Updated');
    }
        else{
            return redirect('/admin/settings')->with('flash_message_error','Error in Updating');
        }
    }

}
}

