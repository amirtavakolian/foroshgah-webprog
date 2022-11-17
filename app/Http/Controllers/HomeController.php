<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tavakolian\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Tavakolian\Category\Models\Category;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }

}
