<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $slug = $request->input('slug');
        $type = $request->input('type');

        if($id)
        {
            $product = Product::with('galleries')->find($id);

            if($product)
                return ResponseFormatter::success($product,'Data produk berhasil diambil');
            else
                return ResponseFormatter::error(null,'Data produk tidak ada', 404);

        }

        if($slug)
        {
            $product = Product::with('galleries')
                ->where('slug', $slug)
                ->first();

            if($product)
                return ResponseFormatter::success($product,'Data produk berhasil diambil');
            else
                return ResponseFormatter::error(null,'Data produk tidak ada', 404);

        }

        $product = Product::with('galleries');

        if($type)
            $product->where('type', 'like', '%' . $name .'%');

        return ResponseFormatter::success(
            $product->paginate($limit),
            'Data list produk berhasil diambil'
        );
    }
}
