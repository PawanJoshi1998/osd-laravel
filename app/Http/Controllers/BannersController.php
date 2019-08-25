<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Book;
use App\Banner;

class BannersController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('banners.index', compact('banners'));
    }

    public function create(){

        $banners = Banner::all();
        return view('banners.create')->with('banners',$banners);
    }

    public function store(Request $request){

        $banner = new banner();
        $banner->heading = $request["heading"];
        $banner->description = $request["description"];
        $banner->image = $request["image"];
        
       // Upload the image
       if($request->hasFile('image')){
    
           $destination_path = 'public/images/banners';
           $image = $request->file('image');
           $image_name= time(). '_' . $image->getClientOriginalName();

           $request->file('image')->storeAs($destination_path, $image_name);
           $banner->image = $image_name;
        }
         
         
        // Finally save the banner.
        $banner->save();

        return redirect(url('banners'));
    }

    public function edit($banner){
        
        $banner = Banner::find($banner);  
        return view('banners.edit')->with('banners',$banners);

    }
    public function update(Request $request, $banner){

        $banner = Banner::find($banner);
        $banner->heading = $request->get('heading');
        $banner->description = $request->get('description');
        if($request->hasFile('image')){
    
            $destination_path = 'public/images/banners';
            $image = $request->file('image');
            $image_name= time(). '_' . $image->getClientOriginalName();
 
            $request->file('image')->storeAs($destination_path, $image_name);
            $banner->image = $image_name;
         }


        $banner->save();
        return redirect(url('banners'));

        // dd($request->all());

    }

    public function destroy($banner){

        $banner = Banner::find($banner);
        $banner->delete();
        return redirect(url('banners'))->with('status','Deleted Successfully');
    }
}
