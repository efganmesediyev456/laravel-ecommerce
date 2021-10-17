<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminProductCategory extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public $name;
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


    public function mount()
    {
        $this->featured = 0;
        $this->category_id = 1;
        $this->stock_status = "instock";
    }

    public function render()
    {
        $categories = Category::all();
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('livewire.admin.admin-product-category', compact('products', 'categories'))->layout('layouts.admin');
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


        if (empty($this->product_id)) {
            Product::create($data);
            session()->flash('message', 'Category has been created successfully');
        } else {
            Product::whereId($this->product_id)->update($data);
            session()->flash('message', 'Category has been updated successfully');
        }
        $this->emit('toggleFormModal');
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
            'product_id'
        ]);
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product->image) {
            unlink("assets/images/products/" . $product->image);
        }
        if ($product->images) {
            $images = explode(",", $product->images);
            foreach ($images as $img) {
                unlink("assets/images/products/" . $img);
            }
        }
        $product->delete();

        session()->flash('message', 'Product has been deleted successfully');
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function addModal()
    {
        $this->reset([
            'name',
            'slug',
            'short_description',
            'description',
            'regular_price',
            'sale_price',
            'SKU',
            'quantity',
            'category_id',
            'product_id'
        ]);

        $this->featured = 0;
        $this->category_id = 1;
        $this->stock_status = "instock";
    }

    public function editCategory($data){
        $this->emit('toggleFormModal');
        $this->name=$data['name'];
        $this->slug=$data['slug'];
        $this->product_id=$data['id'];
        $this->short_description=$data['short_description'];
        $this->description=$data['description'];
        $this->regular_price=$data['regular_price'];
        $this->sale_price=$data['sale_price'];
        $this->sale_price=$data['sale_price'];
        $this->SKU=$data['SKU'];
        $this->featured=$data['featured'];
        $this->quantity=$data['quantity'];
        $this->stock_status=$data['stock_status'];
        $this->category_id=$data['category_id'];
    }
}
