<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use App\Http\Requests\UploadFileRequest;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
  public function list (Request $request) {
    $uploads = Storage::allFiles('uploads');
    return view('list', ['files' => $uploads]);
  }

  public function download ($file)
  {
    return response() -> download(storage_path('app/'.$file));
  }

  public function upload()
  {
    return view('upload');
  }

  public function store (UploadFileRequest $request)
  {
    $filename = $request -> fileName;
    $file = $request -> file('userFile');
    $extension = $file -> getClientOriginalExtension();
    $saveAs = $filename . "." . $extension;
    $file -> storeAs('uploads', $saveAs, 'local');
    return response() -> json(['success' => true]);

    // $file = $request -> file('userFile');
    // $path = $file -> store('uploads');
    // $uploads = UserUpload::create([
    //   'user_id' => Auth::user() -> id,
    //   'filename' => $path,
    //   'form_id' => $request -> form_id
    // ]);
    // return response() -> json([
    //   'success' => true,
    //   'upload' => json_encode($uploads)
    // ]);
  }
}
