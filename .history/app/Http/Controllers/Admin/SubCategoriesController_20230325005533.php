<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\SubCategoryRequest;
use Illuminate\Http\Request;
use App\Category;

use Illuminate\Support\Carbon;

/**
 * Summary of SubCategoriesController
 */
class SubCategoriesController extends Controller
{
    public function index()
    {

        $locale = app()->getLocale();
        $subCategories = Category::Child()->paginate(5);

        // foreach  ($subCategories as $subCategory) {
        //     $parent_id = $subCategory->parent_id;
        //     $main_cat_name =  Category::select('category_name')->find($parent_id);


        // };






        return view('admin.SubCategories.index', compact('subCategories', 'locale'));
    }

    public function create()
    {

        $parent_categories = Category::parent()->get();
        return view('admin.SubCategories.create', compact('parent_categories'));
    }

    /**
     * Summary of store
     * @param SubCategoryRequest $request
     * @return never
     */
    public function store(SubCategoryRequest $request)
    {




      try {

        if (!$request->has('is_active')) {
            $request->request->add(['is_active' => 0]);
        } else {
            $request->request->add(['is_active' => 1]);
        }


        $category = new Category;
        $category->setTranslation(
            'category_name', app()->getLocale(),
            $request->input('category_name')
        );
        $category->is_active = $request->input('is_active');
        $category->parent_id = $request->input('parent_id');
        $category->slug = $request->input('slug');

        $category->save();
      return redirect()->route('SubCategories.index')->with(['success' => __('message.category_add_success')]);

      } catch (\Exception $ex) {
      return redirect()->back()->with(['error' => __('messages.generalErrorMessage')]);

      }







    }



    public function edit($id)
    {
        $local = app()->getLocale();
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('SubCategories.index')->with(['error' => __('messages.NotFOUNT')]);
        }
        return view('admin.maincategories.edit', compact('category', 'local'));
    }

    public function update(CategoryRequest $request, $id)
    {


        try {


            if (!$request->has('is_active')) {
                $request->request->add(['is_active' => 0]);
            } else {
                $request->request->add(['is_active' => 1]);
            }
            $category = Category::find($id);


            $category->setTranslations('category_name', [
                app()->getLocale() => $request->category_name
            ]);


            $category->slug = $request->slug;
            $category->update($request->all());
            return redirect()->route('Subcategories.index')->with(['success' => __('message.category_add_success')]);

        } catch (\Exception $ex) {
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
