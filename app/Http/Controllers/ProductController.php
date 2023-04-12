<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Show all products admin
    public function getProducts()
    {
        $products = Product::paginate(10);

        return view('admin.products', compact('products'));
    }
    //Delete products admin
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Product deleted successfully');
    }
    
    // Edit and update admin
    public function edit(Product $product)
    {
        return view('admin.edit-product', ['product' => $product]);
    }

  

      //Show all products
    public function index(){
        return view('products.index', [
            'products' => Product::latest()->filter(request(['search']))->paginate(4)
        ]);

    }
  

    //Show create from
    public function create(){
        return view('admin.product-create');
    }

    //Store product data
    public function store(Request $request){          
        $formFields = $request->validate([
            'title'=> 'required',
            'price' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);
        //If img is uploaded + add to formFields
        if($request->hasFile('logo')){
            $formFields['logo']= $request->file('logo')->store('logos','public');
        }

        // // Set the user ID for the new product
        //  $formFields['user_id'] = auth()->id();


        Product::create($formFields); 

        return redirect('/admin/products')->with('message', 'Product added successfully!');

    }
      
    //Show single product
    public function show(Product $product){
        return view('products.show',[
            'product' => $product
        ]);

    }
      //Show single product
      public function showA(Product $product){
        return view('admin.show',[
            'product' => $product
        ]);

    }

   // Update product data
    public function update(Request $request, Product $product){

    // Make sure logged in user is owner
        // if($product->user_id != auth()->id()) {
        // abort(403, 'Unauthorized Action');
        // }


    $formFields = $request->validate([
        'title'=> 'required',
        'price' => 'required',
        'tags' => 'required',
        'description' => 'required'
    ]);

    //If img is uploaded + add to formFields
    if($request->hasFile('logo')){
        $formFields['logo']= $request->file('logo')->store('logos','public');
    }

    $product->update($formFields);

    return redirect('/admin/products')->with('message', 'Product updated successfully!');

}


    //Delete product
    public function delete(Product $product){
    $product->delete();
    return redirect('/')->with('message', 'Product deleted successfully');

    }
   

    // Bay products
    public function buy($product) {
        // logic to handle the 'Buy' button click
        return view('/products/buy');
    }
    
}
