<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Menu;
use Session;
class RestaurantApiController extends Controller
{
    public function addRestaurant(Request $request){
       
        // validation
        $this->validate($request,[
            'name'=>'required|max:50',
            'address'=>'required|max:100',
            'phone'=>'required|digits:10',
            'opening'=>"required",
            'closing'=>"required",
            'status'=>"required"
        ]);
        $restaurant = new Restaurant;
        $restaurant->uuid = $request->input('uuid');
        $restaurant->name = $request->input('name');
        $restaurant->address = $request->input('address');
        $restaurant->phone = $request->input('phone');
        $restaurant->opening = $request->input('opening');
        $restaurant->closing = $request->input('closing');
        $restaurant->status = $request->status;
        $restaurant->save();        
        session()->flash('msg',' New Restaurant Record has been created successfully.');
        return redirect()->back();
        
    }
    public function updateRestaurant($id){
        $restaurant = Restaurant::where('id',$id)->first();
        if(!$restaurant){
            session()->flash('errorMsg','Record Not Found');
            // return redirect(to:'restaurants');
        }
        return view('editRestaurant',compact('restaurant'));

    }
    public function editRestaurant($id,Request $request){
        // validation
        $this->validate($request,[
            'name'=>'required|max:50',
            'address'=>'required|max:100',
            'phone'=>'required|digits:10',
            'opening'=>"required",
            'closing'=>"required",
            'status'=>"required"
        ]);
        $restaurant = Restaurant::find($id);
        $restaurant->uuid = $request->input('uuid');
        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->phone = $request->phone;
        $restaurant->opening = $request->opening;
        $restaurant->closing = $request->closing;
        $restaurant->status = $request->status;
        $restaurant->save();
        session()->flash('msg','Restaurant record has been updated successfully.');
        return redirect()->back();

    }
    public function deleteRestaurant($uuid){
        $restaurant = Restaurant::where('uuid',$uuid)->delete();
        if($restaurant){
            return ["message"=>"Restaurant has been deleted"];
        }else{
            return ["message"=>"Operation Failed"];
        }
    }
    public function showRestaurants(){
        $data =  Restaurant::paginate(2);
        return view('restaurantList',compact('data'));
    }
    public function singleRestaurant($uuid){
        $data = Restaurant::find($uuid);
        return view('singleRestaurant',compact('data'));
    }

    public function addRestaurantMenu(Request $req){
        return 'Hello';
    }
    public function editRestaurantStatus($id){
        $restaurant = Restaurant::find($id);
        if($restaurant->status == 1){
            $restaurant->status = 0;
        }else{
            $restaurant->status = 1;
        }
        $restaurant->save();
        session()->flash('msg','Restaurant status has been updated successfully.');
        return redirect()->back();
    }
    

}
