<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Vip as VipLv;
use Illuminate\Support\Facades\Redis;

class Vip extends Controller
{
	protected $vip = null;
	public function __construct(VipLv $vip)
	{
		$this->vip = $vip;
	}
    public function add(Request $request)
    {
    	if($request->isMethod('get')){
    		return view('VipLv.add');
    	}
    	$this->validate($request,[
    		'name'  => 'required|unique:vip_lv',
    	]);
    	$add = $this->vip->add($request['name']);
    	if ($add) {
    		echo 'ok';
    	}
    }
    public function show()
    {
    	$data = $this->vip->show();

    	return view('VipLv.show',[
    		'data' => $data,
    	]);


    }
    public function edit(Request $request)
    {
    	if($request->isMethod('get')){
    		$id = $request->only('id');
    		return view('VipLv.edit',[
    			'id' => $id['id']
    		]);
    	}
    	$this->validate($request,[
    		'name'  => 'required|unique:vip_lv',
    	]);
    	$edit = $this->vip->edit($request->only('name','id'));
    	if ($edit) {
    		return redirect('vip/lv/show');
    	}
    }
   	public function del(Request $request)
   	{
   		$id = $request->only('id');
   		$del = $this->vip->del($id);
   		if ($del) {
    		return redirect('vip/lv/show');
    	}
   	}
}
