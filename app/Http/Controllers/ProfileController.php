<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
class ProfileController extends Controller
{
    public function index()
    {

        return view('profile/index');
    }

    public function store(ProfileRequest $request)
    {
        $request->file->store('public/profile_images');

        return redirect('profile')->with('success', '新しいプロフィールを登録しました');

    }

    public function upload(Request $request)
    {

        if ($request->file('file')->isValid([])) {
            $path = $request->file->store('public');
            return view('profile.index')->with('filename', basename($path));
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }

    }
}
