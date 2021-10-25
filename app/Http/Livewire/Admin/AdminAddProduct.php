<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValues;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AdminAddProduct extends Component
{




    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $search;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $image;
    public $featured;
    public $quantity;
    public $product_id;
    public $stock_status;
    public $category_id;
    public $images;
    public $product_attribute;
    public $product_attributes=[];
    public $product_attribute_values;


    public function mount()
    {
        $this->featured = 0;
        $this->category_id = 1;
        $this->stock_status = "instock";
        $this->product_attribute=ProductAttribute::first()->id;
    }

    public function render()
    {
        $categories = Category::all();
        $product_attributess=ProductAttribute::all();
        return view('livewire.admin.admin-add-product',compact('categories','product_attributess'))->layout("layouts.admin");
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function add(){
        if(!in_array($this->product_attribute,$this->product_attributes)){
            array_push($this->product_attributes,$this->product_attribute);
        }
    }

    public function submit(Request $request)
    {
      
        
        $data = [
            'name' => $this->name,
            'slug' => $this->slug,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'regular_price' => $this->regular_price,
            'sale_price' => $this->sale_price,
            'SKU' => $this->SKU,
            'featured' => 0,
            'quantity' => $this->quantity,
            'stock_status' => $this->stock_status,
            'category_id' => $this->category_id,
        ];

        if (!empty($this->product_id)) {
            $product = Product::find($this->product_id);
        }

        if ($this->image) {
            $imageName = time() . '.' . $this->image->extension();
            $this->image->storeAs('products', $imageName);
            $data['image'] = $imageName;

            if (!empty($this->product_id)) {
                unlink('assets/images/products/' . $product->image);
            }
        }

        if ($this->images) {

            if (!empty($this->product_id)) {

                $products = explode(',', $product->images);
                foreach ($products as $img) {
                    unlink('assets/images/products/' . $img);
                }
            }
            $imagesNames = '';
            foreach ($this->images as $img) {
                $imageName = uniqid() . '.' . $img->extension();
                $img->storeAs('products', $imageName);
                $imagesNames .= $imageName . ',';
            }
            $data['images'] = rtrim($imagesNames, ',');
        }


     

            $product=Product::create($data);

            foreach($this->product_attribute_values as $key=>$pr){
                ProductAttributeValues::create([
                    "product_attribute_id"=>$key,
                    "product_id"=>$product->id,
                    "value"=>$pr,
                ]);
            }
           
            

            session()->flash('message', 'Category has been created successfully');
        
           
     
        $this->reset([
            'name',
            'slug',
            'short_description',
            'description',
            'regular_price',
            'sale_price',
            'SKU',
            'featured',
            'quantity',
            'stock_status',
            'category_id',
            'product_id',
            'image',
            'images',
        ]);
    }
}
