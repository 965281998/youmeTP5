<?php
	namespace app\admin\controller;
	use think\Controller;
	class Article extends Base
	{
	    public function lst()
	    {
	    	$artres = \think\Db::name('article')->alias('a')->join('cate c','c.id = a.cateid','LEFT')->field('a.id,a.title,a.pic,a.click,a.time,c.catename')->paginate(3);
	    	$this->assign('artres',$artres);
	        return $this->fetch();
	    }
	    public function add()
	    {
	    	if(request()->isPost()){
	    		$data=[
	    			'title'=>input('title'),
	    			'keywords'=>input('keywords'),
	    			'desc'=>input('desc'),
	    			'cateid'=>input('cateid'),
	    			'content'=>input('content'),
	    			'time'=>time(),
	    		];
	    		if($_FILES['pic']['tmp_name']){
	    			$file=request()->file('pic');
	    			$info=$file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
	    			if($info){
	    				$data['pic']='/static/uploads/'.date('Ymd').'/'.$info->getFilename();
	    				// echo $info->getExtension();
	    				// echo $info->getFilename();die;
	    			}else{
	    				return $this->error($file->getError());
	    			}
	    		}
	    		$validate = \think\Loader::validate('Article');
	    		if($validate->check($data)){

	    		$db= \think\Db::name('article')->insert($data);
	    		
	    			if($db){
	    				return $this->success('添加文章成功！','lst');
	    			}else{
	    			return $this->error('添加文章失败！');
	    			}
	    		}else{
	    			return $this->error($validate->getError());
	    		}
	    		return;
	    	}
	    	$cateres = db('cate')->select();
	    	$this->assign('cateres',$cateres);
	        return $this->fetch();
	    }

		public function edit()
	    {
	    	if(request()->isPost()){
	    		$data=[
	    			'id'=>input('id'),
	    			'title'=>input('title'),
	    			'keywords'=>input('keywords'),
	    			'desc'=>input('desc'),
	    			'cateid'=>input('cateid'),
	    			'content'=>input('content'),
	    			'time'=>time(),
	    		];
	    		if($_FILES['pic']['tmp_name']){
	    			$file=request()->file('pic');
	    			$info=$file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
	    			if($info){
	    				$data['pic']='/static/uploads/'.date('Ymd').'/'.$info->getFilename();
	    				// echo $info->getExtension();
	    				// echo $info->getFilename();die;
	    			}else{
	    				return $this->error($file->getError());
	    			}
	    		}
	    		$validate = \think\Loader::validate('Article');
	    		if($validate->check($data)){

	    		$db= \think\Db::name('article')->update($data);
	    		
	    			if($db){
	    				return $this->success('修改文章成功！','lst');
	    			}else{
	    			return $this->error('修改文章失败！');
	    			}
	    		}else{
	    			return $this->error($validate->getError());
	    		}
	    		return;
	    	}
	    	$arts = \think\Db::name('article')->where('id',input('id'))->find();
	    	$this->assign('arts',$arts);
	    	$cateres = db('cate')->select();
	    	$this->assign('cateres',$cateres);
	    	
	        return $this->fetch();
	    }

	    public function del(){
	    	$id = input('id');
	    	if(db('article')->delete($id)){
	    		return $this->success('删除文章成功！','lst');
	    	}else{
	    		return $this->error('删除文章失败！');
	    	}
	    }	    
	}