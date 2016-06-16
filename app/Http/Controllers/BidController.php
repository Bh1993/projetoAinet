<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Advertisement;
use App\User;
use App\Bid;

class BidController extends Controller
{
    public function index()
    {
        $bids = Bid::paginate(10);

        return view('bids.list', compact('bids'));
    }

    public function getShow($id)
    {
        
        $bid = Bid::with('advertisement')->find($id);

        return view('bids.display-bid', compact('bid'));
           
    }

    public function getCreate()
    {
        $bid = new Bid();
        
        return view('bids.add', compact('bid'));

    }

    public function getEdit($id)
    {
        $bid = Bid::find($id);
        return view('bids.edit', compact('bid'));

    }

    public function postCreate($id, Request $request)
    {
        $this->validate($request, [
            'trade_prefs' = 'required',
            'trade_location' = 'required',
            'advertisement_id' = 'required',
            'buyer_id' = 'required',
        ]);        

        $bid = new Bid($request->all());

        $bid->save();
        return redirect('bids');
       
    }

    // 0 Canceled ; 1 Pending ; 2 Refused ; 3 Accepted
    

    public function postAccept(Bid $bid) // status-> 1 - Accepted
    {
        $advertisement = Advertisement::find($bid->advertisement_id);
        $bid->status = 3;
        $bid->save();
        $advertisement->available_until = now();
        $advertisement->save();
        return redirect('bids');
    }

    public function postRefuse(Bid $bid)   // status-> 2 - Refused
    {
        $bid->status = 2;
        $bids->save();
        return redirect('bids');
    }

    public function postCancel(Bid $bid)
    {
        $bid->status = 0;
        $bids->save();
        return redirect('bids');
    }

    public function postCounterOffer(Bid $bid)
    {
        //$bid->status = ;
        $bids->save();
        return redirect('bids.counteroffer');
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

    

    public function postBlock(Advertisement $bid)
    {
        if ($bid->blocked == 0) {
            $bid->blocked = 1;
        } else {
            $bid->blocked = 0;
        }

        $bid->save();

        return redirect('bids');
    }

    

   

}