<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class AdminCategory extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $slug;
    public $category_id;
    
    public function render()
    {
        $categories=Category::orderBy('id','desc')->paginate(10);
        return view('livewire.admin.admin-category',compact('categories'))->layout('layouts.admin');
    }
    public function submit(Request $request){
        $this->validate([
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
        $data=[
            'name'=>$this->name,
            'slug'=>$this->slug,
        ];
        if(empty($this->category_id)){
            Category::create($data);
            session()->flash('message','Category has been created successfully');
        }else{
            Category::whereId($this->category_id)->update($data);
            session()->flash('message','Category has been created successfully');
        }
        $this->emit('toggleFormModal');
        $this->reset(['name', 'slug']);
    }

    public function deleteCategory($id){
        Category::find($id)->delete();
        session()->flash('message','Category has been deleted successfully');
    }

    public function generateSlug(){
        $this->slug=Str::slug($this->name);
    }

    public function editCategory($data){
        $this->emit('toggleFormModal');
        $this->name=$data['name'];
        $this->slug=$data['slug'];
        $this->category_id=$data['id'];
    }



  

}
