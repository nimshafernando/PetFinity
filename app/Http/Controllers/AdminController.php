<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function viewApprovalRating()
    {
        $reviews = Review::where('status', 'pending')->get();
        return view('admin.approveratings', compact('reviews'));    
    }
    
    // Approve a review
    public function approve($id)
    {
        $review = Review::findOrFail($id);
        $review->status = 'approved';
        $review->save();

        return redirect()->back()->with('success', 'Review approved successfully.');
    }

    // Decline a review
    public function decline($id)
    {
        $review = Review::findOrFail($id);
        $review->status = 'declined';
        $review->save();

        return redirect()->back()->with('success', 'Review declined successfully.');
    }


}
