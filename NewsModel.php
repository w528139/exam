<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    public function newsAdd($data)
    {
    	$this->title = $data['title'];
    	$this->content = $data['content'];
    	$this->author = $data['author'];
    	$res = $this->save();
    	return $res;
    }
    public function newsDel($id)
    {
    	$res = $this->where('id',$id)->delete();
    	return $res;
    }
    public function newsGet($title)
    {
    	$res = $this->where('title','like',"%{$title}%")->get();
    	return $res;
    }
    public function newsUpdate($data)
    {
    	$res = $this->where('id',$data['id'])->update($data);
    	return $res;
    }
}
