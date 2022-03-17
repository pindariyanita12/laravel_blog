<?php
use App\User;
use App\Address;


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    //
    public function store(Request $request)
    {
        $emailValidator = $this->validateEmail();
        $addressValidator = $this->validateAddress();
        if($emailValidator->fails() || $addressValidator->fails()){
            return response()->json(['message'=>'Failed',
            'email'=>$emailValidator->messages(),
            'address'=>$addressValidator->messages()],400);
        }

        $user = User::where('email',$request->email)->firstOrFail();
        if(count($user->address)){
            return response()->json(['message'=>'User has Address Already','data'=>null],400);
        }

        $address = new Address($addressValidator->validate());

        if($user->address()->save($address)){
            return response()->json(['message'=>'Address Saved','data'=>$address],200);
        }
            return response()->json(['message'=>'Failed','data'=>null],400);

    }

    public function show(Address $address)
    {
        return response()->json(['message'=>'','data'=>$address],200);
    }

    public function show_user(Address $address)
    {
        return response()->json(['message'=>'','data'=>$address->user],200);
    }

    public function update(Request $request, Address $address)
    {
        $addressValidator = $this->validateAddress();
        if($addressValidator->fails()){
            return response()->json(['message'=>'Failed',
            'address'=>$addressValidator->messages()],400);
        }

        $address->zip_code = $request->zip_code;
        $address->country = $request->country;
        if($address->save()){
            return response()->json(['message'=>'Address Updated','data'=>$address],200);
        }
            return response()->json(['message'=>'Update Failed','data'=>null],400);
    }

    public function destroy(Address $address)
    {
        if($address->delete()){
            return response()->json(['message'=>'Address has been Deleted','data'=>null],200);
        }
        return response()->json(['message'=>'Error Deleting Address','data'=>null],400);
    }

    public function validateAddress(){
        return Validator::make(request()->all(), [
            'country' => 'required|string|min:1|max:4',
            'zip_code' => 'required|string|min:5|max:6',
        ]);
    }

    public function validateEmail(){
        return Validator::make(request()->all(), [
            'email' => 'required|string|email|max:255',
        ]);
    }
}
