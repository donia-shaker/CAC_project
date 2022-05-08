<?php

namespace App\Http\Controllers\user;
use App\Models\Auction;
use App\Models\PaymentMethode;
use App\Models\Category;
use App\Models\Models;
use App\Models\order;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAuctionController extends Controller
{
    public function bid_auction(Request $request,$id)
    {
        $auction=new Auction();
        $post=Post::find($id);
        $payment= PaymentMethode::select()->where('user_id', Auth::id())->get();
       $available=$post->auction_ceiling;
        Validator::validate($request->all(),[

            'amount' => "required|numeric|min:$available",
        ],[
            'amount.required'=>' مبلغ المزايدة مطلوب  ',
            'amount.numeric'=>' صيغة المبلغ غير مقبولة ',
            'amount.min'=>" لاتقبل المزايدة بمبلغ اقل من  $available ",
        ]);

       
        
     $money=50000;

     if($money>=$request->discount)
    {
        $auction->date= now();
        $auction->bid_amount=$request->amount;
        $auction->owner_user_id=$post->user_id;
        $auction->post_id=$post->id;
        $auction->is_active=1;
        $auction->payment_methode_id=$payment->id;

    }
        $user_id=Auth::id();
    
    }


    public function showauctions(){
     
        $id=Auth::id();
        $posts=Post::with(['auctions'])->get();
        $auctions=Auction::with('auction_post')->where('aw_user_id', $id)->get();
    //    return $posts;
        return view('client.showauctions', [
            'posts'     => $posts
    
        ]);
}

public function complate(){
       
    $id=Auth::id();
    $order = order::With(['post.auctions'])->where('user_id', $id)->get();

    return view('client.UserComplateAuctions', [
        'orders' => $order,
        
    ]);
}


public function uncomplate(){
$id=Auth::id();

$auction=Auction::with(['auction_post'])->where('aw_user_id',$id)->where('is_active',1)->get();

    $id=Auth::id();
    return view('client.UserUncomplateAuctions', [
        'auctions'     => $auction
    ]);

}

}
