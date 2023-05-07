<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $brands = Brand::all();


       return view('admin.Brands.index' , compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
     try {
        if (!$request->has('is_active')) {
            $request->request->add(['is_active' => 0]);
        } else {
            $request->request->add(['is_active' => 1]);
        }

        $file_Name = uploadPhoto('Brands' , $request->photo);

        // dd($file_Name);


        $brand =  new Brand;
        $brand->photo =  $file_Name;
        $brand->is_active =  $request->is_active;


        $brand->setTranslation('brand_name' , app()->getLocale() , $request->input('brand_name') );
        $brand->save();
        return redirect()->route('Brands.index')->with(['success' => 'تم اضافة الماركة التجارية بنجاح']);
     }catch (\Exception $ex) {
        return redirect()->back()->with(['error' => 'حدث خطأ ما']);

     }
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
