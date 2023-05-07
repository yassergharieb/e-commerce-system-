<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Facades\DB;



class TagsController extends Controller
{


    public function index()
    {
        $tags =  Tag::all();

        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $tag = new Tag;
        $tag->setTranslation('tag_name' , app()->getLocale(), $request->input('tag_name'));
        $tag->slug = $request->slug;
        $tag->save();

        return redirect()->route('tags.index');
    }

    public function edit($id)
    {
         $tag =  Tag::find($id);
         if (!$tag)
         return redirect()->back()->with(['error' => 'tag is not exist']);

        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
       try {
        $tag =  Tag::find($id);
        if (!$tag) {
         return redirect()->back()->with(['error' => 'tag is not exist']);

        } else {
            DB::beginTransaction();
            $tag->setTranslation('tag_name' , app()->getLocale() , $request->input('tag_name'));
            $tag->slug = $request->slug;
            $tag->update($request->all());
            DB::commit();
            return redirect()->route('tags.index')->with(['success' => 'tag data is updated']);

        }

       } catch(\Exception $ex) {
        DB::rollback();
        return redirect()->back()->with(['error' => 'something went wrong']);


       }
    }

    public function destroy($id)
    {

        $tag =  Tag::find($id);
        if ($tag) {
            $tag->delete();

        return redirect()->route('tags.index')->with(['success' => 'tag deleted succefully']);
        } else {
            return redirect()->back()->with(['error' => 'something went wrong']);

        }



    }
}


