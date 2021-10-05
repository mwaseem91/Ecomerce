@extends('admin.layout.layout')
@section('contant')

   <table class="table">
       <thead>
           <tr>
               <th>S.No</th>
               <th>Product Name</th>
               <th>Category Name</th>
               <th>Price</th>
               <th>Image</th>
               <th>Extra Detail</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($products as $key=>$product)
            <tr>
                <td>{{ $key + 1 }}</td>
                
                <td>{{ $product->name }}</td>
                <td>@if($product->category_id)
                    {{$product->catagory->name}} 
                   
                    @endif
                    
                </td>
                <td>{{ $product->price }} </td>
                <td><img style="height:60px; width:80px;" src="{{ asset('upload/'.$product->image) }}"> </td>
                <td><button><a href="{{ route('ProductDetail.extraDetail',$product->id) }}">Add</a></button></td>
                
                <td> <a href="{{ route('products.edit',$product->id) }}" style="font-size:17px; padding:5px;"><i class="fa fa-edit"></i></a>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    @csrf
                    @method('DELETE') 
                 <button type="submit"><i class="fa fa-trash"></i></button></td>
                </form>
            </tr>
        @endforeach
       </tbody>
   </table>  
@endsection

{{-- @push('footer-script')
    <script>
        $('.category_delete').on('click',function(){
            if(confirm('you are delete this category.'))
            {
                var id =$(this).data('id');
                $.ajax({
                    url:"{{ route('category.destroy') }}",
                    method: "POST",
                    data:{
                        _token:'{{ csrf_token() }}'
                        'id': id;
                    },
                    Success:function(data){
                        location.reload()
                    }

                })
            }
        });
    </script>
    
@endpush --}}