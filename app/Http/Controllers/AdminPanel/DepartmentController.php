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
            'departments' => Department::get()
        ];
        return view('departments.department_index', array_merge($this->authInfo(), $context)); //TODO: список всех отделов
    }

    public function create()
    {
        $context = [
            'users' => User::get()
        ];
        return view('departments.department_create', array_merge($this->authInfo(), $context));
    }

    public function store(Request $request)
    {
        $params = [
            'name' => $request->input('name'),
        ];
        if ($request->input('header') != 'null') {
            $params['header'] = $request->input('header');
        }
        Department::create($params);
        return redirect()->route('departments.index');
    }

    public function edit($id)
    {
        $context = [
            'department' => Department::where('id', $id)->first(),
            'users' => User::get()
        ];
        return view('departments.department_edit', array_merge($this->authInfo(), $context));
    }

    public function update(Request $request, $id)
    {
        $params = [
            'name' => $request->input('name'),
        ];
        if ($request->input('header') != 'null') {
            $params['header'] = $request->input('header');
        }
        Department::where('id', $id)->update($params);
        return redirect()->route('departments.index');
    }
}
