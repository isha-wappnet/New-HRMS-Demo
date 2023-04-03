<?php

namespace App\Http\Controllers;
use App\Models\File;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadfile(){
        return view('auth.upload');
    }
    public function fileUpload(Request $req){
        $req->validate([
            'file' => 'required|mimes:csv,xls,xlsx,pdf,doc,docx,rtf'
        ]);
        $fileModel = new File;
        if($req->file()) {
            $user = auth()->user(); // Get the authenticated user
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->user_id = $user->id; // Set the user ID
            $fileModel->save();
            return back()
          
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
   }
}
