<?php
namespace app\index\controller;
use think\Session;
use think\Cookie;
class Login extends \think\Controller {
	private $status_arr=array();
	public function __construct(){
		parent::__construct();
	}
	public function index(){
 		return $this->fetch('index');
	}
	private function copyLogon($person)	
	{
		$data['spcode']=$person['spcode'];
		$data['sppwd']=$person['sppassword'];
		$data['spidno']=GetIdCard($person['spidno']);
		$data['spname']=$person['spname'];
		$data['sncode']=$person['sncode'];
		$data['cardno']=$person['cardno'];		
		$data['canprint']=0;
		$m=db('qfund_logon');
		$result=$m->insert($data);		
	}
	
	public function do_login(){
		//dump($_POST);
		//检验验证码
		if(!APP_DEBUG)
		{
			$verify = new \Think\Verify();
			$ok= $verify->check($_POST['code'],'');
			if(!$ok){
				$this->error('验证码错误');
				exit;
			}
		}		
		$spidno=$data['spidno']=input('post.spidno','','htmlspecialchars');		
		if(strlen($spidno)!=18){
			$this->error('您的身份证号码不是18位，请到公积金管理中心确认身份证号码正确后，再使用本系统，谢谢合作！');
			exit;
		}
		
		$cardno = input('post.spcardno','','htmlspecialchars');
		$data['sppwd']=input('post.sppassword','','htmlspecialchars');	
		
		$m=db('qfund_logon');
		$person=$m->where($data)->find();		
		if($person)
			if(substr($person['cardno'],-6)===$cardno ){		
				$person_sid=MD5($person['spidno'].$person['cardno']);
				Session::set('person_sid',$person_sid);//把sid存进Session::set
				Session::set('spName',$person['spname']);
				Session::set('spCode',$person['spcode']);
				if($person['sppwd']=='888888'){
					Cookie::set('changePassword','您的密码为初始密码，建议自行修改');
				}
				else{
					Cookie::set('changePassword',null);
				}
				
				$this->success('欢迎你'.$person['spname'],url('Index/index'),10);
			}else{
				$this->error('登陆失败！');
				exit;
			}
		else{
			$m2 = db('sspersons');			
			$person2=$m2->where("spidno='$spidno'")->find();
			if($person2 && substr($person2['cardno'],-6)===$cardno && $person2['sppassword']===$data['sppwd']) {	
				$this->copyLogon($person2);
				$person_sid=MD5($person2['spidno'].$person2['cardno']);
				Session::set('person_sid',$person_sid);//把sid存进Session::set
				Session::set('spName',$person2['spname']);
				Session::set('spCode',$person2['spcode']);
				if($person2['sppassword']=='888888'){
					Cookie::set('changePassword','您的密码为初始密码，建议自行修改');
				}
				else{
					Cookie::set('changePassword',null);
				}
				$this->success('欢迎你'.$person2['spname'],url('Index/index'),10);
			}
			elseif($person2 && substr($person2['cardno'],-6)===$cardno && strlen($person2['sppassword'])<1)
			{
				$person2['sppassword']='888888';
				$this->copyLogon($person2);
				$person_sid=MD5($person2['spidno'].$person2['cardno']);
				Session::set('person_sid',$person_sid);//把sid存进Session::set
				Session::set('spName',$person2['spname']);
				Session::set('spCode',$person2['spcode']);
				Cookie::set('changePassword','您的密码为初始密码，建议自行修改');
				$this->success('欢迎您'.$person2['spname'].'，您的密码初始化为888888。',url('Index/index'),10);
			}
			else{				
				$this->error('登陆失败！');
				exit;
			}
		}
	}

  public function logout(){
		Session::set(null);//退出删除Session::set		
		$this->success('退出成功',U('Login/index'),1);
	}
}

