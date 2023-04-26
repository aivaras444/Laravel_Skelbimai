<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skelbimas;
use App\Http\Requests\SkelbimasFormRequest;
use Illuminate\Support\Facades\Auth;

class SkelbimaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('skelbimai.index', [
            'skelbimai' => Skelbimas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('skelbimai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkelbimasFormRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = "$profileImage";
        }
        else{
            $data['image'] = "noImage.png";
        }
    
        Skelbimas::create($data);

        return redirect()->route('skelbimai.manoSkelbimai');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skelbimas $skelbimas)
    {
        return view('skelbimai.show', [
            'skelbimas' => $skelbimas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skelbimas $skelbimas)
    {
        if(Auth::id() == $skelbimas['user_id']){
            return view('skelbimai.edit', [
                'skelbimas' => $skelbimas
            ]);
        }
        else{
            return redirect()->route('skelbimai.show', [
                'skelbimas' => $skelbimas
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkelbimasFormRequest $request, Skelbimas $skelbimas)
    {
        $data = $request->validated();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = "$profileImage";
        }
        else{
            unset($data['image']);
        }
    
        $skelbimas->update($data);

        return redirect()->route('skelbimai.show', $skelbimas->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skelbimas $skelbimas)
    {
        if(Auth::id() == $skelbimas['user_id']){
            $skelbimas->delete();

            return redirect()->route('skelbimai.manoSkelbimai');
        }
        else{
            return redirect()->route('skelbimai.index');
        }
    }

    public function manoSkelbimai()
    {
        $skelbimai = Skelbimas::where('user_id', Auth::id())->get();

        return view('skelbimai.manoSkelbimai', compact('skelbimai'));
    }
}
