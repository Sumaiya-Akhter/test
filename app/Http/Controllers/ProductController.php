<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OthersImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.product.manage',[
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.product.index',[
            'categories' => Category::all(),
            'sub_categories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    private $product;
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:products,name|regex:/(^([a-zA-z- ]+)(\d+)?$)/u',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
            'unit_id' => 'required',
            'code' => 'required|unique:products,code',
            'regular_price' => 'required',
            'selling_price' => 'required',
            'stock_amount' => 'required',
            'reorder_label' => 'required',
            'image' => 'required',

        ],[
                'name.required' => 'Product Name required',
                'name.unique' => 'Sub Category Name is Unique',
                'code.unique' => 'Product Code is Unique',
                'category_id.required' => 'The category field is required.',
                'sub_category_id.required' => 'The sub_category field is required.',
                'brand_id.required' => 'The brand field is required.',
                'unit_id.required' => 'The unit field is required.',
                'code.required' => 'The regular price field is required.',
                'regular_price.required' => 'The regular price field is required.',
                'selling_price.required' => 'The selling price field is required.',
                'stock_amount.required' => 'The stock amount field is required.',
                'reorder_label.required' => 'The reorder label field is required.',
                'image.required' => 'The reorder label field is required.'
            ]
        );

         $this->product = Product::newProduct($request);
         OthersImage::newOtherImage($request->file('others_image'),$this->product->id);
         return back()->with('message','Product Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.show',[
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit',[
            'product' => $product ,
            'categories' => Category::all(),
            'sub_categories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'name' => 'required|regex:/(^([a-zA-z- ]+)(\d+)?$)/u',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
            'unit_id' => 'required',
            'code' => 'required',
            'regular_price' => 'required',
            'selling_price' => 'required',
            'stock_amount' => 'required',
            'reorder_label' => 'required',
            'image' => 'required',

        ],[
                'name.required' => 'Product Name required',
                'category_id.required' => 'The category field is required.',
                'sub_category_id.required' => 'The sub_category field is required.',
                'brand_id.required' => 'The brand field is required.',
                'unit_id.required' => 'The unit field is required.',
                'code.required' => 'The regular price field is required.',
                'regular_price.required' => 'The regular price field is required.',
                'selling_price.required' => 'The selling price field is required.',
                'stock_amount.required' => 'The stock amount field is required.',
                'reorder_label.required' => 'The reorder label field is required.',
                'image.required' => 'The reorder label field is required.'
            ]
        );
        Product::updateProduct($request,$product);
        if ($request->file('others_image')){
            OthersImage::updateOtherImage($request,$product->id);
        }
        return redirect('/product')->with('message','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::deleteProduct($product->id);
        OthersImage::deleteOthersImage($product->id);
        return back()->with('message','Product Deleted Successfully');
    }

    public function getSubCategoryByCategory(){
        return response()->json(SubCategory::where('category_id', $_GET['id'])->get());
    }

    private $message;
    public function updateStatus($id){
        $this->message = Product::updateFeaturedStatus($id);
        return back()->with('message', $this->message);
    }


}
