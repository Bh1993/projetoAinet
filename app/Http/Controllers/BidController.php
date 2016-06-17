<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        
        $bid = Bid::find($id);

        return view('bids.display-bid', compact('bid'));
           
    }
   
    public function getEdit($id)
    {
        $bid = Bid::find($id);
        return view('bids.edit', compact('bid'));

    }

<<<<<<< HEAD
    public function getCreate()
    {
        $bid = new Bid();
        
        return view('farmersmarket.create-bid', compact('bid'));
=======
    public function postCreate($id, Request $request)
    {
        $this->validate($request, [
            'trade_prefs' = 'required',
            'trade_location' = 'required',
            'advertisement_id' = 'required',
            'buyer_id' = 'required',
        ]);        
>>>>>>> 6e9eb5b0b4c1a2ae4ec3f66b7bd638f1114feb4c

    }

<<<<<<< HEAD
=======
    // 0 Canceled ; 1 Pending ; 2 Refused ; 3 Accepted
    

    public function postAccept($id) // status-> 1 - Accepted
    {
        $bid = Bid::find($id);
        $advertisement = Advertisement::find($bid->advertisement_id);
        $bid->status = 3;
        $bid->save();
        $advertisement->available_until = now();
        $advertisement->save();
        return redirect('bids');
    }

    public function postRefuse($id)   // status-> 2 - Refused
    {
        $bid = Bid::find($id);
        $bid->status = 2;
        $bids->save();
        return redirect('bids');
    }

    public function postCancel($id)
    {
        $bid = Bid::find($id);
        $bid->status = 0;
        $bids->save();
        return redirect('bids');
    }
    
    public function postCounterOffer($id, Request $request)
    {
        $bid = Bid::find($id);

        $this->validate($request, [
            'price_cents' => 'required',
            'quantity' => 'required',
        ]);

        $bid->price_cents = $request->price_cents
        $bid->quantity = $request->quantity;
        $bid->updated_at = date("Y-m-d H:i:s");
        $bid->save();
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
>>>>>>> 6e9eb5b0b4c1a2ae4ec3f66b7bd638f1114feb4c

    public function postCreate($id, Request $request)
    {   
        
        $this->validate($request, [
            'trade_location' => 'required',
            'price_cents' => 'required_without_all:trade_prefs,price_cents',
            'trade_prefs' => 'required_without_all:price_cents,trade_prefs',
        ]);
    
        $bid = new Bid();
        $advertisement = Advertisement::find($id);
        

        $bid->quantity = $advertisement->quantity;
        $bid->trade_location = $request->trade_location;
        $bid->advertisement_id = $id;
        $bid->buyer_id = Auth::user()->id;

        $bid->trade_prefs = $request->trade_prefs;
        $bid->price_cents = $request->price_cents;
        $bid->save();
        
        return back();
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
<<<<<<< HEAD

    }

    // 0 Canceled ; 1 Pending ; 2 Refused ; 3 Accepted
    

    public function postAccept($id) // status-> 1 - Accepted
    {
        $bid = Bid::find($id);
        $advertisement = Advertisement::find($bid->advertisement_id);

        $bid->status = 3;
        $bid->save();
        $advertisement->available_until = date("Y-m-d H:i:s");
        $advertisement->save();
        return redirect('/');
    }

    public function postRefuse($id)   // status-> 2 - Refused
    {
        $bid = Bid::find($id);
        $advertisement = Advertisement::find($bid->advertisement_id);

        $bid->status = 2;
        $bid->save();
        return redirect('/');
    }

    public function postCancel(Bid $bid)
    {
        $bid = Bid::find($id);
        
        $bid->status = 0;
        $bid->save();
        return redirect('/');
    }

    public function postCounterOffer(Bid $bid)
    {
        //$bid->status = ;
        $bids->save();
        return redirect('bids.counteroffer');
    }

}