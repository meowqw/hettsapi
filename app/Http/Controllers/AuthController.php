<?php
namespace App\Http\Controllers;
use App\Http\Resources\LegalInformation\LegalInformationResource;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\PersonalInformation\PersonalInformationResource;
use App\Models\PersonalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
class AuthController extends Controller
{
    /**
     * Register a new user
     */
    public function register(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password'  => 'required|min:3|confirmed',
        ]);
        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json(['status' => 'success'], 200);
    }
    /**
     * Login user and return a token
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if ($token = $this->guard()->attempt($credentials)) {
            return response()->json(['status' => 'success', 'Authorization' => $token], 200);
        }
        return response()->json(['error' => 'login_error'], 401);
    }
    /**
     * Logout User
     */
    public function logout()
    {
        $this->guard()->logout();
        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }
    /**
     * Get authenticated user
     */
    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $user['orders'] = OrderResource::collection($user->orders()->get());
//        dd($user->personal()->get());
        if (count($user->personal()->get())) {
            $user['personal'] = $user->personal()->get();
        } else {
            $user['personal'] = null;
        }

        if (count($user->legal()->get())) {
            $user['legal'] = $user->legal()->get();
        } else {
            $user['legal'] = null;
        }

        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }
    /**
     * Refresh JWT token
     */
    public function refresh()
    {
        if ($token = $this->guard()->refresh()) {
            return response()
                ->json(['status' => 'successs'], 200)
                ->header('Authorization', $token);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }
    /**
     * Return auth guard
     */
    private function guard()
    {
        return Auth::guard();
    }
}
