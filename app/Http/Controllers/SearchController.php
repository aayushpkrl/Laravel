<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class SearchController extends Controller
{
    public function searchProducts(Request $request) {
        $query = $request->input('q');

        $products = collect();

        if ($query) {
            $products = Product::where('title', 'like', '%'. $query . '%' )->get();

            if($products->isEmpty()) {
                $matching_categories = ProductCategory::where('title', 'like', '%' . $query . '%')->get();

                if ($matching_categories->isNotEmpty()) {
                    $categoryIds = $matching_categories->pluck('id')->toArray();

                    $products = Product::whereIn('product_category_id', $categoryIds)->get();
                }
            }
        }

        return view('search_results', compact('products', 'query'));
    }

    public function searchCategories(Request $request) {
        $query = $request->input('q');
        $categories = collect();

        if ($query) {
                $products = Product::where('title', 'like', '%'. $query . '%' )->get();
        }

        return view('search_results', compact('categories', 'query'));
    }
}
