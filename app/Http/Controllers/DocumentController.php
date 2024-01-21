<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Document;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view(null);//TODO: список всех документов текущего пользователя
    }

    public function create()
    {
        return view('documents\document_create', $this->authInfo());
    }

    public function store(Request $request)
    {
        $file = $request->file('new_file');
        $user_auth = Auth::user();
        if (Storage::disk('local')->exists('public/' . $user_auth->login . '/' . $file->getClientOriginalName()) == false) {
            $path = $file->storeAs('public/' . $user_auth->login, $file->getClientOriginalName());
            $new_doc = Document::create([
                'owner_login' => $user_auth->login,
                'name' => $file->getClientOriginalName(),
                'path' => $path
            ]);
            $new_doc->save();
        }
        return redirect()->route('documents.create');
    }
}
