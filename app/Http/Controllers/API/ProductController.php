<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductDeleteRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductEditRequest;
use App\Http\Resources\ProductsResource;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Class ProductController
 *
 * @package App\Http\Controllers\API
 */
class ProductController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $page = $request->post('page', 1);
        $limit = 10;
        $offset = ($page - 1) * $limit;

        return response()->json([
            'list' => ProductsResource::collection( Product::query()
                    ->limit($limit)
                    ->offset($offset)
                    ->get() ?? []),
        ]);
    }

    /**
     * @param ProductStoreRequest $request
     */
    public function store(ProductStoreRequest $request)
    {
        (new Product())->fill($request->all())->save();
    }

    /**
     * @param ProductEditRequest $request
     */
    public function edit(ProductEditRequest $request)
    {
        $model = Product::findOrFail($request->post('id'));
        $model->fill($request->all())->save();
    }

    /**
     * @param ProductDeleteRequest $request
     */
    public function delete(ProductDeleteRequest $request)
    {
        $model = Product::findOrFail($request->post('id'));
        $model->delete();
    }
}
