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
    return views('list', ['files' => $uploads]);
  }

  public function download ($file)
  {
    return response() -> download(storage_path('app/'.$file));
  }

  public function upload()
  {
    return view('upload');
  }

  public function store (UploadFileRequest $file)
  {
    $filename = $request -> fileName;
    $file = $request -> file('userFile');
    $extension = $file -> getClientOriginalExtension();
    $saveAs = $filename . "." . $extension;
    $file -> storeAs('uploads', $saveAs, 'local');
    return response() -> json(['success' => true]);
  }
}
