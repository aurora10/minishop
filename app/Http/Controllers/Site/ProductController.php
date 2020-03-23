<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use App\Contracts\AttributeContract;
use Cart;


class ProductController extends Controller
{
    protected $productRepository;
    protected $attributeRepository;

    public function __construct(ProductContract $productRepository, AttributeContract $attributeRepository)
    {
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
    }

    public function show($slug)
    {
        $product = $this->productRepository->findProductBySlug($slug);
        $attributes = $this->attributeRepository->listAttributes();

        $latest = Product::latest()->take(5)->get();

        //dd($latest);

        return view('site3.pages.product', compact('product', 'attributes'));


        //dd($product);
    }

    public static function latest_products()
    {


         $products = Product::latest()->take(5)->with('images')->get();


         return $products;

    }

    public static function cart_image($product) {
        $images = Product::find()->images;
    }

    public static function random_products() {
        $randomProducts = Product::inRandomOrder()->take(6)->with('images')->get();

        return $randomProducts;
    }


    public function addToCart(Request $request)
    {


        $product = $this->productRepository->findProductById($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'qty');

        //->with('images')->where('id', $request->input('productId'))


        //$options = array_merge($options, $images->toArray());
//dd($options);


        Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);


        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }
}
