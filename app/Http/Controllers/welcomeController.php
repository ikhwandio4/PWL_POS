<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' =>'Selamat Datang',
            'list' => ['Home','Welcome']
        ];

        $activeMenu = 'dasboard';

        return view ('Welcome', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }
}
