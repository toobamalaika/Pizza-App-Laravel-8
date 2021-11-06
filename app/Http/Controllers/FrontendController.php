<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\Order;

class FrontendController extends Controller
{
    //
    public function index(Request $request) {

        // get latest pizza list
        if(!$request->category) {
            $pizzas = Pizza::latest()->get();
            return view('frontpage', compact('pizzas'));
        }

        $pizzas = Pizza::where('category',$request->category)->get();
        return view('frontpage', compact('pizzas'));
        
    }

    // pizza detail
    public function show($id) {

        $pizza = Pizza::find($id);
        return view('show' , compact('pizza') );

    }

    // post order
    public function store(Request $request) {
        // get one pizza
        if($request->small_pizza == 0 && $request->medium_pizza == 0 && $request->large_pizza == 0 ) {
            return back()->with('err-message',"Please set at least one pizza");
        }
        if($request->small_pizza < 0 || $request->medium_pizza < 0 || $request->large_pizza < 0 ) {
            return back()->with('err-message',"Invalid order quantity");
        }

        Order::create([
            'date' => $request->date,
            'time' => $request->time,
            'user_id' => auth()->user()->id,
            'pizza_id' => $request->pizza_id,
            'small_pizza' => $request->small_pizza,
            'medium_pizza' => $request->medium_pizza,
            'large_pizza' => $request->large_pizza,
            'body' => $request->body,
            'phone' => $request->phone,
        ]);
        return back()->with('message',"Order has been placed!");

    }

}
