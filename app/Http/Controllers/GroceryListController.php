<?php

namespace App\Http\Controllers;

use App\Grocery;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroceryListController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*
        return view('grocerylist', [
            'grocery_items' => Grocery::orderBy('name', 'asc')->get()
        ])->with('autofocus', true);
*/
        return View('grocerylist')
            ->with('grocery_items', Grocery::orderBy('category', 'asc')->get() )
            ->with('category_items', Category::orderBy('name', 'asc')->get() );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setActive(Request $request)
    {
        $itemid = Grocery::findOrFail($request->id);
        $itemid->isActive = 1;
        $itemid->save();

        return redirect('/grocerylist')->with('autofocus', true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function removeActive($id)
    {
        $itemid = Grocery::findOrFail($id);
        $itemid->isActive = 0;
        $itemid->save();

        return redirect('/grocerylist')->with('autofocus', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grocery  $grocery
     * @return \Illuminate\Http\Response
     */
    public function newList()
    {
        Grocery::where('isActive', 1)
            ->update(['isActive' => 0]);

        Grocery::where('isClicked', 1)
            ->update(['isClicked' => 0]);

        return redirect('/grocerylist')->with('autofocus', true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grocery  $grocery
     * @return \Illuminate\Http\Response
     */
    public function setClicked($id)
    {
        $itemid = Grocery::findOrFail($id);
        $itemid->isClicked = 1;
        $itemid->save();

        return redirect('/grocerylist')->with('autofocus', true);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grocery  $grocery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grocery $grocery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grocery  $grocery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grocery $grocery)
    {
        //
    }
}
