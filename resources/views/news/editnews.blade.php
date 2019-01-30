@include('news.header')
        <div class="flex-center position-ref full-height content">
		<div class="container">
            <div class="col-md-12">
			 
	<form  method="post" class="NewsForm" id="NewsForm" action="{{ url('/update') }}" enctype="multipart/form-data">
		
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<input type="hidden" name="id" value="{{ $news->id}}">
		<div class="col-md-9" id="AddPost">
		
			<div class="panel panel-default">
				<div class="panel-heading panel-head">
					<h3 class="panel-title">Edit news Form</h3> 
				</div>
				<div class="panel-body">
				
				<div class="form-group col-lg-12">
					<label>Title</label>
					<input type="text" id="news_title" name="news_title" class="form-control" value="{{ $news->title}}" required>
					
				</div>
				<div class="clearfix"></div>
				
				<div class="form-group col-lg-12">
					<label>Description</label>
					<div class="clearfix"></div>
					<textarea name="news_description" rows="5" cols="10" class="form-control" id="news_desc">{{ $news->content}}</textarea>
					<script>
                        CKEDITOR.replace('news_desc');
                    </script>
				</div>
				<div class="clearfix"></div>
				
				<div class="form-group col-lg-12">
					<label>News Highlights</label>
					<input type="text" id="highlights" name="highlights" value="{{ $news->highlights}}" class="form-control" placeholder="">
					
				</div>
				<div class="clearfix"></div>
				
				<div class="form-group col-lg-12">
					<label>Author</label>
					<input type="text" id="author" name="author" value="{{ $news->author}}" class="form-control" placeholder="">
					
				</div>
				<div class="clearfix"></div>
				
				<div class="form-group col-lg-12">
					<label>Publish Date</label>
					<input type="date" id='datetimepicker1' name="publish" value="{{ $news->publish_date}}" class="form-control" placeholder="">
					
				</div>
				<div class="clearfix"></div>
				
				<div class="form-group col-lg-12">
					<hr>
				</div>
				<div class="form-group col-lg-12">
					<a href="{{ URL::to('/listnews')}}" class="btn btn-info"> Back </a>
					<button type="submit" name="send" class="btn btn-success addNewsbtn"> Update </button>
				</div>
			</div>
			</div>
		</div>
		<div class="col-md-3" id="cat-list">
			<div class="panel panel-default">
				<div class="panel-heading panel-head">
					<h3 class="panel-title">Categories</h3> 
				</div>
				<div class="panel-body">
				@php
				$newscat = explode(",",$news->category_id);
				@endphp
				@foreach ($categories as $cat)
				@php
				$catid = $cat->id;
				@endphp
						<div class="form-group col-md-12">
							<input  name="category_id[]" @if(in_array($catid,$newscat)) checked @endif type="checkbox" value="{{ $cat->id }}"> {{ $cat->display_name }}	
						</div>
				@endforeach
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading panel-head">
					<h3 class="panel-title">Featured Image</h3> 
				</div>
				<div class="panel-body">
					@if(!empty($news->image_name))
					<div class="img-show">
					@php
					$imgpath = URL::asset('/uploads')."/".$news->image_name;
					@endphp
						<img src="{{ $imgpath}}">
						<button type="button" data-link="{{ url('/removeimage') }}" data-image-name="{{ $news->image_name}}" data-id="{{ $news->id}}" id="RemoveImage" class="btn btn-danger"> Remove Featured Image
					</div>
					<div class="img-div" style="display:none">
						<input type="file" accept="image/*" onchange="loadFile(event)" name="userimage">
						<img id="output"/>
					</div>
					@else
						<input type="file" accept="image/*" onchange="loadFile(event)" name="userimage">
						<img id="output"/>
					@endif
				</div>
			</div>
		</div>
	</form>
	
            </div>
	</div>
			
	
        </div>
		
@include('news.footer')
