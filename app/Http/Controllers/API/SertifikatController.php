<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Arr;
use Intervention\Image\Facades\Image;
use PDF;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf;

class SertifikatController extends Controller
{
    public function sertifikat(Request $request)
    {
        $host = $request->getSchemeAndHttpHost();
        $user = Auth::user();
        // $user = User::where('id', '1')->first();

        $image = ('sertifikat/sertifikat.jpg');
        $path = ('sertifikat/'.$user->name.'.jpg');
        // create Image from Input
        $img = Image::make($image);

        // write text
        // $img->text('The quick brown fox jumps over the lazy dog.');

        // write text at position x , y 
        // $img->text('The quick brown fox jumps over the lazy dog.', 120, 100);

        // use callback to define details
        $img->text($user->name, 1700, 1300, function ($font) {
            $font->file(public_path('font/roboto.regular.ttf'));
            $font->size(300);
            $font->color('#00000');
            $font->align('center');
            $font->valign('bottom');
            // $font->angle(45);
        });

        // draw transparent text
        $img->text('foo', 0, 0, function ($font) {
            $font->color(array(255, 255, 255, 0.5));
        });

        // Save Image to Path

        $img->save($path);

        // dd($img);

        // print($path);
        return response()->json([
            "error" => false,
            "message" => "Success",
            "data" => base64_encode($img)
        ], 200);
        // return redirect($host.'/'.$path);

    }
    
}
