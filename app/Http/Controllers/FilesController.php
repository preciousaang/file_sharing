<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use App\File;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function __construct(){        
        $this->middleware('auth')->except(['list', 'search']);
    }

    public function uploadForm(){
        return view('files.upload');
    }

    public function upload(FileRequest $request){
        //$md5_name =  md5_file($request->file('file')->getRealPath());
        $extension = $request->file('file')->getClientOriginalExtension();
        $filename = basename($request->file('file')->store('public/uploads'));
        $newFile = File::create([
            'name'=>$request->input('name'),
            'user_id'=>auth()->user()->id,
            'filename'=>$filename,
            'extension'=>$extension,
            'course_code'=>$request->input('course_code'),
            'description'=>$request->input('description')
        ]);
        return redirect()->route('my-files')->with('success', 'File Uploaded Successfully');        
    }

    public function list(Request $request){
        $files = File::paginate(40);
        if($request->dept && $request->dept == 'csc'){
            $files = File::where('course_code', 'like', 'csc%')->paginate(40);
        }
        elseif($request->dept && $request->dept=='chemistry'){
            $files = File::where('course_code', 'like', 'chm%')->paginate(40);
        }
        elseif($request->dept && $request->dept=='physics'){
            $files = File::where('course_code', 'like', 'phy%')->paginate(40);
        }
        elseif($request->dept && $request->dept=='geology'){
            $files = File::where('course_code', 'like', 'gly%')->paginate(40);
        }
        elseif($request->dept && $request->dept=='maths'){
            $files = File::where('course_code', 'like', 'mth%')->paginate(40);
        }
        return view('files.list', [
            'files'=>$files,
            'file_path'=>'public/uploads/',
        ]);
    }

    public function download(Request $request){
        $file = File::findOrFail($request->id);
        return Storage::download('public/uploads/'.$file->filename, $file->name.".".$file->extension);
    }

    public function search(Request $request){
        $files = File::where('name', 'like', "%{$request->search}%")
                            ->orWhere('course_code', 'like', "%{$request->search}%")
                            ->orWhere('extension', 'like', "%{$request->search}%")
                            ->orWhere('description', 'like', "%{$request->search}%")
                            ->paginate(40);
        return view('files.list', [
            'files'=>$files,
            'file_path'=>'public/uploads/',
        ]);
    }

    public function myFiles(){
        $files = auth()->user()->files()->paginate(40);
        return view('files.list', [
            'files'=>$files,
            'file_path'=>'public/uploads/',
        ]);
    }

    public function delete(Request $request){
        $file = File::findOrFail($request->id);
        Storage::delete('public/uploads/'.$file->filename);
        $file->delete();
        return redirect()->back()->with('message', 'File Deleted');
    }
}
