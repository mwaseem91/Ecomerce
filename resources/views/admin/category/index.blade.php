@extends('admin.layout.layout')
@section('contant')

   <table class="table">
       <thead>
           <tr>
               <th>S.No</th>
               <th>Category Name</th>
               <th>Parent Category Name</th>
               <th>Created Date</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($categories as $key=>$categories)
            <tr>
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