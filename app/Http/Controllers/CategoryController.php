<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Carbon\Carbon;
use DB;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function AllCat(){
        $categories = Category::latest()->paginate(5);
        $trashCat = Category::onlyTrashed()->latest()->paginate(3);
        return view('admin.category.index', compact('categories', 'trashCat'));
    }


    public function AddCat(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
            
        ],
    
        [
            'category_name.required' => 'Enter Category Name',
            'category_name.max' => 'Category max is exceeded'

        ]);
        
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id;
        $category->save();


        return redirect()->back()->with('success', 'category successfully created');

        
        }

        public function Edit($id){
            $categories = Category::findOrFail($id);
            return view('admin.category.edit', compact('categories'));
        }

        public function Update(Request $request, $id){
            $validated = $request->validate([
                'category_name' => 'required|unique:categories|max:255',
                
            ],
            
            [
                'category_name.required' => 'Enter Category Name',
                'category_name.max' => 'Category max is exceeded'
    
            ]);

            $update = Category::find($id)->update([
                'category_name' => $request->category_name,
                'user_id' => Auth::user()->id
            ]);
                
            return redirect()->route('all.category')->with('success', 'Category Updated');
        }

        public function Softdelete($id) {
            $delete = Category::find($id)->delete();
            return redirect()->back()->with('success', 'Soft Delete successfully');
        }

        public function Restore($id) {
            $pdelete = Category::withTrashed()->find($id)->restore();
            return redirect()->back()->with('success', 'Category Restored, Hurray!!!');
        }

        public function PDelete($id){
            $delete = Category::onlyTrashed()->find($id)->forceDelete();
            return redirect()->back()->with('success', 'Category Delete Parmanently');

        }
    
}
