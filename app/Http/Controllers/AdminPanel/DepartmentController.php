<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $context = [
            'users' => User::get()
        ];
        return view('admin_panel\department', array_merge($this->authInfo(), $context));
    }

    public function add_department(Request $request)
    {
        $params = [
            'name' => $request->input('name'),
        ];
        if ($request->input('header') != 'null') {
            $params['header'] = $request->input('header');
        }
        Department::create($params);
        return redirect()->route('home');
    }
}
