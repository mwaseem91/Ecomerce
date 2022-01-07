@extends('front.layout.layout')
@section('contant')
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
    </ul>
	<h3>  SHOPPING CART [ <small>3 Item(s) </small>]<a href="products.html" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>	
	<hr class="soft"/>
	
	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Name</th>
                  <th>Quantity/Update</th>
				  <th><input type="checkbox" id="selectAll">Select All</th>
				  <th>Price</th>
				</tr>
              </thead>
              <tbody>
				  @php $sum = 0; @endphp
				  @foreach ( $carts as  $cart )  
				  @php $sum = $sum + $cart->product->price;  @endphp
                <tr>
                  <td> <img width="60" src="{{ asset('upload/'. $cart->product->image) }}" alt=""/></td>
                  <td>{{ $cart->product->name }}</td>
				  <td>
						<div class="input-append">
							<input class="span1" value="{{ $cart->qnty }}" style="max-width: 37px;" placeholder="1" id="appendedInputButtons" size="16" type="number">
							<button class="btn" type="button"><i class="icon-minus"></i></button>
							<button class="btn" type="button"><i class="icon-plus"></i></button>
							<button class="btn btn-danger" type="button"><a  href="{{ route('cart.destroy',$cart->id) }}"> <i class="icon-remove icon-white"></i> </a></button>			
						</div>
				  </td>

				  <td>
					  <input type="checkbox" id="check" name="select_product[]" cart-id="{{$cart->id}}"></td>
				  </td>
				  <td>${{ $cart->product->price }}</td>
                  
                </tr> 
				@endforeach

				
                <tr>
                  <td colspan="4" style="text-align:right">Total Price:	</td>
                  <td> ${{ $sum }}</td>
                </tr>
				 
				 <tr>
                  <td colspan="3" style="text-align:right"></td>
				  <td >pay with jazzcash <input type="checkbox" name="eway" style="margin-left: 12"></td>
				  <td class="label label-important buy_product" style="display:block;cursor:pointer;"> <strong>Buy</strong></td>
                </tr>
				</tbody>
            </table>
		
				
	<a href="products.html" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<a href="login.html" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>
	
</div>
@endsection
@push('footer-script')
<script>
	$("#selectAll").click(function(){
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

});

  $('.buy_product').on('click',function(){
	  
    var cart_id = [];
	
    
    jQuery('input[name="select_product[]"]:checkbox:checked').each(function(i){
        var id = $(this).attr('cart-id');
		cart_id.push(id);
    });
    if(cart_id.length == 0){
      alert('Please select atleast one product.');
    }else
	{
		
      $.ajax({
        url:'{{route("product.booking")}}',
        type:'post',
        data:{  
          ids:cart_id,
          _token:'{{csrf_token()}}'
        },
        success: function(data)
		{
			console.log(data);
			location.reload();
        }
      });
    }
  });
</script>
@endpush

{{-- @push('footer-script')
<script>
	$(document).ready(function(){
	$('.buy_product').on('click',function()
	{	
		
		var cart_id = [];
		$('input[name="select_product[]"]:checkbox:checked').each(function(i){
			cart_id[i] = $(this).attr('cart-id');
		});
		console.log(input)
		if(cart_id.length == 0)
		{
			alert('plese select atleast one product.');
		}
		else
		{
			$.ajax({
				url: "{{ route('product.booking') }}"
				type: "post";
				data:
				{
					cart_id = cart_id,
					_token = '{{ csrf_token() }}'
				},
				success: function(data)
				{

					location.reload();
				}
			});
		}
	});
});
</script>
@endpush --}}