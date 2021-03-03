<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Menu;
use DB;
use Session;
class RestaurantController extends Controller
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
        $restaurant->fill($request->all());
        $restaurant->save();        
        session()->flash('msg',' New Restaurant Record has been created successfully.');
        return redirect()->back();
    }
    public function updateRestaurant($id){
        $restaurant = Restaurant::where('id',$id)->first();
        if(!$restaurant){
            session()->flash('msg','Oops Sorry, Record Not Found!');
            return redirect('/restaurants');
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
        $restaurant->fill($request->all());
        $restaurant->save();
        session()->flash('msg','Restaurant record has been updated successfully.');
        return redirect()->back();

    }
    public function deleteRestaurant($id){
        
        $restaurant = Restaurant::where('id',$id)->delete();
        if($restaurant){
            session()->flash('msg','Restaurant record has been deleted successfully.');
            return redirect('/restaurants');
        }else{
            return redirect()->back();
        }
    }
    public function showRestaurants(){
        $data =  Restaurant::paginate(2);
        return view('restaurantList',compact('data'));
    }
    public function singleRestaurant($uuid){
        $data = Restaurant::find($uuid);
        if(!$data){
            session()->flash('msg','Oops Sorry, Record Not Found!');
            return redirect('/restaurants');
        }
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
