<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }

    public function create(Request $request){

        $this->validate($request,[
            'name' => 'required|unique:categories,name|regex:/(^([a-zA-z- ]+)(\d+)?$)/u'
        ],[
            'name.required' => 'Field is required',
            'name.unique' => 'Category Name is Unique'
            ]
        );

        Category::saveCategory($request);
        return back()->with('message','Category Created Successfully');
    }

    public function manage(){
        return view('admin.category.manage',[
            'categories' => Category::all()
        ]);
    }

    public function edit($id){
        return view('admin.category.edit',[
            'category' => Category::find($id)
        ]);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'name' => 'required|regex:/(^([a-zA-z- ]+)(\d+)?$)/u'
        ],[
                'name.required' => 'Field is required'
            ]
        );
        Category::updateCategory($request,$id);
        return redirect('/category-manage')->with('message','Category Updated Successfully');;
    }

    public function delete($id){
        Category::deleteCategory($id);
        return redirect('/category-manage')->with('message','Category Delete Successfully');
    }



}
