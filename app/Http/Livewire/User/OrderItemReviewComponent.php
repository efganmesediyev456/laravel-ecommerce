<?php

namespace App\Http\Livewire\User;

use App\Models\OrderItem;
use App\Models\Review;
use Livewire\Component;

class OrderItemReviewComponent extends Component
{
    public $order_item_id;
    public $raiting;
    public $comment;
    public function mount($order_item_id){
        $this->order_item_id=$order_item_id;
    }
    public function render()
    {
        
        return view('livewire.user.order-item-review-component')->layout("layouts.base");
    }
    public function reviewAdd(){
        $this->validate([
            "raiting"=>"required",
            "comment"=>"required",
        ]);

        $review=new Review([
            "raiting"=>$this->raiting,
            "comment"=>$this->comment,
            "order_item_id"=>$this->order_item_id,
        ]);

        $review->save();

        $order_item=OrderItem::find($this->order_item_id);
        $order_item->rstatus=true;
        $order_item->save();
        session()->flash("message","ugurla geridonusunuz elave olundu Sag olun");
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            "raiting"=>"required",
            "comment"=>"required",
        ]);
    }
}
