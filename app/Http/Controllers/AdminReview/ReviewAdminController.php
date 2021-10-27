<?php

namespace App\Http\Controllers\AdminReview;

use App\Http\Controllers\Controller;
use App\Models\CustomerSignup;
use App\Models\Reviews\Reply;
use App\Models\Reviews\Reviews;
use Illuminate\Http\Request;

class ReviewAdminController extends Controller
{
    //
    public function index()
    {

        $review=Reviews::where('aproval_status',0)
        ->with('reviewOfCustomer')
        ->paginate(2);
        return view('AdminReview.adminNewReview',["user_reviews"=>$review]);
    }

    public function AcceptReview(Request $request)
    {
          $review=Reviews::where('id', $request->review_id)->first();
          $review->aproval_status=1;
          $review->save();
          return redirect()->route('admin.newReview');
    }

    public function DenyReview(Request $request)
    {
        $review=Reviews::where('id', $request->review_id)->first();
          $review->aproval_status=2;
          $review->save();
          return redirect()->route('admin.newReview');
    }


    public function ReplyReview(Request $request)
    {
        //updating the status to Approved due to reply
        $review=Reviews::where('id', $request->reply_to)->first();
        $review->aproval_status=1;

        $reply=new Reply();
        $reply->reply_to_review=$request->reply_to;
        $reply->reply_message=$request->reply;
        if($reply->save() && $review->save())
        {
            return redirect()->route('admin.newReview');
        }


    }

    public function ReviewView()
    {
        $review=Reviews::where('aproval_status',1)
        ->where('delete_status',0)
        ->paginate(3);
        return view('AdminReview.adminReviewFontendMangement',["user_reviews"=>$review]);
    }

    public function deleteReviewView(Request $request)
    {
         $review=Reviews::find($request->del_review);
         $review->delete_status=1;
         if($review->save())
         {
             return redirect()->route('admin.ReviewView');
         }
    }
}
