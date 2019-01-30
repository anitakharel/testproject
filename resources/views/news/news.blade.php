@include('news.header')
        <div class="flex-center position-ref full-height content">
		<div class="container">
            <div class="col-md-12">
	<form  method="post" class="NewsForm" id="NewsForm" action="{{ URL::to('/submit')}}" enctype="multipart/form-data">
		
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<div class="col-md-9" id="AddPost">
			<div class="panel panel-default">
				<div class="panel-heading panel-head">
					<h3 class="panel-title">Add news Form</h3> 
				</div>
				<div class="panel-body">	
				<div class="form-group col-lg-12">
					<label>Title</label>
					<input type="text" id="news_title" name="news_title" value="" class="form-control" placeholder="" required>
					
				</div>
				<div class="clearfix"></div>
				
				<div class="form-group col-lg-12">
					<label>Description</label>
					<div class="clearfix"></div>
					<textarea name="news_description" rows="5" cols="10" class="form-control" id="news_desc"></textarea>
					<script>
                        CKEDITOR.replace('news_desc');
                    </script>
				</div>
				<div class="clearfix"></div>
				
				<div class="form-group col-lg-12">
					<label>News Highlights</label>
					<input type="text" id="highlights" name="highlights" value="" class="form-control" placeholder="">
					
				</div>
				<div class="clearfix"></div>
				
				<div class="form-group col-lg-12">
					<label>Author</label>
					<input type="text" id="author" name="author" value="" class="form-control" placeholder="">
					
				</div>
				<div class="clearfix"></div>
				
				<div class="form-group col-lg-12">
					<label>Publish Date</label>
					<input type="date" id='datetimepicker1' name="publish" value="" class="form-control" placeholder="">
					
				</div>
				<div class="clearfix"></div>
				
				<div class="form-group col-lg-12">
					<hr>
				</div>
				<div class="form-group col-lg-12">
					<a href="{{ URL::to('/listnews')}}" class="btn btn-info"> Back </a>
					<button type="submit" name="send" class="btn btn-success addNewsbtn"> Submit </button>
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
				@foreach ($categories as $cat)
						<div class="form-group col-md-12">
							<input  name="category_id[]" type="checkbox" value="{{ $cat->id }}"> {{ $cat->display_name }}	
						</div>
				@endforeach
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading panel-head">
					<h3 class="panel-title">Featured Image</h3> 
				</div>
				<div class="panel-body">
					<input type="file" accept="image/*" onchange="loadFile(event)" name="userimage">
					<img id="output"/>
				</div>
			</div>
		</div>
	</form>
            </div>
	</div>
			
	
        </div>
		
@include('news.footer')
