<?php

namespace kabir\LaravelPermissionEditor\Http\Controllers;
use Illuminate\Routing\Controller;


class PermissinController extends Controller
{
    public function index()
    {
        return view('permission-editor::roles.index');
    }
}
