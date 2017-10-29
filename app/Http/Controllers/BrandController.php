<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function addBrandInfo(){
        return view('admin.brand.add-brand');
    }

    public function saveBrandInfo(Request $request){
        $this->validate($request,[
            'brand_name'=>'required'
        ]);
        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->publication_status;
        $brand->save();
        return redirect('/brand/add-brand')->with('message', 'Brand Info Added Successfully.');
    }

    public function manageBrandInfo(){
        $brands = Brand::orderBy('id', 'DESC')->get();
        return view('admin.brand.manage-brand', ['brands'=>$brands]);
    }

    public function publishedBrandInfo($id){
        $brandById = Brand::find($id);
        $brandById-> publication_status = 1;
        $brandById->save();
        return redirect('/brand/manage-brand')->with('message', 'Brand Info Published Successfully.');
    }

    public function unpublishedBrandInfo($id){
        $brandById = Brand::find($id);
        $brandById-> publication_status = 0;
        $brandById->save();
        return redirect('/brand/manage-brand')->with('message', 'Brand Info Unpublished Successfully.');
    }

    public function editBrandInfo($id){
        $brandById = Brand::find($id);
        return view('admin.brand.edit-brand',['brand'=>$brandById]);
    }

    public function updateBrandInfo(Request $request){
        $brandById = Brand::find($request->brand_id);
        $brandById->brand_name = $request->brand_name;
        $brandById->brand_description = $request->brand_description;
        $brandById->publication_status = $request->publication_status;
        $brandById->save();
        return redirect('/brand/manage-brand')->with('message', 'Brand Info Updated Successfully.');
    }

    public function deleteBrandInfo($id){
        $brandById = Brand::find($id);
        $brandById->delete();
        return redirect('/brand/manage-brand')->with('message', 'Brand Info Deleted Successfully.');
    }

}
