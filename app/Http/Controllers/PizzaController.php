<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PizzaStoreRequest;
use App\Models\Pizza;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //grab all pizza
        $pizzas = Pizza::paginate(5);
        return view('pizza.index', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pizza.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PizzaStoreRequest $request)
    {
        $path = $request->image->store('public/pizza');
        Pizza::create([
            'name' => $request->name,
            'description' => $request->description,
            'small_pizza_price' => $request->small_pizza_price,
            'medium_pizza_price' => $request->medium_pizza_price,
            'large_pizza_price' => $request->large_pizza_price,
            'category' => $request->category,
            'image' => $path,
        ]);
        return redirect()->route('pizza.index')->with('message','Pizza added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pizza = Pizza::find($id);
        return view('pizza.edit',compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PizzaStoreRequest $request, $id)
    {
        //grab pizza id
        $pizza = Pizza::find($id);
        if($request->has('image')) {
            $path = $request->image->store('public/pizza');
        }
        else {
            $path = $pizza->image;
        }
        // $pizza = new Pizza;
        $pizza->name = $request->name;
        $pizza->description = $request->description;
        $pizza->small_pizza_price = $request->small_pizza_price;
        $pizza->medium_pizza_price = $request->medium_pizza_price;
        $pizza->large_pizza_price = $request->large_pizza_price;
        $pizza->category = $request->category;
        $pizza->image = $path;
        $pizza->update();
        return redirect()->route('pizza.index')->with('message','Pizza updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete against id
        Pizza::find($id)->delete();
        return redirect()->route('pizza.index')->with('message','Pizza deleted successfully!');
    }
}
