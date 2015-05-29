@extends("main")

@section('title')
Admin Page - Bài đăng
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
                <th>Người đăng</th>
                <th>Trong quán</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Thời gian đăng</th>
                <th></th>
            </tr>
        	@for ($i=0; $i < count($baidang) ; $i++) 
        		<tr>
        			<td>{{$baidang[$i]['MA_BAI_DANG']}}</td>
				    <td>{{$baidang[$i]['MA_THANH_VIEN']}}</td>
				    <td>{{$baidang[$i]['MA_QUAN']}}</td>		
				    <td>{{$baidang[$i]['TIEU_DE']}}</td>
                    <td>{{$baidang[$i]['NOI_DUNG']}}</td>
				    <td>{{$baidang[$i]['created_at']}}</td>
				    <td> <a href="{{Asset('admin-delete-baidang')}}/{{$baidang[$i]['MA_BAI_DANG']}}" class = "btn btn-success" >Delete</a> <button class = "btn btn-success" >Edit</button> </td>    
		  		</tr>		
        	@endfor	    
		</table>
@endsection
