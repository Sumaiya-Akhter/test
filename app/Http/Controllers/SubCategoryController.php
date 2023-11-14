<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function index(){
        return view('admin.sub-category.index',[
            'categories' =>  Category::all()
        ]);
    }
    public function create(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:sub_categories,name|regex:/(^([a-zA-z- ]+)(\d+)?$)/u',
            'category_id' => 'required',
        ],[
                'name.required' => 'Sub Category Field is required',
                'category_id.required' => 'Please Select Category',
                'name.unique' => 'Sub Category Name is Unique'
            ]
        );
        SubCategory::newSubCategory($request);
        return redirect('/sub-category-add')->with('message','Sub Category Create Successfully');
    }

    public function manage(){
        return view('admin.sub-category.manage',[
            'subCategories' => SubCategory::all()
        ]);
    }

    public function edit($id){
        return view('admin.sub-category.edit',[
            'categories' => Category::all(),
            'subCategory' => SubCategory::find($id)
        ]);
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'required|regex:/(^([a-zA-z- ]+)(\d+)?$)/u',
            'category_id' => 'required',
        ],[
                'name.required' => 'Sub Category Name is required',
                'category_id.required' => 'Please Select Category',
            ]
        );
        SubCategory::updateSubCategory($request,$id);
        return redirect('/sub-category-manage')->with('message', 'Sub Category Updated Successfully');
    }

    public function delete($id){
        SubCategory::deleteSubCategory($id);
        return redirect('/sub-category-manage');
    }








}
