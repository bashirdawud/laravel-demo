<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Image;

class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function AllBrand(){
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function AddBrand(Request $request){
        $validateData = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg.jpeg,png'
        ],
        [
            'brand_name.required' => 'Enter Brand Name',
            'brand_name.unique' => 'Brand name already exist',
            'brand_name.min' => 'Minimum value is 4'
        ]);

            $brand_image = $request->file('brand_image');
            $name_generateId = hexdec(uniqid());
            $image_ext = strtolower($brand_image->getClientOriginalExtension());
            $image_name = $name_generateId.'.'.$image_ext;
            $upload_location = 'image/brand/';
            $last_img = $upload_location.$image_name;
            $brand_image->move($upload_location, $image_name);

            //Image intervention code...
            // $brand_image = $request->file('brand_image');
            // $unique_id = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
            // Image::make($brand_image)->resize(300, 200)->save('image/brand/'.$unique_id);

            // $saveDB = 'image/brand/'.$unique_id;
            Brand::insert([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Brand Inserted Successfully',
                'alert-type' => 'success'
            );
      
      return redirect()->back()->with($notification);

    }

    public function Edit($id) {
        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));
    }

    public function Update(Request $request, $id) {
        $validateData = $request->validate([
            'brand_name' => 'required|min:4',
            
        ],
        [
            'brand_name.required' => 'Enter Brand Name',
            'brand_name.min' => 'Minimum value is 4'
        ]);

            $old_image = $request->old_image;

            $brand_image = $request->file('brand_image');

            if($brand_image){
            $name_generateId = hexdec(uniqid());
            $image_ext = strtolower($brand_image->getClientOriginalExtension());
            $image_name = $name_generateId.'.'.$image_ext;
            $upload_location = 'image/brand/';
            $last_img = $upload_location.$image_name;
            $brand_image->move($upload_location, $image_name);

            unlink($old_image);
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now()
            ]);
            
            $notification = array(
                'message' => 'Brand Image Updated Successfully',
                'alert-type' => 'info'
            );
      
            return redirect()->back()->with($notification);
            }else {
                Brand::find($id)->update([
                    'brand_name' => $request->brand_name,
                    'created_at' => Carbon::now()
                ]);

                $notification = array(
                    'message' => 'Brand Image Updated Successfully',
                    'alert-type' => 'warning'
                );
                
                return redirect()->back()->with($notification);
            }

    }


            public function Delete($id) {

                $image = Brand::find($id);
                $delete = $image->brand_image;
                unlink($delete);

                Brand::findOrFail($id)->delete();
                return redirect()->back()->with('success', 'Brand Deleted successuflly');
            }
            //multi pic section
            public function AllImage(){
                $images = Multipic::all();
                return view('multipic.index', compact('images')); 
            }
            
            public function StoreImage(Request $request) {
                $validateData = $request->validate([
                    'image' => 'required'
                ],
                
                [
                    'image.required' => 'Please select Image',
                    
                ]);

                $images = $request->file('image');

                foreach($images as $multi_img){

                    $unique_id = hexdec(uniqid());
                    $image_ext = strtolower($multi_img->getClientOriginalExtension());
                    $image_name = $unique_id.'.'.$image_ext;
                    $location_public = 'image/multi/';
                    $saveDB = $location_public.$image_name;
                    $multi_img->move($location_public, $image_name);

                    Multipic::insert([
                    'image' => $saveDB,
                    'created_at' => Carbon::now() 
                    ]);

                }


                return redirect()->back()->with('success', 'Multi Image Inserted');
            }

            public function LogOut() {
                Auth::logout();
                return redirect()->route('welcome');
            }

}
