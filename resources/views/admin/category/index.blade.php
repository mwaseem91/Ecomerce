@extends('admin.layout.layout')
@section('contant')

   <table class="table">
       <a href="" class="btn btn-danger" id="deleteSelected"> deletedSelected</a>
       <thead>
           <tr>
                <th><input type="checkbox" id="selectAll"></th>
               <th>S.No</th>
               <th>Category Name</th>
               <th>Parent Category Name</th>
               <th>Created Date</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($categories as $key=>$categories)
            <tr id="cid{{$categories->id}}">
                <td> <input type="checkbox" id="check" name="select_cat[]" cart-id="{{ $categories->id }}"></td>
                <td>{{ $key + 1 }}</td>
                <td>{{ $categories->name }}</td>
                <td>
                    @if($categories->category_id)
                    {{ $categories->Parent->name }}</td>
                    @else
                    No Parent Category
                </td>
                @endif
                <td>{{ $categories->created_at }}</td>
                <td> <a href="{{ route('category.edit',$categories->id) }}" style="font-size:17px; padding:5px;"><i class="fa fa-edit"></i></a>
                 <a href="{{ route('category.delete',$categories->id) }}" style="font-size:17px; padding:5px;"><i class="fa fa-trash"></i></a></td>
                 {{-- <button class="deleteRecord" data-id="{{  $categories->id }}" >Delete Record</button> --}}
            </tr>
        @endforeach
       </tbody>
   </table>  
@endsection


@push('footer-script')
    <script type="text/javascript">
       $(".deleteRecord").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
   alert('do you want to delete thi;')
    $.ajax(
    {
        url: "/category-delete/"+id,
        type: 'delete',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (){
            
            console.log("it Works");
        }
    });
   
    });
    </script>
    
@endpush 
@push('footer-script')
<script>
	$("#selectAll").click(function(){
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

});

  $('#deleteSelected').on('click',function(){
	  
    var cart_id = [];
	
    
    jQuery('input[name="select_cat[]"]:checkbox:checked').each(function(i){
        var id = $(this).attr('cart-id');
		cart_id.push(id);
    });
    if(cart_id.length == 0){
      alert('Please select atleast one product.');
    }else
	{
		
      $.ajax({
        url:"{{ route('deleteSelect') }}",
        type:'delete',
        data:{  
          ids:cart_id,
          _token:'{{csrf_token()}}'
        },
        Success:function(response){
            $.each(cart_id,function(key,value){
                $("#cid"+val).remove();
            });
        }
      });
    }
});

</script>
    
@endpush 