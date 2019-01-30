@include('news.header')
        <div class="flex-center position-ref full-height content">
		<div class="container">
            <div class="col-md-12">
	<form  method="post" class="CategoryForm" id="CategoryForm" action="{{ URL::to('/submitcat')}}" enctype="multipart/form-data">
		
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<div class="col-md-9" id="AddCategory">
			<div class="panel panel-default">
				<div class="panel-heading panel-head">
					<h3 class="panel-title">Add Category Form</h3> 
				</div>
				<div class="panel-body">	
				<div class="form-group col-lg-12">
					<label>Category Name</label>
					<input type="text" id="category_title" name="category_title" value="" class="form-control" placeholder="" required>
				</div>
				<div class="clearfix"></div>
				
				<div class="form-group col-lg-12">
					<label>Category Display Name</label>
					<input type="text" id="display_title" name="display_title" value="" class="form-control" placeholder="" required>
				</div>
				<div class="clearfix"></div>
				
				<div class="form-group col-lg-12">
					<hr>
				</div>
				<div class="form-group col-lg-12">
					<a href="{{ URL::to('/listcategory')}}" class="btn btn-info"> Back </a>
					<button type="submit" name="send" class="btn btn-success addNewsbtn"> Submit </button>
				</div>
			</div>
			</div>
		</div>
	</form>
            </div>
	</div>
			
	
        </div>
		
@include('news.footer')
