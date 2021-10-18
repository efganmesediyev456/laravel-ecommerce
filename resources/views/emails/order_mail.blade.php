<style>


</style>

<table class="table" style="border-collapse: collapse; border: 1px solid black; width: 100%;">
    <thead>
        <tr>
            <th style="border: 1px solid black;">
                Id
            </th>
            <th style="border: 1px solid black;">
                Image
            </th>
            <th style="border: 1px solid black;">
                Product Name
            </th>
            <th style="border: 1px solid black;">
                Short Description
            </th>
            <th style="border: 1px solid black;">
                Description
            </th>
            <th style="border: 1px solid black;">
                Regular Price
            </th>
            <th style="border: 1px solid black;">
                Sale Price
            </th>
            <th style="border: 1px solid black;">
                Sku
            </th>
            <th style="border: 1px solid black;">
                Stock status
            </th>
            <th>
                featured
            </th>
            <th>
                quantity
            </th>
            <th style="border: 1px solid black;">
                Order Id
            </th>
            <th style="border: 1px solid black;">
                Price
            </th>
            <th style="border: 1px solid black;">
                Quantity
            </th>

            <th style="border: 1px solid black;">
                Created At
            </th>

        </tr>
    </thead>
    <tbody>
        @foreach($order->order_items as $ord)
        <tr>
            <td style="border: 1px solid black;">
                {{$ord->id}}
            </td>
            <td style="border: 1px solid black;">
                <img src="{{asset('assets/images/products/'.$ord->product->image)}}" style="width:200px; height:100px;" />

            </td>
            <td style="border: 1px solid black;">
                {{$ord->product->name}}
            </td>
            <td style="border: 1px solid black;">
                {{ $ord->product->short_description}}

            </td>
            <td style="border: 1px solid black;">
                {{ $ord->product->description }}
            </td>
            <td style="border: 1px solid black;">
                {{$ord->product->regular_price}}
            </td>
            <td style="border: 1px solid black;">
                {{$ord->product->sale_price}}
            </td>
            <td style="border: 1px solid black;">
                {{$ord->product->SKU}}
            </td>
            <td style="border: 1px solid black;">
                {{$ord->product->stock_status}}
            </td>
            <td style="border: 1px solid black;">
                {{$ord->product->featured}}
            </td>
            <td style="border: 1px solid black;">
                {{$ord->order_id}}
            </td>
            <td style="border: 1px solid black;">
                {{$ord->price}}
            </td>
            <td style="border: 1px solid black;">
                {{$ord->quantity}}
            </td>
            <td style="border: 1px solid black;">
                {{$ord->created_at}}
            </td>

        </tr>
        @endforeach
    </tbody>
    <tfoot>
    <tr>
            <th style="border: 1px solid black;">
                Id
            </th>
            <th style="border: 1px solid black;">
                Image
            </th>
            <th style="border: 1px solid black;">
                Product Name
            </th>
            <th style="border: 1px solid black;">
                Short Description
            </th>
            <th style="border: 1px solid black;">
                Description
            </th>
            <th style="border: 1px solid black;">
                Regular Price
            </th>
            <th style="border: 1px solid black;">
                Sale Price
            </th>
            <th style="border: 1px solid black;">
                Sku
            </th>
            <th style="border: 1px solid black;">
                Stock status
            </th>
            <th>
                featured
            </th>
            <th>
                quantity
            </th>
            <th style="border: 1px solid black;">
                Order Id
            </th>
            <th style="border: 1px solid black;">
                Price
            </th>
            <th style="border: 1px solid black;">
                Quantity
            </th>

            <th style="border: 1px solid black;">
                Created At
            </th>

        </tr>
    </tfoot>
</table>