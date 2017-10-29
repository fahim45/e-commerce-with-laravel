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
        $imageName  =   $productImage->getClientOriginalName();
        $directory = 'product-image/';
        $imageUrl   = $directory.$imageName;
        Image::make($productImage)->save($imageUrl);

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
            $subImageName  =   $subImage->getClientOriginalName();
            $subImageDirectory = 'sub-images/';
            $subImageUrl = $subImageDirectory.$subImageName;
            Image::make($subImage)->save($subImageUrl);

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
            ->join('sub_images', 'products.id', '=', 'sub_images.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name', 'sub_images.sub_image')
            ->where('products.id',$id)
            ->first();
        return view('admin.product.view-product',['product'=>$productById]);
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
        $productById = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.edit-product', ['product'=>$productById, 'categories'=>$categories, 'brands'=>$brands]);
    }

    public function updateProductInfo(Request $request){

        $productImage = $request->file('product_image');
        $imageName  =   $productImage->getClientOriginalName();
        $directory = 'product-image/';
        $imageUrl   = $directory.$imageName;
        Image::make($productImage)->save($imageUrl);


        $productById = Product::find($request->product_id);
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
            $subImageName  =   $subImage->getClientOriginalName();
            $subImageDirectory = 'sub-images/';
            $subImageUrl = $subImageDirectory.$subImageName;
            Image::make($subImage)->save($subImageUrl);

            $subImage = new SubImage();
            $subImage->product_id = $productId;
            $subImage->sub_image = $subImageUrl;
            $subImage->save();
        }
        return redirect('/product/manage-product')->with('message', 'Product Info Updated Successfully.');
    }

    public function deleteProductInfo($id){
        $product = Product::find($id);
        @unlink($product->product_image);
        $subImages = SubImage::where('sub_images.product_id', '=', $id)->get();
        foreach ($subImages as $subImage){
            @unlink(asset('/').$subImage);
        }
        $product->delete();
        return redirect('/product/manage-product')->with('message', 'Product Info Deleted Successfully.');
    }
}
