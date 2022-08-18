<?php

namespace App\Http\Controllers\API;

use App\Models\MataKuliah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KalenderResource;
use App\Http\Resources\KalenderCollection;
use App\Models\Assignment;
use App\Helpers\ResponseFormatter;
use App\Models\Exam;
use App\Models\Quiz;

class KalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $exam =  Exam::all();
        $assignment =  Assignment::all();
        $collection1 = new KalenderCollection($assignment, 'assignment');
        $collection2 = new KalenderCollection($exam, 'exam');
        $allItems = new \Illuminate\Database\Eloquent\Collection; 
        $allItems = $allItems->concat($collection1->values());
        $allItems = $allItems->concat($collection2->values());
        return $collection2;
    }

    public function findbyid($id)
    {
        $meet = Assignment::find($id);
         return new KalenderResource($meet, 'a');
        // return ResponseFormatter::success($kalender);
    }

    // records.sort((a, b) => {
    //     return new Date(a.order_date) - new Date(b.order_date); // descending
    //   })
      
    //   records.sort((a, b) => {
    //     return new Date(b.order_date) - new Date(a.order_date); // ascending
    //   })
}
