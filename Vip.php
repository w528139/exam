<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Vip extends Model
{
    protected $table = 'vip';
    /*
    注册
     */
    public function register($data)
    {
    	$this->username = $data['username'];
    	//md5加密密码
    	$this->password = md5(md5($data['password']));
    	$this->tel      = $data['tel'];
    	$this->name     = $data['name'];
    	$this->email    = $data['email'];
    	$this->reg_time = time();
    	//注册
    	$res = $this->save();
    	if ($res) {
    		return 0;
    	}else{
    		return 1;
    	}
    }
    /*
    是否存在
     */
    public function isExist($field)
    {
    	//判断是否存在
    	$data = $this->where([
    		'username' => $field, 
    	])->first();

    	if ($data) {
    		return 0;
    	}else{
    		return 1;
    	}
    }
    public function login($data)
    {
    	//判断用户名密码是否正确
    	$data = $this->where([
    		'username' => $data['username'],
    		'password' => md5(md5($data['password'])),
    	])->first();
    	if ($data) {
    		return $data;
    	}else{
    		return 1;
    	}
    }
    public function getUserInfo($field)
    {
    	$data = $this->where([
    		'id' => $field[0],
    	])->first();
    	if ($data) {
    		$data['reg_time'] = date('Y-m-d : H:i:s',$data['reg_time']);
    		return $data;
    	}else{
    		return 1;
    	}
    }
    public function userInfoChange($data)
    {
    	$res = $this->where([
    		'id' => $data['id']
    	])->update($data);
    	if ($res) {
    		return 0;
    	}else{
    		return 1;
    	}
    }
    public function updatePass($data)
    {
    	$res = $this->where([
    		'id' => $data['id'],
    		//重置密码须验证当前密码是否正确
    		'password' => md5(md5($data['password']))
    	])->update(['password' => md5(md5($data['new_password'])) ]);
    	if ($res) {
    		return 0;
    	}else{
    		return 1;
    	}
    }
}
