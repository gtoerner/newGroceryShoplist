<?php

namespace App\Http\Controllers;

use App\Grocery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroceryController extends Controller
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
        return view('grocery', [
            'grocery_items' => Grocery::orderBy('created_at', 'asc')->get()
        ])->with('autofocus', true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/grocery')
                ->withInput()
                ->withErrors($validator)
                ->with('autofocus', true);
        }

        $item = new Grocery;
        $item->name = $request->name;
        $item->save();

        return redirect('/grocery')->with('autofocus', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grocery  $grocery
     * @return \Illuminate\Http\Response
     */
    public function show(Grocery $grocery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grocery  $grocery
     * @return \Illuminate\Http\Response
     */
    public function edit(Grocery $grocery)
    {
        //
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

    public function deleteGroceryItem ($id)
    {
        Grocery::findOrFail($id)->delete();

        return redirect('/grocery')->with('autofocus', true);
    }
}
