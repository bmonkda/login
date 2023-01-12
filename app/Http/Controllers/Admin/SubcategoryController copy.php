<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.subcategories.index')->only('index');
        $this->middleware('can:admin.subcategories.create')->only('create', 'store');
        $this->middleware('can:admin.subcategories.edit')->only('edit', 'update');
        $this->middleware('can:admin.subcategories.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('admin.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:subcategories'
        ]);

        $subcategory = Subcategory::create($request->all());
        return redirect()->route('admin.subcategories.edit', $subcategory)->with('info', 'La subcategoría se creó con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        return view('admin.subcategories.edit', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:subcategories,slug,$subcategory->id"
        ]);
        $subcategory->update($request->all());
        
        return redirect()->route('admin.subcategories.edit', $subcategory)->with('info', 'La subcategoría se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('admin.subcategories.index')->with('info', 'La subcategoría se eliminó con éxito');
    }
}
