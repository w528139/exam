<?php

namespace App\Http\Controllers;

use App\Http\Models\NewsModel;
use Illuminate\Http\Request;
use Validator;

class NewsController extends Controller
{
	/*
	添加新闻接口
	 */
    public function newsAdd(Request $request)
    {
    	//验证必填项
    	$data = $request->only(['title','content','author']);
    	$validator = Validator::make($data, [
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return [
            	'code' => 1,
            	'msg'  => $errors,
            	'data' => '',
            ];
        }

        $NewsModel = new NewsModel;
        $res = $NewsModel->newsAdd($data);
        if ($res) {
        	$arr = [
        		'code' => 0,
            	'msg'  => '添加成功',
            	'data' => '',
        	];
        }else{
        	$arr = [
        		'code' => 1,
            	'msg'  => '添加失败',
            	'data' => '',
        	];
        }
        return $arr;
    }
    public function newsDel(Request $request)
    {
    	//验证Id必填
    	$data = $request->only('id');
    	$validator = Validator::make($data, [
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return [
            	'code' => 1,
            	'msg'  => $errors,
            	'data' => '',
            ];
        }

        $NewsModel = new NewsModel;
        $res = $NewsModel->newsDel($data['id']);

        if ($res) {
        	$arr = [
        		'code' => 0,
            	'msg'  => '删除成功',
            	'data' => '',
        	];
        }else{
        	$arr = [
        		'code' => 1,
            	'msg'  => '删除失败',
            	'data' => '',
        	];
        }
        return $arr;
    }
    public function newsGet(Request $request)
    {
    	$data = $request->only('title');
    	$validator = Validator::make($data, [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return [
            	'code' => 1,
            	'msg'  => $errors,
            	'data' => '',
            ];
        }

        $NewsModel = new NewsModel;
        $res = $NewsModel->newsGet($data['title']);

        if ($res) {
        	$arr = [
        		'code' => 0,
            	'msg'  => '查询成功',
            	'data' => $res,
        	];
        }else{
        	$arr = [
        		'code' => 1,
            	'msg'  => '查询失败',
            	'data' => '',
        	];
        }
        return $arr;
    }
    public function newsUpdate(Request $request)
    {
    	//验证必填项
    	$data = $request->only(['id','title','content','author']);
    	$validator = Validator::make($data, [
    		'id'    => 'required',
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return [
            	'code' => 1,
            	'msg'  => $errors,
            	'data' => '',
            ];
        }

        $NewsModel = new NewsModel;
        $res = $NewsModel->newsUpdate($data);
        if ($res) {
        	$arr = [
        		'code' => 0,
            	'msg'  => '修改成功',
            	'data' => '',
        	];
        }else{
        	$arr = [
        		'code' => 1,
            	'msg'  => '修改失败',
            	'data' => '',
        	];
        }
        return $arr;
    }
}
