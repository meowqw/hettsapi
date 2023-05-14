<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const CATEGORY_ID = 'category_id';
    public const SIZE_ID = 'size_id';
    public const COLOR_ID = 'color_id';
    public const PRICE_FROM = 'price_from';
    public const PRICE_TO = 'price_to';



    protected function getCallbacks(): array
    {
        return [
            self::SIZE_ID => [$this, 'sizeId'],
            self::COLOR_ID => [$this, 'colorId'],
            self::CATEGORY_ID => [$this, 'categoryId'],
            self::PRICE_FROM => [$this, 'priceFrom'],
            self::PRICE_TO => [$this, 'priceTo'],


        ];
    }

    public function priceFrom(Builder $builder, $value)
    {

        $builder->where('price', '>', $value);

    }

    public function priceTo(Builder $builder, $value)
    {
        $builder->where('price', '<', $value);

    }

    public function categoryId(Builder $builder, $value)
    {
        $builder->where('category_id', $value);

    }

    public function sizeId(Builder $builder, $value)
    {
        $builder->where('size_id', $value);

    }

    public function colorId(Builder $builder, $value)
    {
        $builder->where('color_id', $value);

    }
}
