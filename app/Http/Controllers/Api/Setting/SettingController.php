<?php

namespace App\Http\Controllers\Api\Setting;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function about_us(){
        $about_us=SettingResource::collection(Setting::where('type','about_us')->get());
        return response()->json([
            'message' => 'success',
            'data' => $about_us,
        ],201);

    }
    public function contact_us(){
        $contact_us=SettingResource::collection(Setting::where('type','contact_us')->get());
        return response()->json([
            'message' => 'success',
            'data' => $contact_us,
        ],201);

    }
    public function faq(){
        $qa=SettingResource::collection(Setting::where('type','qa')->get());
        return response()->json([
            'message' => 'success',
            'data' => $qa,
        ],201);

    }
}
