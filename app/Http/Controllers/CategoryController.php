<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::orderBy('brand', 'asc')->get();
        if (Auth::user()->type == 'admin')
          {
            return view('admin.category.index',compact('categories'));
          }
        else
          {
            return view('Manager.category.index',compact('categories'));
          }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        if (Auth::user()->type == 'admin')
          {
            return view('admin.category.create');
          }
        else
          {
            return view('Manager.category.create');
          }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([]);

        if ($request->image != null)
        {
            $categoryPicture = $request->file('image')->store('public/pics');
            Category::create(array_merge($request->all(), ['image' => $categoryPicture]));
        }
        else
        {

                Category::create($request->all());
        }
        if (Auth::user()->type == 'admin')
          {
           return redirect()->route('Category.index')->with('success','Data has been created successfully.');
          }
        else
          {
            return redirect()->route('manager.category.index')->with('success','Data has been created successfully.');
          }

        

    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category = Category::findOrFail($id);

        if (Auth::user()->type == 'admin')
          {
           return view('admin.category.edit', compact('category'));
          }
        else
          {
            return view('Manager.category.edit', compact('category'));
          }
    }

    



    public function show(string $id): View
    {
        
       $category = Category::findOrFail($id);
        
       
        
        if (Auth::user()->type == 'admin')
          {
           return view('admin.category.show', compact('category'));
          }
        else
          {
           return view('Manager.category.show', compact('category'));
          }
    }

    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request,$id): RedirectResponse
    {
        $this->validate($request, [

        ]);

        $category = Category::findOrFail($id);
        $oldimage=$category->image;

        if ($request->image != null)
        {


            $categoryPicture = $request->file('image')->store('public/pics');

            $category->update([
                'brand'   => $request->brand,
                'image'  => $categoryPicture,
            ]);
            Storage::delete($oldimage);

        }
        else
        {
            $category->update([
                'brand'   => $request->brand,
            ]);
        }
        if (Auth::user()->type == 'admin')
          {
           return redirect()->route('Category.index')->with(['success' => 'Data has been updated successfully']);
          }
        else
          {
            return redirect()->route('manager.category.index')->with('success','Data has been created successfully.');
          }
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
        $category=Category::findOrfail($id);

        $category->delete();
         
        return redirect()->route('Category.index');
                       
    }
    
}
