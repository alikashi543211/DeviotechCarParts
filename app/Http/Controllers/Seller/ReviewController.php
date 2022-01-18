<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function list()
    {
    	$review_list=auth()->user()->seller_reviews;
    	return view("seller.review.list",get_defined_vars());
    }

    public function delete($id)
    {
    	Review::find($id)->delete();
    	return back()->with("success","Review Deleted Successfully");
    }

    public function changeStatus($id)
    {
    	$review=Review::find($id);
    	if($review->is_approved)
    	{
    		$review->is_approved=false;	
    	}else
    	{
    		$review->is_approved=true;
    	}
    	$review->save();
    	return back()->with("success","Review Status Updated Successfully");
    }
}
