<?php

namespace Modules\Resturants\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Resturants\Entities\Resturant;

class ResturantsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $resturants = Resturant::all();
        return response()->json(['resturants'=>$resturants], 200);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('resturants::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name'=> 'required|max:101',
            'description'=> 'required|max:101',
            'rating'=> 'required|max:101',
            'location'=> 'required|max:101',
        ]);

        $resturant = new Resturant;
        $resturant->name = $request->name;
        $resturant->description = $request->description;
        $resturant->rating = $request->rating;
        $resturant->location = $request->location;
        $resturant->save();
        return response()->json(['message' => 'Resturant Added Succesfully'],200);

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $resturants = Resturant::find($id);
        if($resturants)
        {
            return response()->json(['resturants'=>$resturants], 200);
        }
        else
        {
            return response()->json(['message'=>'no record found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('resturants::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name'=> 'required|max:101',
            'description'=> 'required|max:101',
            'rating'=> 'required|max:101',
            'location'=> 'required|max:101',
        ]);

        $resturant = Resturant::find($id);
        if($resturant)
        {
        $resturant->name = $request->name;
        $resturant->description = $request->description;
        $resturant->rating = $request->rating;
        $resturant->location = $request->location;
        $resturant->update();
        return response()->json(['message' => 'Resturant update Succesfully'],200);
        }
        else
        {
            return response()->json(['message' => 'no record found'],404);
        }

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $resturant = Resturant::find($id);
        if($resturant)
        {
            $resturant->delete();
            return response()->json(['message' => 'Resturant delete Succesfully'],200);
        }
        else
        {
            return response()->json(['message' => 'no record found'],404);
        }
    }
}
