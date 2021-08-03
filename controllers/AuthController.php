<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Mail;


class AuthController
{

    public function showRegistrationForm()
    {
        $message = "";
        return view('register', compact('message'));
    }

    public function register()
    {
        $allempty = true;
        foreach ($_POST as $param) {
            if ($param) $allempty = false;
        }

        if ($_POST['password'] != $_POST['confirm_password']) {
            $message = "Password does not match.";
            return view('register', compact('message'));
        }

        if ($allempty) {
            $message = "All fields are required.";
            return view('register', compact('message'));
        }

        unset($_POST['confirm_password']);

        $user = $_POST;

        $user['password'] = md5($user['password']);

        App::get('db')->insert('users', $user);

        Mail::send($user['email'], 'Welcome', 'From the staff at PetSafe.com, we welcome you, and hope you find our services enjoyable and secure, for you and your pet.');


        return view('register-pet', compact('user'));
    }

    public function showPetForm()
    {
        $message = "";
        
        return view('register-pet', compact('message'));
    }

    public function showLoginForm()
    {
        $message = "";
        return view('login', compact('message'));
    }

    public function login()
    {
        $allempty = true;
        foreach ($_POST as $param) {
            if ($param) $allempty = false;
        }

        $user = App::get('db')->select('users', ['email' => $_POST['email']]);

        if ($allempty) {
            $message = "All fields are required.";
            return view('login', compact('message'));
        }

        if (!$user) {
            $message = "There is no such user. Click REGISTER to register.";
            return view('login', compact('message'));
        }

        if ($user->password != md5($_POST['password'])) {
            $message = "Credentials don't match.";
            return view('login', compact('message'));
        }

        unset($user->password);

        $_SESSION['user'] = $user;

        return redirect('logs');
    }

    public function logout()
    {
        $_SESSION['user'] = null;
        session_destroy();

        return redirect('http://localhost:8080/#/');
    }

}