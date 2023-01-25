<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variant;
use App\Models\Student;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(Request $req)
    {
        //$variants = Product::paginate(10);
        // $variants = DB::all();
        $search = $req['search'] ?? "";
        $search1 = $req['price_from'] ?? "";
        $search2 = $req['price_to'] ?? "";
        $search3 = $req['date'] ?? "";

        if ($search != "" && $search1 != "" && $search2 != "" && $search3 != "") {
            $variants = DB::table('products')
                ->join('product_variants', 'products.id', '=', 'product_variants.product_id')
                ->join('product_variant_prices', 'products.id', '=', 'product_variant_prices.product_id')
                ->where('products.title', 'LIKE', "$search")
                ->whereBetween('product_variant_prices.price', [$search1, $search2])
                ->where('products.created_at', 'LIKE', "$search3%")
                ->paginate(7);
        } else {
            $variants = DB::table('products')
                ->join('product_variants', 'products.id', '=', 'product_variants.product_id')
                ->join('product_variant_prices', 'products.id', '=', 'product_variant_prices.product_id')
                ->paginate(7);
        }

        return view('products.index', compact('variants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $variants = Variant::all();
        return view('products.create', compact('variants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */


    public function store(ProductRequest $req)
    {
        // if ($req->title === null || $req->sku === null || $req->description == null) {
        //     return redirect() - back();
        // }




        $product = new Product;
        $product->title = $req->title;
        $product->sku = $req->sku;
        $product->description = $req->description;
        $product->save();



        $totalid = DB::table('products')->count();
        $totalid = $totalid + 1;

        $info = "thumbnail info";
        $image = new ProductImage;
        $image->product_id = $totalid;
        $image->file_path = $req->file;
        $image->save();



        // $product = new Product();
        // $product->fill($req->all());
        // $product->save();


        //return redirect()->back()->with('success', 'product Saved');
        return redirect()->back();
        //return redirect('product.create');
    }



    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    // public function show($product)
    // {

    // }
    public function show(Product $product)
    {
        // $item = Product::all();
        //echo $item;
        //$data = Member::paginate(2);
        // return view('products.index', compact('item'));
        //  return view('products.index', ['members' => $item]);



        // $variants = Product::paginate(10);
        // return view('products.index', compact('variants'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $variants = Variant::all();
        return view('products.edit', compact('variants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
