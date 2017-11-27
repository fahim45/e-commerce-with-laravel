<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\SubImage;
use Illuminate\Http\Request;
use DB;
use Image;

class ProductController extends Controller
{
    public function addProductInfo(){
        $publishedCategories = Category::where('publication_status', 1)->get();
        $publishedBrands = Brand::where('publication_status', 1)->get();
        return view('admin.product.add-product', [
            'publishedCategories'=>$publishedCategories,
            'publishedBrands'=>$publishedBrands
        ]);
    }

    public function saveProductInfo(Request $request){
        $this->validate($request, [
            'product_name'=>'required',
            'product_price'=>'required',
        ]);
        //return $request->all();
        $productImage = $request->file('product_image');
        $imageExtension = $productImage->getClientOriginalExtension();
        $imageName = time().'.'.$imageExtension;
        $directory = 'product-images/';
        $imageUrl = $directory.$imageName;
        Image::make($productImage)->resize(310,350)->save($imageUrl);


        $product = new Product();
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->product_image = $imageUrl;
        $product->publication_status = $request->publication_status;
        $product->save();
        $productId = $product->id;


        $subImages = $request->file('sub_image');
        foreach ($subImages as $subImage){
            $imageExtension = $subImage->getClientOriginalExtension();
            $imageName = str_random(16).'.'.$imageExtension;
            $directory = 'sub-images/';
            $subImageUrl = $directory.$imageName;
            Image::make($subImage)->resize(310,350)->save($subImageUrl);

            $subImage = new SubImage();
            $subImage->product_id = $productId;
            $subImage->sub_image = $subImageUrl;
            $subImage->save();
        }
        return redirect('/product/add-product')->with('message', 'Product Info Added Successfully.');

    }

    public function manageProductInfo(){
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.id', 'products.product_name', 'products.product_price', 'products.product_quantity', 'products.publication_status','categories.category_name', 'brands.brand_name')
            ->get();
        return view('admin.product.manage-product', ['products'=>$products]);
    }

    public function viewProductInfo($id){
        $productById = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            //->join('sub_images', 'products.id', '=', 'sub_images.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name')
            ->where('products.id',$id)
            ->first();

        $subImages = SubImage::where('sub_images.product_id', $id)->get();

        return view('admin.product.view-product',[
            'product'=>$productById,
            'subImages'=>$subImages
        ]);
    }

    public function publishedProductInfo($id){
        $productById = Product::find($id);
        $productById-> publication_status = 1;
        $productById->save();
        return redirect('/product/manage-product')->with('message', 'Product Info Published Successfully.');
    }

    public function unpublishedProductInfo($id){
        $productById = Product::find($id);
        $productById-> publication_status = 0;
        $productById->save();
        return redirect('/product/manage-product')->with('message', 'Product Info Unpublished Successfully.');
    }

    public function editProductInfo($id){
        $productById =DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->join('brands','products.brand_id','=','brands.id')
            ->select('products.*','categories.category_name','brands.brand_name')
            ->where('products.id','=', $id)
            ->first();
        $publishedCategories = Category::where('publication_status',1)->get();
        $publishedBrands = Brand::where('publication_status',1)->get();
        $subImages = SubImage::where('sub_images.product_id','=', $id)->get();

        return view('admin.product.edit-product',[
            'product'=>$productById,
            'publishedCategories'=>$publishedCategories,
            'publishedBrands'=>$publishedBrands,
            'subImages'=>$subImages
        ]);
    }

    public function updateProductInfo(Request $request){


        $productById = Product::find($request->product_id);
        @unlink($productById->product_image);

        $subImages = SubImage::where('sub_images.product_id', '=',$productById->id )->get();
        foreach ($subImages as $subImage){
            @unlink($subImage->sub_image);
            $subImage->delete();
        }

        $productImage = $request->file('product_image');
        $imageExtension = $productImage->getClientOriginalExtension();
        $imageName = time().'.'.$imageExtension;
        $directory = 'product-images/';
        $imageUrl = $directory.$imageName;
        Image::make($productImage)->resize(310,350)->save($imageUrl);


        $productById->product_name = $request->product_name;
        $productById->category_id = $request->category_id;
        $productById->brand_id = $request->brand_id;
        $productById->product_price = $request->product_price;
        $productById->product_quantity = $request->product_quantity;
        $productById->short_description = $request->short_description;
        $productById->long_description = $request->long_description;
        $productById->product_image = $imageUrl;
        $productById->publication_status = $request->publication_status;
        $productById->save();
        $productId = $productById->id;


        $subImages = $request->file('sub_image');
        foreach ($subImages as $subImage){
            $imageExtension = $subImage->getClientOriginalExtension();
            $imageName = str_random(16).'.'.$imageExtension;
            $directory = 'sub-images/';
            $subImageUrl = $directory.$imageName;
            Image::make($subImage)->resize(310,350)->save($subImageUrl);

            $subImage = new SubImage();
            $subImage->product_id = $productId;
            $subImage->sub_image = $subImageUrl;
            $subImage->save();
        }
        return redirect('/product/manage-product')->with('message','Product info update successfully !!');
    }

    public function deleteProductInfo($id){

        $productById = Product::find($id);
        @unlink($productById->product_image);

        $subImages = SubImage::where('sub_images.product_id', '=',$id )->get();
        foreach ($subImages as $subImage){
            @unlink($subImage->sub_image);
            $subImage->delete();
        }

        $productById->delete();
        return redirect('/product/manage-product')->with('message', 'Product Info Deleted Successfully.');
    }
}
