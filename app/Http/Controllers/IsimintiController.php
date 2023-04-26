<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Isimintas;
use Illuminate\Support\Facades\Auth;
use App\Models\Skelbimas;

class IsimintiController extends Controller
{
    public function index()
    {
        $isiminti = Isimintas::where('user_id', Auth::id())->get();

        return view('isiminti.index', compact('isiminti'));
    }

    public function add(Request $request)
    {
        $skelbimo_id = $request->input('skelbimo_id');
            if(Skelbimas::find($skelbimo_id)){
                if(Isimintas::where('skelbimo_id', $skelbimo_id)->where('user_id', Auth::id())->exists()){
                    
                    $isimintas = Isimintas::where('skelbimo_id', $skelbimo_id)->where('user_id', Auth::id())->first();
                    $isimintas->delete();
                    return redirect()->back();
                }
                else{
                    $isimintas = new Isimintas();
                    $isimintas->skelbimo_id = $skelbimo_id;
                    $isimintas->user_id =Auth::id();
                    $isimintas->save();

                    return redirect()->back();
                }
            }
            else{
                return redirect()->back();
            }
    }
}
