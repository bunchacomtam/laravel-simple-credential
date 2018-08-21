<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use App\UserPersonalData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validatorStep1(array $data)
    {
        return Validator::make($data, [
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function validatorStep2(array $data)
    {
        return Validator::make($data, [
            'address' => 'required|max:255',
            'date_of_birth' => 'required|date',
            'number_credit_card' => 'required|integer',
            'expired_credit_card' => 'required|date'
        ]);
    }


    public function step1() {
        return view('auth.register-step-1');
    }

    public function postStep1(Request $request) {
        $this->validatorStep1($request->all())->validate();

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if($user->save()) {
            return redirect(route('step_2', ['id' => $user->id]));
        }

        return $this->redirect()->route('step_1');
    }

    public function step2($id) {
        $user = User::find($id);
        $data = [
            'user' => $user
        ];
        return view('auth.register-step-2', $data);
    }

    public function postStep2(Request $request, $id) {
        $this->validatorStep2($request->all())->validate();

        $user = User::find($id);
        $userPersonalData = new UserPersonalData;
        $userPersonalData->address = $request->address;
        $userPersonalData->date_of_birth = $request->date_of_birth;
        $userPersonalData->membership_type = $request->membership_type;
        $userPersonalData->number_credit_card = $request->number_credit_card;
        $userPersonalData->type_credit_card = $request->type_credit_card;
        $userPersonalData->expired_credit_card = $request->expired_credit_card;

        if($user->personalData()->save($userPersonalData)) {
            return redirect(route('step_3', ['id' => $user->id]));
        }
        return redirect(route('step_2', ['id' => $user->id]));
    }

    public function step3($id) {
        $user = User::find($id);
        $data = [
            'user' => $user
        ];
        return view('auth.register-step-3', $data);
    }
}
