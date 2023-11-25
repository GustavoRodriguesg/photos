<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\photo;

class PhotosController extends Controller
{
    function index () {
      $photos=photo::all();
  
        return view('welcome',['photos'=> $photos]);
    }
    public function store(Request $request){
      $photo=new photo;
     
    
      
    
      if($request->hasFile('image') && $request->file('image')->isValid()){
    
          $requestImage=$request->image;
          $extension=$requestImage->extension();
          $imageName=md5($requestImage->getClientOriginalName()  . strtotime("now")).".".$extension;
          $requestImage->move(public_path('img/photos'), $imageName);
          $photo->name=$imageName;
          $photo->save();
          $requestImage='';
    
    
      }
      return redirect('/');
    }
}
