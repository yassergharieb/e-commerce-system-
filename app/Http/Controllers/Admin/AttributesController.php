<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Attribute;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\AttributeRequest;

class AttributesController extends Controller
{


    public function index()
    {
        $attributes = Attribute::all();

        return view('admin.Attribbutes.index', compact('attributes'));
    }

    public function create()
    {
        return view('admin.Attribbutes.create');
    }

    public function store(AttributeRequest $request)
    {
        $Attribute = new Attribute;
        $Attribute->setTranslation('name', app()->getLocale(), $request->input('name'));

        $Attribute->save();

        return redirect()->route('Attribbutes.index');
    }

    public function edit($id)
    {
        $Attribute = Attribute::find($id);
        if (!$Attribute)
            return redirect()->back()->with(['error' => 'Attribute is not exist']);

        return view('admin.Attribbutes.edit', compact('Attribute'));
    }

    public function update(AttributeRequest $request, $id)
    {
        try {
            $Attribute = Attribute::find($id);
            if (!$Attribute) {
                return redirect()->back()->with(['error' => 'Attribute is not exist']);

            } else {
                DB::beginTransaction();
                $Attribute->setTranslation('name', app()->getLocale(), $request->input('name'));

                $Attribute->update($request->all());
                DB::commit();
                return redirect()->route('Attribbutes.index')->with(['success' => 'Attribute data is updated']);

            }

        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->back()->with(['error' => 'something went wrong']);


        }
    }

    public function destroy($id)
    {

        $Attribute = Attribute::find($id);
        if ($Attribute) {
            $Attribute->delete();

            return redirect()->route('Attribbutes.index')->with(['success' => 'Attribute deleted succefully']);
        } else {
            return redirect()->back()->with(['error' => 'something went wrong']);

        }



    }
}