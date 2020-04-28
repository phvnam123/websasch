<h2>HI {{$name}} </h2>
<p>Đơn hàng: {{$order->id}}</p>
<p>Ngày đặt: {{$order->created_at}}</p>
<p>
	<strong> Total: number_format({{$cart->total_amount}}) VND </strong>
</p>
<p>
	<strong> Chi tiết đơn hàng</strong>
</p>
<table border="1" cellpadding="5" cellspacing="0" width="500">
	<thead>
		<tr>
			<th>STT</th>
			<th>Name</th>
			<th>Quantity</th>
			<th>Price</th>
		</tr>
	</thead>
	<tbody>
		@foreach($cart->items as $k=>$item)
		<tr>
			<td>{{$k+1}}</td>
			<td>{{$item['name']}}</td>
			<td>{{$item['quantity']}}</td>
			<td>{{$item['price']}}</td>
		</tr>
		@endforeach
	</tbody>
</table>