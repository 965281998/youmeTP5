<?php
	namespace app\admin\controller;
	use think\Controller;
	use app\admin\model\Login as Log;
	class Base extends Controller
	{
	    public function _initialize()
	    {
	    	if(!session('id')){
	    		$this->error('请先登录系统！',url('Login/index'));
	    	}else{
	    		
	    	}
	    }

	    
	}
	    