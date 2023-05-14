<?php

namespace App\Services\Order;

use App\Models\Order;

class Service
{
    public function store(array $data)
    {
        $products = $data['products'];
        unset($data['products']);
        $productsIds = $this->getProductIds($products);

        $order = Order::create($data);
        $order->products()->attach($productsIds);
        return $order;
    }

    private function getProductIds(array $products): array
    {
        $productIds = [];
        foreach ($products as $product) {
            $productIds[] = $product["id"];
        }

        return $productIds;
    }

}
