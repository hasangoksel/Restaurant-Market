<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //Kullanıcıya adres ekler
    public function addAddressToUser(Request $request,$user_id)
    {
        $title = $request->input('title');
        $country = $request->input('country');
        $city = $request->input('city');
        $district = $request->input('district');
        $detail = $request->input('detail');

        if(empty($title))
        {
            return response()->json(['error'=>'Title field cannot be left blank']);
        }
        if(empty($country))
        {
            return response()->json(['error'=>'Country field cannot be left blank']);
        }
        if(empty($city))
        {
            return response()->json(['error'=>'City field cannot be left blank']);
        }
        if(empty($district))
        {
            return response()->json(['error'=>'District field cannot be left blank']);
        }
        if(empty($detail))
        {
            return response()->json(['error'=>'Detail field cannot be left blank']);
        }

        $user = User::find($user_id);
        $address = new Address();
        $address->title = $title;
        $address->country = $country;
        $address->city = $city;
        $address->district = $district;
        $address->detail = $detail;
        $address->save();
       
        $address->users()->attach($user->user_id);
        

        return response()->json([
            'success'   => 'Address Saved Successfully!',201
        ]);
    }

    //Kullanıcının adreslerini listeler
    public function getUserAddresses($userId)
    {
        $user = User::findOrFail($userId);
        $addresses = $user -> addresses;

        return response()->json($addresses,200);
    }

    //Kullanıcının adresini silme
    public function removeAddressFromUser($user_id, $address_id)
    {
        $user = User::findOrFail($user_id);
        if (!$user) {
            return response()->json(['error' => 'Kullanıcı bulunamadı'], 404);
        }

        $address = Address::findOrFail($address_id);
        if (!$address) {
            return response()->json(['error' => 'Adres bulunamadı'], 404);
        }

        $user->addresses()->detach($address);

        $address->delete();

        return response()->json(['success' => 'Address deleted successfully'],200);
    }


    //Kullanıcının adresini güncelleme
    public function updateAddressForUser(Request $request,$userId,$addressId)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:30',
            'country' => 'required|string|max:25',
            'city' => 'required|string|max:25',
            'district' => 'required|string|max:25',
            'detail' => 'required|string',
        ]);

        $user = User::findOrFail($userId);
        $address = $user->addresses()->where('addresses.address_id', $addressId)->firstOrFail();

        $address->title = $validatedData['title'];
        $address->country = $validatedData['country'];
        $address->city = $validatedData['city'];
        $address->district = $validatedData['district'];
        $address->detail = $validatedData['detail'];
        $address->save();

        return response()->json($address, 200);
    }
}