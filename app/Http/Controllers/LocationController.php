<?php

namespace App\Http\Controllers;

use App\Models\district;
use App\Models\province;
use App\Models\ward;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //get all provinces
    public function getProvinces()
    {
        $provinces = Province::all();
        return response()->json($provinces);
    }
    //get all districts of a province
    public function getDistricts(Request $request)
    {
        $districts = district::where('province_id', $request->province_id)->get();
        return response()->json($districts);
    }
    //get all wards of a district
    public function getWards(Request $request)
    {
        $wards = ward::where('district_id', $request->district_id)->get();
        return response()->json($wards);
    }
}
