<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use App\Mail\SigninEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Crypt;
use DB;
 
class AuthController extends Controller
{
    /**
     * Processes the login form
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     **/


    public function login(Request $request)
    {
        $phone_number = $_POST['phone_number'];
        $phone_number = substr($phone_number, -9);
        $phone_number = 254 . $phone_number;        
        $password = $_POST['password'];
        
        $user = User::where('phone_number', '=', $phone_number)                    
            ->first();

        $user_password = DB::table('users')
        ->select('password')  
        ->where('phone_number', '=', $phone_number)             
        ->pluck('password');

        $user_password = Crypt::decrypt($user_password);

        if ($user_password != $password) {
            // invalid credentials

            return redirect()->to('/login')->with('error', 'Your phone number and password do not match');

        }else{


            Auth::login($user);
            
            return redirect()->to('/dashboard-profile');
            }        
    }
 
    /**
     * Processes the actual login
     *
     * @param \Illuminate\Http\Request $request
     * @return redirect
     **/
    public function signIn(Request $request)
    {
       // Check if the URL is valid
    if (!$request->hasValidSignature()) {
        abort(401);
    }
 
    // Authenticate the user
    $user = User::findOrFail($request->user);
    Auth::login($user);

    // Redirect to homepage
    return redirect('/dashboard');
    }
 
    /**
     * Processes the logout
     *
     * @param \Illuminate\Http\Request $request
     * @return redirect
     **/
    public function logout(Request $request)
    {
        // logout
    Auth::logout();
 
    // Redirect to homepage
    return redirect('/');
    }

    public function mobileSignIn(Request $request){
        // find the user for the email - or create it.
        $user = User::firstOrCreate(
            ['phone_number' => $request->post('phone_number')],
            ['name' => $request->post('email'), 'password' => Str::random()]
        );

        // create a signed URL for login
        $url = URL::temporarySignedRoute(
            'sign-in',
            now()->addMinutes(30),
            ['user' => $user->id]
        );

        // send the email
        Mail::send(new SigninEmail($user, $url));
 
        // inform the user
        return view('login-sent');
    }

}