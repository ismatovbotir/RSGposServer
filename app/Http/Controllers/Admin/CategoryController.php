<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tree=[];
        $root=Category::whereNull('category_id')->select('id','name')->orderBy('id')->get()->toArray();
        //dd($root);
        foreach($root as $item){

            $tree[]=[
                'id'=>$item['id'],
                'name'=>$item['name'],
                
                'child'=>$this->getChild($item['id'])
            ];
            //dd($tree);
        }
        dd($tree);
        
        $data=Category::withCount('items')->get();
        return view('admin.category.index',['data'=>$data]);
    }

    public function getChild($id){
        $childTree=[];
        $childrenCol=Category::where('category_id',$id)->select('id','name')->get();
        //dd($childrenCol);
        if (!$childrenCol){
            return 0;
        }
        $children=$childrenCol->toArray();
        foreach($children as $child){
            $childTree[]=[
                'id'=>$child['id'],
                'name'=>$child['name'],
                'child'=>$this->getChild($child['id'])
            ];
            //dd($childTree);
            

        }
        return $childTree;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
   
}
