<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Exception;
use Twilio\Rest\Client;
   
class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'country_code' => ['required'],
            'phone_number' => ['required', 'numeric', 'unique:users'],
            'confirm_password' => 'required|same:password',
            'age' => ['required', 'numeric'],
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input = $request->all();
        $phone_number = $input['country_code'].$input['phone_number'];

        //return response()->json($phone_number);
        
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        $success['name'] =  $input['name'];
        return $this->sendResponse($success, 'Registration successfully.');
    }

    /** verfiy */
    protected function verify(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone_number' => ['required', 'string'],
        ]);

        $user = User::where('phone_number', $data['phone_number'])->first();
        return response()->json($user);

        if($user->phone_otp == $data['verification_code']){
            $user = tap(User::where('phone_number', $data['phone_number']))->update(['isVerified' => true]);
            /* Authenticate user */
            Auth::login($user->first());
            return $this->sendResponse(null, 'User verfication successfully.');
        }else{
            return $this->sendError('Invalid verification code entered!.', ['error'=>'Unauthorised']);
        }


        // if ($verification->valid) {
        //     $user = User::where('phone_number', $data['phone_number'])->update(['isVerified' => true]);
        //     /* Authenticate user */
        //     Auth::login($user->first());
        //     $success['message'] = 'Phone number verified';
        //     // $success['name'] =  $user->name;
        //     // return redirect()->route('home')->with(['message' => 'Phone number verified']);
        //     return $this->sendResponse(null, 'OTP sent successfully.');
        // }


        // $token = getenv("TWILIO_AUTH_TOKEN");
        // $twilio_sid = getenv("TWILIO_SID");
        // $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        // $twilio = new Client($twilio_sid, $token);
        // $verification = $twilio->verify->v2->services($twilio_verify_sid)
        //     ->verificationChecks
        //     ->create($data['verification_code'], array('to' => $data['phone_number']));
        // if ($verification->valid) {
        //     $user = tap(User::where('phone_number', $data['phone_number']))->update(['isVerified' => true]);
        //     /* Authenticate user */
        //     Auth::login($user->first());
        //     $success['message'] = 'Phone number verified';
        //     // $success['name'] =  $user->name;
        //     // return redirect()->route('home')->with(['message' => 'Phone number verified']);
        //     return $this->sendResponse(null, 'OTP sent successfully.');
        // }
        // return $this->sendError('Invalid verification code entered!.', ['error'=>'Unauthorised']);
    }

    protected function username()
    {
        $loginField = request()->input('login_field');
        $field = filter_var($loginField, FILTER_VALIDATE_EMAIL) ? 'email' : (is_numeric($loginField) ? 'phone' : 'username');
        request()->merge([$field => $loginField]);
        return $field;
    }
   
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request)
    {
        $loginField = $request->input('login_field');
        $credentials = [
            $this->username() => $loginField,
            'password' => $request->input('password'),
        ];
    
        if (auth()->attempt($credentials)) {
            $user = auth()->user();
    
            if (!$user->device_id) {
                $device_id = $request->input('device_id');
                $user->update(['device_id' => $device_id]);
            } elseif ($user->device_id !== $request->input('device_id')) {
                auth()->logout();
                return $this->sendError('Unauthorised.', ['error' => 'Device ID is already in use.'], 401);
            }
    
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;
            return $this->sendResponse($success, 'User login successfully.');
        }
    
        // Authentication failed
        return $this->sendError('Unauthorised.', ['error' => 'Invalid login credentials.'], 401);
    }
     
    
}