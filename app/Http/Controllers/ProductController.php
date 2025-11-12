<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function index(): JsonResponse {
        return response()->json(Product::all());
    }

    public function show($id): JsonResponse {
        $product = Product::find($id);
        if (!$product) return response()->json(['error' => 'No encontrado'], 404);
        return response()->json($product);
    }

    public function store(Request $request): JsonResponse {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image_url' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'nullable|string',
            'is_new' => 'boolean'
        ]);
        $product = Product::create($data);
        return response()->json($product, 201);
    }

    public function update(Request $request, $id): JsonResponse {
        $product = Product::find($id);
        if (!$product) return response()->json(['error' => 'No encontrado'], 404);

        $data = $request->validate([
            'name' => 'sometimes|string',
            'description' => 'sometimes|string',
            'image_url' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'category' => 'sometimes|string',
            'is_new' => 'sometimes|boolean'
        ]);

        $product->update($data);
        return response()->json($product);
    }

    public function destroy($id): JsonResponse {
        $product = Product::find($id);
        if (!$product) return response()->json(['error' => 'No encontrado'], 404);
        $product->delete();
        return response()->json(['message' => 'Eliminado correctamente']);
    }
}
