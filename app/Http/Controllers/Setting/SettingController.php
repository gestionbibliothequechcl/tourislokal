<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\StoreSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    //

    public function index(){
        return view('back.settings.list',
        ['settings'=>Setting::where('id', 1)->first()]);
    }

    public function update(StoreSettingRequest $request){
        
        $request->validated($request->all());
        $settings = Setting::where('id', 1)->first();
        
        $logo = $request->logo;

        if($logo != null && $logo->getError()){
            if($settings->logo){
                Storage::disk('public')->delete($settings->logo);
            }

            $logo = $request->logo->store('asset', 'public');
        }
        $about = strip_tags($request->about);
        
        $settings->update([
            'name'=>$request->name,
            'logo'=>$logo,
            'adress'=>$request->adress,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'about'=>$about,           
        ]);
      return back()->with('success', 'Parametrage modifié avec succes !');
    }
}
