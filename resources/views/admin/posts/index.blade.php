@extends('admin.index')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Posts
      </h1>

      <ol class="breadcrumb">
        <li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<a href="{{url('admin/post/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> New Post</a>
        @include('flash::message')
    	<div class="table-responsive">
    		<table class="table table-borderd table-striped table-hover">
    			<thead>
    				<tr>
        				<th>#</th>
        				<th>Title</th>
                        <th>Content</th>
                        <th>Category</th>
                        <th>Add By</th>
                        <th>Image</th>
                        <th>Created At</th>
        				<th>Edit</th>
        				<th>Delete</th>
    				</tr>
    			</thead>
    			<tbody>
    				@forelse($records as $record)

    					<tr>
        				<td>{{$loop->iteration}}</td>
        				<td>{{$record->title}}</td>
                        <td>{{$record->content}}</td>
                        <td>{{optional($record->category)->name}}</td>
                    
                        <td>{{optional($record->user)->name}}</td>
                        <td>
                            
                            <img style="height: 150px;" class="img-responsive" 
                            src="{{asset($record->image)}}">
                           
                        </td>
                        <td>{{$record->created_at}}</td>
        				<td>
                            <a href="{{url(route('post.edit', $record->id))}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>            
                        </td>
        				<td>
                            {!!Form::open([ 'route'=>['post.destroy', $record->id]            ,'method'=>'delete'] )!!}
                            <div class="form-group">
                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i></button>
                            </div>
                            {!!Form::close()!!}                
                        </td>
    					</tr>
    				@empty
    				<tr>
    					<td colspan="4">
    						<div class="alert alert-danger">no data</div>

    					</td>
    				</tr>
					@endforelse
    					
    			</tbody>
    			
    		</table>
    	</div>
        	     

    </section>
    <!-- /.content -->
  </div>

@endsection