<div class="row" style="margin-top: 40px;">
    <div class="col-md-10 col-md-offset-1">
        
    

                                @if(Session::has("message"))
                                    <div class="alert alert-success">{{Session::get("message") }}</div>
                                @endif
                               
                                <ul class="list-group">
                                    <li class="list-group-item">
                                    Order Id <span class="badge">{{ $order->id }}</span>
                                    </li>
                                    <li class="list-group-item">
                                    Order Date <span class="badge"> {{ $order->created_at }}</span>
                                    </li>
                                    <li class="list-group-item">
                                    Status <span class="badge"> {{ $order->status }}</span>
                                    </li>
                                    <li class="list-group-item">
                                    @if($order->status=="delivered")
                                    Delivry date <span class="badge">  {{ $order->delivered_date }}</span>
                                    @endif
                                    @if($order->status=="ordered")
                                    Ordered date <span class="badge">  {{ $order->created_at }}</span>
                                    <a class="btn btn-warning btn-sm" wire:click.prevent="orderCanceled({{ $order->id }})">Cancel</a>
                                    @endif
                                    @if($order->status=="canceled")
                                    Canceled date <span class="badge">  {{ $order->canceled_date }}</span>
                                    
                                    @endif
                                    </li>
                                </ul>                  
                                



    <div class="panel panel-danger">
  <!-- Default panel contents -->
  <div class="panel-heading">User Order Details</div>
  

  <!-- Table -->
  <div class="table-responsive">
                                                       <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            Id
                                                                        </th>
                                                                        <th>
                                                                            Image
                                                                        </th>
                                                                        <th>
                                                                            Product Name
                                                                        </th>
                                                                        <th>
                                                                            Short Description 
                                                                        </th>
                                                                        <th>
                                                                            Description
                                                                        </th>
                                                                        <th>
                                                                            Regular Price
                                                                        </th>
                                                                        <th>
                                                                            Sale Price
                                                                        </th>
                                                                        <th>
                                                                            Sku
                                                                        </th>
                                                                        <th>
                                                                            Stock status
                                                                        </th>
                                                                        <th>
                                                                            featured
                                                                        </th>
                                                                        <th>
                                                                            Order Id
                                                                        </th>
                                                                        <th>
                                                                            quantity
                                                                        </th>
                                                                        
                                                                        <th>
                                                                            Price
                                                                        </th>
                                                                       
                                                                        
                                                                        <th>
                                                                            Created At
                                                                        </th>
                                                                        
                                                                       


                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                        @foreach($order->order_items as $ord)
                                                                       
                                                                            <tr>
                                                                                <td>
                                                                                    {{$ord->id}}
                                                                                </td>
                                                                                <td>
                                                                                <img  src="{{ asset('assets/images/products') }}/{{$ord->product->image}}"/>
                                
                                                                                </td>
                                                                                    <td>
                                                                                        {{$ord->product->name}}
                                                                                    </td>
                                                                                    <td>
                                                                                    {{ \Illuminate\Support\Str::limit($ord->product->short_description, 50, $end='...') }}
                                                                                    
                                                                                     </td>
                                                                                  <td>
                                                                                  {{ \Illuminate\Support\Str::limit($ord->product->description, 50, $end='...') }}
                                                                                  </td>
                                                                                  <td>
                                                                                      {{$ord->product->regular_price}}
                                                                                  </td>
                                                                                  <td>
                                                                                      {{$ord->product->sale_price}}
                                                                                  </td>
                                                                                  <td>
                                                                                      {{$ord->product->SKU}}
                                                                                  </td>
                                                                                  <td>
                                                                                      {{$ord->product->stock_status}}
                                                                                  </td>
                                                                                  <td>
                                                                                      {{$ord->product->featured}}
                                                                                  </td>
                                                                                  <td>
                                                                                      {{$ord->order_id}}
                                                                                  </td>
                                                                                  <td>
                                                                                      {{$ord->quantity}}
                                                                                  </td>
                                                                                  <td>
                                                                                      {{number_format($ord->quantity * $ord->price,2)}}
                                                                                  </td>
                                                                                 
                                                                                  <td>
                                                                                      {{$ord->created_at}}
                                                                                  </td>

                                                                                 
                                                                                  @if($ord->rstatus==false && $order->status=="delivered")
                                                                                  <td>
                                                                                      <a href="{{route('user.review',['order_item_id'=>$ord->id])}}">Write Review</a>
                                                                                  </td>
                                                                                  @endif
                                                                                  
                                                                            </tr>
                                                                        @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                        <th>
                                                                            Id
                                                                        </th>
                                                                        <th>
                                                                            Image
                                                                        </th>
                                                                        <th>
                                                                            Product Name
                                                                        </th>
                                                                        <th>
                                                                            Short Description 
                                                                        </th>
                                                                        <th>
                                                                            Description
                                                                        </th>
                                                                        <th>
                                                                            Regular Price
                                                                        </th>
                                                                        <th>
                                                                            Sale Price
                                                                        </th>
                                                                        <th>
                                                                            Sku
                                                                        </th>
                                                                        <th>
                                                                            Stock status
                                                                        </th>
                                                                        <th>
                                                                            featured
                                                                        </th>
                                                                        <th>
                                                                            quantity
                                                                        </th>
                                                                        <th>
                                                                            Order Id
                                                                        </th>
                                                                        <th>
                                                                            Price
                                                                        </th>
                                                                      
                                                                        
                                                                        <th>
                                                                            Created At
                                                                        </th>
                                                                        
                                                                    </tr>
                                                                </tfoot>
                                                        </table>
  </div>
    </div>
    </div>
</div>
