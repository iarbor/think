<?php
namespace app\index\controller;
use think\Session;
class Home extends \think\Controller {
	protected $spcode='';	
	protected $queryDate='';
	protected $spidno='';
	protected $person=array();
	public function __construct(){
		parent::__construct();
		if(Session::has('spCode')){		
			$this->spcode=Session::get('spCode');
			$m=db('qfund_personinfo');
			$person=$m->where("spcode='$this->spcode'")->find();			
			if($person){
				$this->person=$person;
				//获取单位名称
				//$sncode = $this->person_arr['sncode'];		
				//$list = M('ssunitinfo')->where("sncode='$sncode'")->select();
				//$this->person['snname']=$list[0]['snname'];
				
				//转换为比例
				//$sum = $this->person_arr[0]['spsingl']+$this->person_arr[0]['spjcbl'];
				//$this->person_arr[0]['spsingl']=($this->person_arr[0]['spsingl']/$sum*100).'%';
				//$this->person_arr[0]['spjcbl'] = ($this->person_arr[0]['spjcbl']/$sum*100).'%';				
				$this->spName=$this->person['spname'];	
				$this->spidno=$this->person['spidno'];	
				if(MD5($person['spidno'].$person['cardno'])!= htmlspecialchars(Session::get('person_sid')))
				//if(false)
				{
					$this->redirect('Login/index');
					exit();
				}					
			}
			else{	
				
			}
		}
		else{
				$this->redirect('Login/index');
				exit();
		}
	}
	
	/* 空操作，用于输出404页面 */
	public function _empty(){
		$this->redirect('Index/index');
	}


    protected function _initialize(){
        /* 读取站点配置 */
        
    }

	/* 用户登录检测 */
	protected function login(){
		/* 用户登录检测 */
		is_login() || $this->error('您还没有登录，请先登录！', U('User/login'));
	}
	
	
	
	
}
