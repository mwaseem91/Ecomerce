@extends('admin.layout.layout')
@section('contant')

   <table class="table">
       <thead>
           <tr>
               <th>S.No</th>
               <th>Name</th>
               <th>Email</th>
               <th>Created Date</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody> 
           @foreach ($user as $key=>$user)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td> <a href="javascript::void(0)" style="font-size:17px; padding:5px;"
                    data-id={{ $user->id }} class="delete"><li class="fa fa-trash"></li></a>
                </td>
                {{-- {{ route('admin.user.delete',$user->id) }} --}}
            </tr>
        @endforeach
       </tbody>
   </table>  
@endsection

@push('footer-script')
    <script>
        $('.delete').on('click',function(){
            if(confirm('you are delete this category.'))
            {
                var id =$(this).data('id');
                $.ajax({
                    url:"{{ route('admin.user.delete') }}",
                    method: "DELETE",
                    data:{
                        "_token":'{{ csrf_token() }}',
                        'id': id,
                    },
                    Success:function(data){
                        location.reload();
                    }

                });
            }
        });
    </script>
    
@endpush