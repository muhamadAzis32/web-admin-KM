<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class DownloadController extends Controller
{
    public function index($tipe, $filename)
    {
        // Check if file exists in app/storage/file folder
        $file_path = storage_path() .'/app/public/'.$tipe.'/'.$filename;
        print($file_path);
        if (file_exists($file_path))
        {
            // Send Download
            return Response::download($file_path, $filename, [
                'Content-Length: '. filesize($file_path)
            ]);
        }
        else
        {
            // Error
            exit('Requested file does not exist on our server!');
        }
    }
    // ->where('filename', '[A-Za-z0-9\-\_\.]+');
    public function index_images($filename)
    {
        // Check if file exists in app/storage/file folder
        $file_path = storage_path() .'/app/public/images/'. $filename;
        if (file_exists($file_path))
        {
            return Response::make(file_get_contents($file_path), 200, [
                'Content-Type' => 'application/jpg',
                'Content-Disposition' => 'inline; filename="'.$filename.'"'
            ]);
        }
        else
        {
            // Error
            exit('Requested file does not exist on our server!');
        }
    }
}
