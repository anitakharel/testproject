@include('news.header')
        <div class="flex-center position-ref full-height content">
			<div class="container">
			
				<div class="row">
					<div class="col-md-6">
						<div class="AlertMessage">
							@if (Session::has('successmessage'))
							<div class="alert alert-success">{{ Session::get('successmessage') }}</div>
							@elseif (Session::has('errormessage'))
							<div class="alert alert-danger">{{ Session::get('errormessage') }}</div>
							@endif
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-12">
		<div class="btn-group btnaddnew">
			<a href="{{ URL::to('/addnews')}}" class="btn btn-success btn-md btn-circle legitRipple">
				Add News
			</a>
			<a href="{{ URL::to('/addcategory')}}" class="btn btn-success btn-md btn-circle legitRipple">
				Add Category
			</a>
		</div>
		<div class="panel panel-default">
		<div class="panel-heading panel-head">
			<h3 class="panel-title">All Posts</h3> 
		</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Categories</th>
						<th align="center">Author</th>
						<th align="center">Created Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@if(!empty($news))
						@php
						$sn = 1;
						@endphp
						@foreach($news as $post)
					<tr>
						<th scope="row">{{ $sn++ }}</th>
						<td>{{ $post->title }}</td>
						<td>{{ $post->category_name }}</td>
						<td align="center">{{ $post->author }}</td>
						<td align="center">{{ $post->created_at }}</td>
						<td>
							 
							<a href="{{ url('/editnews', $post->id) }}" class="btn bt-md btn-success">Edit</a>
							<a href="{{ url('/deletenews', $post->id) }}" class="btn btn-md btn-danger">Delete</a>
							
						</td>
					</tr>
					@endforeach
					@endif
				</tbody>
			</table>
			{{ $news->links() }}
		</div>
		</div>
					
		</div>
			</div>
        </div>
		
@include('news.footer')
