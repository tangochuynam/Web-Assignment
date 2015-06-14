@extends("main")

@section('title')
Admin Page - Quán cafe
@endsection

@section('content')
    	<style>
		table, th, td {
		    border: 1px solid black;
		    border-collapse: collapse;
		}
		</style>
        <table style="width:100%">
        	<tr>
        		<th>ID</th>
                <th>Tên quán</th>
                <th>Địa chỉ</th>
                <th></th>
            </tr>
        	@for ($i=0; $i < count($quan) ; $i++) 
        		<tr>
        			<td>{{$quan[$i]['MA_QUAN']}}</td>
				    <td>{{$quan[$i]['TEN_QUAN']}}</td>
				    <td>{{$quan[$i]['DIA_CHI']}}</td>		
				    <td> @if ($quan[$i]['XAC_NHAN_CUA_ADMIN'] == 0)
                        <a href="{{Asset('admin-delete-quancafe')}}/{{$quan[$i]['MA_QUAN']}}" class = "btn btn-success" >Delete</a> <a href="{{Asset('admin-edit-quancafe')}}/{{$quan[$i]['MA_QUAN']}}" class = "btn btn-success" >Edit</a> <a href="{{Asset('admin-check-quancafe')}}/{{$quan[$i]['MA_QUAN']}}" class = "btn btn-success" >Check</a>
                        @else 
                        <a href="{{Asset('admin-delete-quancafe')}}/{{$quan[$i]['MA_QUAN']}}" class = "btn btn-success" >Delete</a> <a href="{{Asset('admin-edit-quancafe')}}/{{$quan[$i]['MA_QUAN']}}" class = "btn btn-success" >Edit</a>                        
                        @endif
                    </td>    
		  		</tr>		
        	@endfor	    
		</table>
        <a href="{{Asset('admin-add-quancafe')}}" class = "btn btn-success" >Add</a>
@endsection
