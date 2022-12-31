<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Panel\Coupen;
use Illuminate\Http\Request;
use Hekmatinasser\Verta\Facades\Verta;

class CoupenController extends Controller
{
    public function index()
    {
        $coupens = Coupen::all();
        return view('panel.coupen.index', compact('coupens'));
    }

    public function create()
    {
        return view('panel.coupen.create');
    }

    public function store(Request $request)
    {
        $avilableCoupen = Coupen::where('code', $request->code)->first();

        if ($avilableCoupen != null) {
            alert()->alert('', 'کد تخفیف موجود است');
            return redirect()->back();
        }

        $request->validate([
            "name" => "required",
            "code" => "required",
            "type" => "required",
            "amount" => "required_if:type,amount",
            "percentage" => "required_if:type,percentage",
            "max_percentage_amount" => "required_if:type,percentage",
            "expired_at" => "required"
        ]);

        list($year, $month, $day) = explode("/", $request->expired_at);
        $date = createPersianDate($year, $month, $day);

        Coupen::create([
            "name" => $request->name,
            "code" => $request->code,
            "type" => $request->type,
            "amount" => $request->amount,
            "percentage" => $request->percentage,
            "max_percentage_amount" => $request->max_percentage_amount,
            "expired_at" => $date,
            "description" => $request->description
        ]);

        alert()->success('', 'کد تخفیف با موفقیت ساخته شد');
        return redirect()->back();
    }

    public function calculateCoupen(Request $request)
    {
        // validation the coupen
        if (!auth()->user()) {
            alert()->success('', 'لطفا ابتدا وارد شوید');
            return redirect()->back();
        }

        $coupen = checkCoupen($request->name);
        if (array_key_exists('error', $coupen)) {
            alert()->alert('', $coupen[0]);
            return redirect()->back();
        }

        $order = checkOrder($coupen);
        if (array_key_exists('error', $order)) {
            alert()->alert('', $coupen[0]);
            return redirect()->back();
        }

        alert()->success('', $coupen[0]);
        return redirect()->back();
    }
}
