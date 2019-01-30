<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;
use DB;
use App\NewsModel as NewsModel;

class News extends Controller
{
    public function index(){
		//fetching news list and categories
		$data = new NewsModel();
		$category = $data->alldata('categories');
		$whereData = array(array('active','Y')); 
        $news = $data->paginate('news',$whereData,'id','desc',5);		
		
		return view('news.listnews', ['categories' => $category, 'news' => $news]);
	}
	
	public function news(){
		//fetching news list and categories
		$data = new NewsModel();
		$category = $data->alldata('categories');
		return view('news.news', ['categories' => $category]);
	}
	
	public function addnews(Request $request){
		//getting input data
    	$data['title'] = $request->input('news_title');
    	$data['content'] = $request->input('news_description');
    	$data['highlights'] = $request->input('highlights');
		$data['author'] = $request->input('author');
		$data['publish_date'] = $request->input('publish');
		
		if(empty($request->input('category_id'))){
			$data['category_id'] =   "";
		}else{
			$data['category_id'] =  implode(",", $request->input('category_id'));
		}
		
		$category = $request->input('category_id');
		
		$arr = array();
		$model = new NewsModel();
		foreach($category as $cat){
			//print_r($cat); 
			$where = array(array('id',$cat));
			$name = $model->getdata('categories',$where); //get selected category name
			//print_r($name);
			$arr[] = $name->display_name; //saving category name in array
			
		}
		$data['category_name'] = implode(",", $arr);
	
		
		$data['created_at'] = date("Y-m-d");
		
		$datetime = date("mdHi");
		
		//check if image is uploaded
		$file = $request->file('userimage');
		if(!empty($file)){
			$file = $request->file('userimage')->getClientOriginalName(); //get file name
			$filename = "news".$datetime; //change file name to make it unique
			$extension = pathinfo($file, PATHINFO_EXTENSION); //get file extension
			$image_name = $filename.".".$extension; //assign file name
			$path =  $request->file('userimage')->move(public_path().'/uploads', $image_name); //upload file to desired folder
			$data['image_name'] = $image_name;
		 }
		 
		$data['active']	= 'Y';
		//insert input data
    	DB::table('news')->insert($data);
		
		session()->flash('successmessage', 'News Added Successfully!'); //save message to display on success
		
		return redirect('listnews');
	}
	
   
   public function editnews($id){
	   $data = new NewsModel();
		$category = $data->alldata('categories');
		$whereData = array(array('id',$id)); 
        $news = $data->getdata('news',$whereData);	//get news data by id

		//print_r($news);
        return view('news.editnews', ['categories' => $category, 'news' => $news]);
	}
	
   public function deletenews($id){
	    $model = new NewsModel();
		echo "id is:".$id;
		$date = date("Y-m-d");
		$data = array('deleted_at' => $date, 'active' => 'N');
		$where = array(array('id',$id));
    	
		$run = $model->updatedata('news',$where,$data); //update news status
		
		session()->flash('successmessage', 'News Deleted Successfully!');
		 
		return redirect('listnews');
	}
	
	public function removeimage(){
		$image_name = $_POST['image_name'];
		$id = $_POST['id'];
		$data = array('image_name'=>"");
			$path = public_path('uploads/'. $image_name);
			if (file_exists($path)) {
				unlink($path); //remove image from folder
			}
		DB::table('news')->where('id', $id)->update($data);
	}
   
   public function updatenews(Request $request){
	   $id = $request->input('id');
    	$data['title'] = $request->input('news_title');
    	$data['content'] = $request->input('news_description');
    	$data['highlights'] = $request->input('highlights');
		$data['author'] = $request->input('author');
		$data['publish_date'] = $request->input('publish');
		
		if(empty($request->input('category_id'))){
			$data['category_id'] =   "";
		}else{
			$data['category_id'] =  implode(",", $request->input('category_id'));
		}
		
		$category = $request->input('category_id');
		
		$arr = array();
		$model = new NewsModel();
		foreach($category as $cat){
			//print_r($cat); 
			$where = array(array('id',$cat));
			$name = $model->getdata('categories',$where); //get selected category name
			//print_r($name);
			$arr[] = $name->display_name;
			
		}
		$data['category_name'] = implode(",", $arr);
	
		
		$date = date("Y-m-d");
		$data['updated_at'] = $date;
		$datetime = date("mdHi");
		$file = $request->file('userimage');
		if(!empty($file)){
			$file = $request->file('userimage')->getClientOriginalName();
			$filename = "news".$datetime;
			$extension = pathinfo($file, PATHINFO_EXTENSION);
			$data['image_name'] = $filename.".".$extension;
			$image_name = $filename.".".$extension;
			$path =  $request->file('userimage')->move(public_path().'/uploads', $image_name);
		 } 
		/* $data = array(
			'title' => $title,
			'content' => $content,
			'highlights' => $highlights,
			'author' => $author,
			'publish_date' => $publish_date,
			'category_id' => $category_id,
			'category_name' => $category_name,
			'updated_at' => $date,
			'image_name' => $image_name
			); 
		print_r($data); */
    	DB::table('news')->where('id', $id)->update($data);
		
		session()->flash('successmessage', 'News Updated Successfully!');
		
		return redirect('listnews');
	}
	
	public function listcategory(){
		//fetching news list and categories
		$data = new NewsModel();
		$category = $data->alldata('categories');		
		
		return view('news.listcategory', ['categories' => $category]);
	}
	
	public function category(){
		return view('news.category');
	}
	
	public function addcategory(Request $request){
		$data['name'] = $request->input('category_title');
		$data['display_name'] = $request->input('display_title');
		$data['created_at'] = date("Y-m-d");
		
		DB::table('categories')->insert($data);
		
		session()->flash('successmessage', 'Category Added Successfully!'); //save message to display on success
		
		return redirect('listcategory');
	}
}
