<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Mail;


class AuthController
{
    /**
     * Redirect to registration form page
     */

    public function showRegistrationForm()
    {
        $message = "";
        return view('register', compact('message'));
    }

    /**
     * Run a check of fields and register user to the database, sending custom email
     */

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

        $user['first_name'] = ucfirst($user['first_name']);

        $user['last_name'] = ucfirst($user['last_name']);

        $user['password'] = md5($user['password']);

        App::get('db')->insert('users', $user);

        Mail::send($user['email'], 'Thank you & Welcome', 'Greetings ' . $user['first_name'] . ",\n\nThank you for choosing PetSafe! From all the staff here at PetSafe.com, we welcome you, and hope you find our services enjoyable and secure, for you and your pet. \n\nThe PetSafe Team");

        return redirect('/');
    }

    /**
     * Redirect to login form
     */

    public function showLoginForm()
    {
        $message = "";
        return view('login', compact('message'));
    }

    /**
     * Run check to see if user exists and password matches, then logs user in and saves the session
     */

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

        if ($user->role == 'admin') {
            return redirect('/admin/logs');
        }
        return redirect('/user/logs');
    }

    /**
     * Destroys the session and logs user out
     */

    public function logout()
    {
        $_SESSION['user'] = null;
        session_destroy();

        return redirect('http://localhost:8080/#/');
    }

}