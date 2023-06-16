<?php

namespace App\Http\Controllers\Admin;


use App\Option;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Product;
use App\Attribute;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $options = Option::select('id' , 'product_id' , 'attribute_id' , 'name' , 'price')->get();


       return view('admin.Options.index' , compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $data =  [];
      $data['products'] =  Product::active()->get();
      $data['attributes'] =  Attribute::all();
    //   return $data;
         return view('admin.Options.create' , compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
     Option::create($request->except('_token'));
     }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand  =  Brand::find($id);

        return view('admin.Brands.edit' , compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        $brand =  Brand::find($id);

        if ($request->has('photo')) {
            // $old_photo_path  =  'public/assets/images/Brands/'. $brand->photo;


            File::delete(public_path($brand->photo));
            $file =  uploadPhoto('Brands' , $request->photo);
            $brand->where('id' , $id)->update([
                   'photo'  =>  $file
            ]);

        }

        if (!$request->has('is_active')) {
            $request->request->add(['is_active' => 0]);
        } else {
            $request->request->add(['is_active' => 1]);
        }

        $brand->setTranslation('brand_name' , app()->getlocale() , $request->brand_name);
        $brand->update($request->except('id' , '_token' , 'photo'));
        return redirect()->route('Brands.index')->with(['success' => 'تم اضافة الماركة التجارية بنجاح']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
