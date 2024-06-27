<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaign = Campaign::all();
        if(!$campaign){
            return response()->json(['error'=>'No campaigns have been created yet!'], 404);
        }
        return response()->json($campaign);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campaign = $request->input('campaign');

        if(empty($campaign))
        {
            return response()->json(['error' => 'Campaign field cannot be left blank']);
        }

        $value = new Campaign();
        $value ->campaign = $campaign;
        $value->save();

        return response()->json([
            'success'   => 'Campaign Saved Successfully!',201
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($campaign_id)
    {
        $campaign = Campaign::find($campaign_id);
        if(!$campaign){
            return response()->json(['error'=>'Campaign Not Found!',404]);
        }
        return response()->json($campaign);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campaign $campaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $campaign_id)
    {
        $campaign = Campaign::find($campaign_id);
        if (!$campaign) {
            return response()->json(['error' => 'Campaign not found'], 404);
        }

        $newCampaign = $request->input('campaign');
        if (empty($newCampaign)) {
            return response()->json(['error' => 'Campaign field cannot be left blank'], 400);
        }

        $campaign->campaign = $newCampaign;
        $campaign->save();

        return response()->json(['success' => 'Campaign Updated Successfully!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($campaign_id)
    {
        $campaign = Campaign::find($campaign_id);
        if (!$campaign) {
            return response()->json(['error' => 'Campaign not found'], 404);
        }

        $campaign->delete();
        return response()->json(['success' => 'Campaign Deleted Successfully!'], 200);
    }

    //Kampanya fotoğraflarını kaydeder
    public function uploadCampaignImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $path = $image->storeAs('images', 'campaign_' . $image->hashName(), 'public'); // dosyayı 'public/images' dizinine campaign ön ekiyle kaydeder.
            
            $imageName = 'campaign_' . $image->hashName(); // Bu yolda saklanan dosya ismi.

            return response()->json([
                'success' => 'Resim Başarıyla Yüklendi!',
                'image_path' => $path,
                'image_name' => $imageName
            ], 200);
        }
        return response()->json(['error' => 'Resim Yüklenemedi'], 400); 
    }

}
