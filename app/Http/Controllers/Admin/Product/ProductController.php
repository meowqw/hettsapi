<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('Admin.products',
            [
                'products' => $products,
                'categories' => $categories,
                'sizes' => $sizes,
                'colors' => $colors
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return Application|Factory|View
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        if (!is_null($data['image'])) {
            $image = $data['image'];
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
            $imageUrl = asset($imagePath);
        }
        unset($data['image']);
        $data['image'] = $imageUrl;
        $product = Product::create($data);
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return $this->index();
    }
}
