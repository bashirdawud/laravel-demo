<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use App\Models\Multipic;
use Carbon\Carbon;


class AboutController extends Controller
{
    public function HomeAbout() {
        $homeabout = HomeAbout::latest()->get();
        return view('admin.home.index', compact('homeabout'));
    }

    public function AddAbout(){
        return view('admin.home.create');
    }

    public function StoreAbout(Request $request){
        HomeAbout::insert([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('home.about')->with('success', 'Inserted');
    }

        public function Edit($id){

            $about = HomeAbout::find($id);
            return view('admin.home.edit', compact('about'));

        }

        public function Update(Request $request, $id){

            HomeAbout::find($id)->update([
                'title' => $request->title,
                'short_dis' => $request->short_dis,
                'long_dis' => $request->long_dis,
                'created_at' => Carbon::now()
            ]);

            return redirect()->route('home.about')->with('success', 'Updated');
        }

        public function Delete($id) {
            $delete = HomeAbout::find($id)->delete();
            return redirect()->back()->with('Success', 'Deleted Successfully');
        }

        public function Porfolio() {
            $images = Multipic::all();
            return view('pages.portfolio', compact('images'));
        }
}
