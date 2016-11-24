<?php
namespace app\index\controller;
use think\Cookie;
class Index extends Home{
	public function __construct(){
		parent::__construct();
	}
    public function index()
    {
		var_dump($this->person);
		//$this->assign('spname',$this->person['spname']);        
		$this->assign('spname',"test");        
        // 模板输出
        return $this->fetch('index');
    }
	
	public function welcome()
	{
		$this->assign('vo',$this->person);
		$this->assign('tips',htmlspecialchars(Cookie::get('changePassword')));
		//获取近12次汇缴流水
		$person_detail=array();					
		$detailM=db('qfund_persondetail');
		$person_detail = $detailM->where("spcode='$this->spcode' and cllx='正常汇缴'")->limit(12)->order('hjny desc')->select();	
		foreach ($person_detail as $v){
			$month[]=$v['hjny'];
			$ye[]=$v['ye'];
			$sr[]=$v['sr'];
		}		
		$monthStr=implode(',',array_reverse($month));
		$yeStr=implode(',',array_reverse($ye));
		$srStr=implode(',',array_reverse($sr));
		$this->assign([
            'monthStr' => $monthStr,
            'srStr' => $srStr,
			'yeStr' => $yeStr
        ]);
		
		return $this->fetch('welcome');		
	}
}
