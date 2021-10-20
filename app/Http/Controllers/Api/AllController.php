<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AllController extends Controller
{
    public function posts() {
         $posts = Http::get('https://jsonplaceholder.typicode.com/posts');
         return response()->json(['status' => '200' , 'data' => $posts->json()]);
    }
    public function getAll() {
        $shipment = Shipment::where('status','delivered')->get();
        return response()->json(['status' => '200' , 'data' => $shipment]);
    }
}
