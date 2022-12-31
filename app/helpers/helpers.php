<?php

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Panel\Coupen;
use Hekmatinasser\Verta\Facades\Verta;

function getDeliveryPrice()
{
    $totalDeliveryPrice = 0;
    foreach (\Cart::getContent() as $product) {
        $totalDeliveryPrice += $product->associatedModel->delivery_amount;
    }
    return $totalDeliveryPrice;
}

function getTotalPrice()
{
    $total = 0;
    foreach (\Cart::getContent() as $product) {
        $total += \Cart::get($product->id)->getPriceSum();
    }
    return $total;
}

function getSumOfTotalAndDeliveryPrice()
{
    $total = getTotalPrice();
    $deliveryPrice = getDeliveryPrice();
    return $total + $deliveryPrice;
}

function checkQuantity($variationQuantity, $requestQuantity)
{
    return $variationQuantity < $requestQuantity;
}

function convert($string)
{
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];

    $num = range(0, 9);
    $convertedPersianNums = str_replace($persian, $num, $string);
    $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

    return $englishNumbersOnly;
}

function createPersianDate($year, $month, $day)
{
    $year = convert($year);
    $month = convert($month);
    $day = convert($day);
    $a = Verta::jalaliToGregorian($year, $month, $day);
    return $a[0] . "-" . $a[1] . "-" . $a[2] . " " . date("h:i:s");
}

function checkCoupen($coupen)
{
    $coupen = Coupen::where('code', $coupen)->where('expired_at', '>=', Carbon::now())->first();
    if ($coupen == null) {
        return ['error' => 'کد تخفیف معتبر نیست'];
    }
    return $coupen;
}

function checkOrder($coupen)
{
    $order = Order::where('user_id', auth()->user())->where('coupon_id', $coupen->id)->where('payment_status', 1)->exists();
    if ($order != null) {
        return ['error', 'کد تخفیف مورد نظر قبلا استفاده شده'];
    }
    return ['success', 'کد تخفیف مورد نظر با موفقیت ثبت شد'];
}
