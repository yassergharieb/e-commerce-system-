<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
    public function index()
    {

        $locale =  app()->getLocale();
        $categories = Category::Parent()->paginate(5);



        return view('admin.maincategories.index', compact('categories' , 'locale'));
    }

    public function create()
    {

        $categories = Category::all();
        return view('admin.maincategories.create' , compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('categories.index');
    }



    public function edit($id)
    {
        $local =  app()->getLocale();
        $category = Category::find($id);

        if(!$category) {
            return redirect()->route('categories.index')->with(['error' => __('messages.NotFOUNT')]);
        }
        return view('admin.maincategories.edit', compact('category' , 'local'));
    }

    public function update(CategoryRequest $request, $id)

    {


      try {


        if(!$request->has('is_active')) {
            $request->request->add(['is_active' => 0 ]);
        } else {
            $request->request->add(['is_active' => 1 ]);
        }
        $category = Category::find($id);


        $category->setTranslations('category_name' , [
          app()->getLocale() => $request->category_name
        ]);


        $category->slug = $request->slug;
        $category->update($request->all());
        return redirect()->route('categories.index')->with(['success' => __('message.category_add_success')]);

      } catch ( \Exception $ex) {
          return redirect()->back()->with(['error' => __('messages.generalErrorMessage')]);
      }

    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index');
    }
}
