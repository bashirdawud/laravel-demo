<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use DB;


class HomeController extends Controller
{
    public function HomeSlider() {
        $sliders = DB::table('sliders')->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function AddSlider(){

        return view('admin.slider.create');
        
    }
    

    public function StoreSlider(Request $request){
        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ],
        [
            'title.required' => 'Enter title',
            'description.required' => 'Enter description',
            'image.required' => 'choose image'
        ]);

        $image = $request->file('image');
        $unique_id = hexdec(uniqid());
        $image_ext = strtolower($image->getClientOriginalExtension());
        $image_name = $unique_id.'.'.$image_ext;
        $path = 'image/slider/';
        $saveDB = $path.$image_name;
        $image->move($path, $image_name);

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $saveDB,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('home.slider')->with('success', 'Slider Insertd Successfully');

    }


    public function EditSlider($id) {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function UpdateSlider(Request $request, $id) {
        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ],
        [
            'title.required' => 'Enter title',
            'description.required' => 'Enter description',
            'image.required' => 'choose image'
        ]);
        
        $old_image = $request->old_image;
        $image = $request->file('image');
        if($image){
        $unique_id = hexdec(uniqid());
        $image_ext = strtolower($image->getClientOriginalExtension());
        $image_name = $unique_id.'.'.$image_ext;
        $path = 'image/slider/';
        $saveDB = $path.$image_name;
        $image->move($path, $image_name);

        unlink($old_image);
        Slider::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $saveDB,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('home.slider')->with('success', 'Slider updated Successfully');

        }else {

            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);

            return redirect()->route('home.slider')->with('success', 'Slider updated Successfully');
        }
    }

    public function DeleteSlider($id) {
        $image = Slider::find($id);
        $image_url = $image->image;
        unlink($image_url);

        Slider::find($id)->delete();
        return redirect()->route('home.slider')->with('success', 'Slider deleted');
    }


}
