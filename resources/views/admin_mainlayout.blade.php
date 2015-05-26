@extends("main")

@section('title')
Admin Page
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
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Date/Time Added</th>
                <th></th>
            </tr>
        	@for ($i=0; $i < count($user) ; $i++) 
        		<tr>
        			<td>{{$user[$i]['MA_THANH_VIEN']}}</td>
				    <td>{{$user[$i]['TEN_THANH_VIEN']}}</td>
				    <td>{{$user[$i]['USER']}}</td>		
				    <td>{{$user[$i]['EMAIL']}}</td>
				    <td>{{$user[$i]['created_at']}}</td>
				    <td> <a href="{{Asset('admin-delete')}}/{{$user[$i]['MA_THANH_VIEN']}}" class = "btn btn-success" >Delete</a> <button class = "btn btn-success" >Edit</button> </td>    
		  		</tr>		
        	@endfor	    
		</table>
@endsection
