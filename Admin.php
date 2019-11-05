<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator; 
use App\Http\Models\Vip;


class Admin extends Controller
{
	protected $vip;
	public function __construct(Vip $vip)
	{
		$this->vip = $vip;
	}
	/*
	渲染登录页面
	 */
    public function register()
    {
    	return view('Admin.register');
    }
    /*
    执行注册
     */
    public function registerDo(Request $request)
    {
    	//获取所需字段
    	$data = $request->only('username','password','tel','email','name');
    	
    	//验证字段
    	$validator = Validator::make($data, [
        	'username' => 'between:6,20|unique:vip',
        	'password' => 'between:6,20',
        	'email'    => 'email',
        	'name'     => 'required',
        	'tel'      => ["regex:/^1[35789]\d{9}$/",'unique:vip'],
        	
        ]);
        if ($validator->fails()) {
        	//验证字段不通过
            return redirect('register');
        }
        //注册
        $res = $this->vip->register($data);
        if ($res) {
        	//注册失败
        	return redirect('register');
        }else{
        	//注册成功,去登录
        	return redirect('login');
        }
    }
    /*
    登录
     */
    public function login()
    {
    	return view('Admin.login');
    }
    /*
    执行登录
     */
    public function loginDo(Request $request)
    {
    	//获取所需字段
    	$data = $request->only('username','password');

    	//验证字段
    	$validator = Validator::make($data, [
        	'username' => 'between:6,20',
        	'password' => 'between:6,20',
        ]);
        if ($validator->fails()) {
        	//验证字段不通过
            return redirect('login');
        }

        //判断用户名是否存在
        $isExist = $this->vip->isExist($data['username']);

        if ($isExist) {
        	//不存在返回
        	return redirect('login');
        }else{
        	//存在进行登录
        	$res = $this->vip->login($data);
        	if ($res === 1) {
        		//登录失败
        		return redirect('login');
        	}else{
        		//登录成功
        		$request->session()->push('id', $res->id);
        		return redirect('userinfo');
        	}
        }
    }
    public function userInfo(Request $request)
    {
    	//获取用户信息
    	$value = $request->session()->get('id');
    	$info = $this->vip->getUserInfo($value);
    	return view('Admin/user_info',[
    		'info' => $info
    	]);
    }
    public function userInfoChange(Request $request)
    {
    	//获取所需字段
    	$data = $request->only('username','tel','email','name','id');

    	//验证字段
    	$validator = Validator::make($data, [
        	'username' => 'between:6,20',
        	'email'    => 'email',
        	'name'     => 'required',
        	'tel'      => ["regex:/^1[35789]\d{9}$/"],
        ]);
        if ($validator->fails()) {
        	//验证字段不通过
            return redirect('userinfo');
        }
        //修改
        $res = $this->vip->userInfoChange($data);
        return redirect('userinfo');
    }
    public function repass(Request $request)
    {
    	$id = $request->only('id');
    	return view('Admin.repass',[
    		'id' => $id['id'],
    	]);
    }
    public function repassDo(Request $request)
    {
    	//获取所需字段
    	$data = $request->only('id','password','new_password','re_password');
    	//验证字段
    	$validator = Validator::make($data, [
        	'id' => 'required',
        	'password' => 'between:6,20',
        	'new_password' => 'between:6,20',
        	're_password' => 'same:new_password',
        ]);
        if ($validator->fails()) {
        	//验证字段不通过
            return redirect('userinfo');
        }

        //修改密码
        $res = $this->vip->updatePass($data);
        return $res;
    }
}
