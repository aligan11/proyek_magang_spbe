<?php

namespace App\Rules;

use App\Models\Petugas;
use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Hash;

class loginCheck implements ValidationRule
{
    protected $request;
    public function __construct($request = null) // Tambahkan default null
    {
        // Jika $request tidak terisi, ambil dari helper request()
        $this->request = $request ?? request();
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $email = $this->request->input('email');
        $passwordInput = $this->request->input('password');
        $loginStatus = false;

        $emailPetugasCheck = User::where('email', $email)->count();

        if ($emailPetugasCheck > 0) {
            $passwordDb = User::where('email', $email)->value('password');

            if (Hash::check($passwordInput, $passwordDb)) {
                $loginStatus = true;
            } else {
                $fail('password tidak sesuai');
            }
        } else {
            $fail('email tidak terdaftar');
        }

        if ($loginStatus) {
            $petugasData =  User::where('email', $email)->first();
            session()->put('login_status', true);
            session()->put('user_email', $email);
            session()->put('id_petugas', $petugasData->id);
            session()->put('role', $petugasData->role);
        } else {
            session()->put('login_status', false);
        }

        //
    }
}
