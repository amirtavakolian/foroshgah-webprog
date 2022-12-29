<?php

namespace App\Http\Controllers\Panel;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{

    public function index()
    {
        $comments = Comment::all();
        return view('panel.comment.index', compact('comments'));
    }

    public function store($productID, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'review' => "required|min:5"
        ]);

        if ($validator->fails()) {
            return redirect()->to(url()->previous() . "#des-details2")->withErrors($validator);
        }

        Comment::create([
            'user_id' => Auth::user()->id,
            'product_id' => $productID,
            'approved' => 0,
            'text' => $request->review
        ]);
        Alert::success('', 'نظر شما بعد از تایید؛ نمایش داده خواهد شد');
        return redirect()->back();
    }

    public function approveComment(Comment $comment)
    {
        $approve = $comment->update(
            ["approved" => 1]
        );
        if (!$approve) {
            return response('خطا در تایید کامنت. مجددا تست کنید');
        }
        return response('کامنت با موفقیت تایید شد');
    }

    public function cancelComment(Comment $comment)
    {
        $approve = $comment->update(
            ["approved" => 0]
        );
        if (!$approve) {
            return response('خطا در تایید کامنت. مجددا تست کنید');
        }
        return response('کامنت با موفقیت لغو شد');
    }

    public function fullcomment(Comment $comment)
    {
        return $comment->fullcomment;
    }
}
