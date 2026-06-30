<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function store(StorePostRequest $request)
    {
        if($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = time() .'-'. $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName, 'public');

           $request->user()->update(['avatar' => $path]);
        }
        return back();
    }
}

