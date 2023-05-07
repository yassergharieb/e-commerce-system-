<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralProductRequest;
use App\Http\Requests\PriceProductRequest;
use App\Http\Requests\StockDetailsProductRequest;
use Illuminate\Http\Request;
use App\product;
use App\Brand;
use App\Category;

use App\Tag;
use App\Image;

use Illuminate\Support\Facades\DB;



/**
 * Summary of ProductsController
 */
class ProductsController extends Controller
{


    public function index()
    {
    $products =  Product::all();

    return view('admin.products.index' , compact('products'));

    }

    public function create()
    {
    $local =  app()->getLocale();
     $data =  [];
     $data['brands'] = Brand::active()->select()->get();
     $data['tags'] = Tag::select('id' , 'tag_name')->get();
     $data['categories'] =  Category::active()->select('id' , 'category_name')->get();
    //  return $data;
    return view('admin.products.create' , compact('data'));

    }

    public function store(GeneralProductRequest $request)
    {

        DB::beginTransaction();

        try {
            if (!$request->has('is_active')) {
                $request->request->add(['is_active' => 0]);
            } else {
                $request->request->add(['is_active' => 1]);
            }

            $product = Product::create([
                'name' => [
                    app()->getLocale() => $request->name
                ],

                'description' => [
                    app()->getLocale() => $request->description
                ],
                'short_description' => [
                    app()->getLocale() => $request->short_description
                ],
                "brand_id" => $request->brand_id,

                "slug" => $request->slug,
                "is_active" => $request->is_active
            ]);

            $product->categories()->attach($request->categories);

            $product->tags()->attach($request->tags);

            DB::commit();

            return redirect()->route('product.price.create', ['id' => $product->id])->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => 'There was an error creating the product. Please try again.']);
        }
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {





    }



 public function createPrice($id)  {
    $product =  Product::findOrFail($id);
    $id = $product->id;


    return view('admin.products.createPriceDetails' , compact('id'));


  }


  public function createStockDetails($id)  {
    $product =  Product::findOrFail($id);
    $id = $product->id;


    return view('admin.products.createStockDetails' , compact('id'));


  }



  public function storePriceDetails(PriceProductRequest $request ,  $id)  {
    DB::beginTransaction();
    try {
     Product::whereId($request->id)->update($request->only(['price' , 'special_price' ,
     'special_price_type', 'special_price_start' , 'special_price_end'
    ]));
      DB::commit();
    return redirect()->route('product.stock.create' , $request->id )->with(['id'=> $id]);

    } catch(\Exception $ex) {
      DB::rollBack();
    return redirect()->back()->withErrors( ['error'=>'something went wrong, please try again']);

    }
}
 public function storeStockDetails (StockDetailsProductRequest $request, $id) {

    try {

    Product::whereId($request->id)->update($request->except(['_token' , 'product_id'
   ]));
   return redirect()->route('product.images.upload' , $request->id )->with(['id'=> $id]);


    }

    catch (\Exception $ex)
    {

    }

 }




 public function createMultiIMageForProduct($id) {
    $product =  Product::findOrFail($id);
     $id = $product->id;

   return view('admin.products.imagesForm', compact('id'));

  }


    public function saveImages(Request $request)
    {
        // $request->validate([
        //     "photos" => 'required|mimes:png,jpg|array|min:2|max:4'
        // ]);
        $product = Product::findOrFail($request->product_id);

        if ($request->hasFile('photos')) {

            $files = $request->file('photos');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $file_name =  time().'.' . $extension;

                $folder =  'public/assets/images/products';
                $path = public_path('assets/images/products');
                if (!$file->move($path, $file_name)) {
                return redirect()->back()->with(['error' => 'unsuccessful upload']);

                }
             Image::create(['product_id' => $product->id , 'photo' => $folder.'/'.$file_name]);   

            }
        return redirect()->back()->with(['success' => 'successful upload']);


        }

    }



}

















