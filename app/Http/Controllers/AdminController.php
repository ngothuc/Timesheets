<?php

namespace App\Http\Controllers;

class AdminController extends Controller {

    public function showLoginForm() {
        return view('admin.admin-login');
    }

}