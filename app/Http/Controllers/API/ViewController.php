<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class ViewController extends Controller
{
    public function index($filename)
    {
        // Check if file exists in app/storage/file folder
        $file_path = storage_path() .'/app/public/documents/'. $filename;
        if (file_exists($file_path))
        {
            return Response::make(file_get_contents($file_path), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$filename.'"'
            ]);
        }
        else
        {
            // Error
            exit('Requested file does not exist on our server!');
        }
    }

    public function view_buku_panduan($file_name)
    {
        // Check if file exists in app/storage/file folder
        $file_path = storage_path() .'/app/public/buku_panduan/'. $file_name;
        if (file_exists($file_path))
        {
            return Response::make(file_get_contents($file_path), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$file_name.'"'
            ]);
        }
        else
        {
            // Error
            exit('Requested file does not exist on our server!');
        }
    }
    // ->where('filename', '[A-Za-z0-9\-\_\.]+');
}
