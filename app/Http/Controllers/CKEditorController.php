<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/' . $filename);
            $msg = 'Rasm yuklandi';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg');</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
