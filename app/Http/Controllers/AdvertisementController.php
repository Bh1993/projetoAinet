<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Advertisement;
use App\Media;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::where('blocked', 0)
                                        ->paginate(10);

        return view('advertisements.list', compact('advertisements'));
    }

    public function getShow($id) // Não pode mostrar ads que estejam bloqueados
    {
        
        $advertisement = Advertisement::with('media')->find($id);

        return view('advertisements.display-advertisement', compact('advertisement'));
           
    }

    public function getCreate()
    {
        $advertisement = new Advertisement();
        
        return view('advertisements.add', compact('advertisement'));

    }

    public function getEdit($id)
    {
        $advertisement = Advertisement::find($id);
        return view('advertisements.edit', compact('advertisement'));

    }

    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'available_on' => 'required',
            'available_until' => 'required',
            'price_cents' => 'required',
            'blocked' => ' required',

        ]);

        $advertisement = new Advertisement($request->all());
        
        $advertisement->save();
        return redirect('advertisements');
       
    }

    public function postEdit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'available_on' => '',
            'available_until' => '',
            'price_cents' => '',
            'blocked' => ' ',

        ]);

        $advertisement = Advertisement::find($request->id);

        $advertisement->name = $request->name;
        $advertisement->description = $request->description;
        $advertisement->available_on = $request->available_on;
        $advertisement->available_until = $request->available_until;
        $advertisement->price_cents = $request->price_cents;
        $advertisement->blocked = $request->blocked;

        $advertisement->save();
        return redirect('advertisements');
    }

    public function postDelete($id)
    {
        $advertisement = Advertisement::find($id);
        $advertisement->delete();

        return redirect('advertisements');

    }

    public function postDashboardBlock(Advertisement $advertisement)
    {
        if ($advertisement->blocked == 0) {
            $advertisement->blocked = 1;
        } else {
            $advertisement->blocked = 0;
        }


        $advertisement->save();

        return redirect('advertisements');

    }

    

    public function getAllBlocked()
    {
        $advertisements = Advertisement::where('blocked', 1)->paginate(8);
        return view('advertisements.list',compact('advertisements'));
    }
    

   

}