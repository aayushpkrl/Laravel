<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function showCategories() {
        $categories = ProductCategory::all();
        return view('categories', compact('categories'));
    }

    public function showProductsByCategory(ProductCategory $category) {
        $products = $category->products()->get();
        return view('products_by_category', compact('category', 'products'));
    }
}
