<?php

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
