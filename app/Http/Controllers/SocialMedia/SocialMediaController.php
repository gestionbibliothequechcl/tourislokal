<?php

namespace App\Http\Controllers\SocialMedia;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialMedia\SocialMediaRequest;
use App\Http\Requests\SocialMedia\UpdateSocialMediaRequest;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    //

    public function index(){
        $socials_media = SocialMedia::all();
        return view('back.social_media.index', compact('socials_media'));
    }

    public function create(){
        return view('back.social_media.create');
    }

    public function store(SocialMediaRequest $request){
        $validateData = $request->validated();

        SocialMedia::create($validateData);

        return redirect()->route('social_media.index')->with('success', 'Social Media ajouté avec succès !');

    }

    public function edit(SocialMedia $social_media){
        return view('back.social_media.create', [
            'social_media' => $social_media
        ]);
    }

    public function update(UpdateSocialMediaRequest $request, SocialMedia $social_media){
        $validateData = $request->validated();

        $social_media->update($validateData);

        return redirect()->route('social_media.index')->with('success', 'Social Media modifié avec succès !');
    }

    public function destroy(SocialMedia $social_media){
        $social_media->delete();
        return redirect()->route('social_media.index')->with('success', 'Social Media supprimé avec succès !');
    }
}
