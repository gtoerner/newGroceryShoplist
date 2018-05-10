<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('add_category', [
            'category_items' => Category::orderBy('name', 'asc')->get()
        ])->with('autofocus', true);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/add_category')
                ->withInput()
                ->withErrors($validator)
                ->with('autofocus', true);
        }

        $item = new Category;
        $item->name = $request->name;
        $item->save();

        return redirect('/add_category')->with('autofocus', true);
    }

    public function deleteCategoryItem ($id)
    {
        Category::findOrFail($id)->delete();

        return redirect('/add_category')->with('autofocus', true);
    }

}
