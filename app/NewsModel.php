<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class NewsModel extends Model
{
   public function alldata($table){
   		$category = DB::table($table)->get();
   		return $category;
   }
   
   public function getdata($table,$where){
   		$category = DB::table($table)->where($where)->first();
   		return $category;
   }
   
    public function paginate($table,$where,$orderby,$order,$perpage){
		$data = DB::table($table)->where($where)->orderBy($orderby, $order)->simplePaginate($perpage); 
   		return $data;
   }
   
    public function updatedata($table,$where,$data){
   		$data = DB::table($table)->where($where)->update($data);
   		return $data;
   }
}
