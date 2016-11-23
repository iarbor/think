<?php
namespace app\index\controller;
class Qfund extends Home {
	public function __construct(){
		parent::__construct();		
	}
		
	/**
	 * [accountInfo 缴存基本信息]	 
	 */
	public function accountInfo(){	
		//$this->person['spmfact'] = cny($this->person['spmfact']);
		var_dump($this->person);
		$this->assign('person',$this->person);			
		return $this->fetch('Qfund/accountInfo');
	}
	
	/**
	 * [accountDetail 缴存明细]	 
	 */
	public function accountDetail(){
		//获取流水
		$person_detail=array();	
				
		$detailM=M('qfund_persondetail');
		$person_detail = $detailM->where("spcode='$this->spcode'")->order('qrrq desc')->select();	
		
		$this->assign('detail',$person_detail);
		$this->assign('totalCount',count($person_detail,0));
		
    $this->display();
	}	
	
	/**
	 * [accountProof 账户缴存证明]	 
	 */
	public function accountProof(){			
		$this->assign('queryDate',date('Y-m-d'));
		$this->assign('person',$this->person);		
		
		//获取流水
		$person_detail=array();	
				
		$detailM=M('qfund_persondetail');
		$person_detail = $detailM->where("spcode='$this->spcode'")->order('qrrq desc')->limit(6)->select();
		
		$this->assign('detail',$person_detail);
		$this->assign('totalCount',count($person_detail,0));
		
		//生成证明编号
		$token =getToken(10);
		$this->assign('token',$token);
     	$this->display();
	}
	
	public function allopatryProof(){	
		$this->assign('queryDate',date('Y-m-d'));
		$list =array();
		$spidno = $this->person['spidno'];
		$m = M('qfund_noloan');
		$list = $m->where("spidno='$spidno'")->select();	
	
		if($list)
		{
			$this->assign('queryDate',date('Y-m-d'));		
		$this->assign('list',$this->person);
		
     	$this->display('allopatryProof2');
		}
		else
		{		
			$spmfact = cny($this->person['spmfact']);
			$spmend = cny($this->person['spmend']);
			//$this->person['spmend'] = cny(number_format($this->person['spmend'],2));
			$this->assign('list',$this->person);			
			$this->assign('spmfact',$spmfact);
			$this->assign('spmend',$spmend);

			//生成证明编号
			$token =getToken(10);
			$this->assign('token',$token);
			$this->display();
		}
	}
	/**
	 * [noLoanProof 无贷款证明]	 
	 */
	public function noLoanProof(){		
		//$this->assign('admin_name',$this->admin_name);
		$this->assign('queryDate',date('Y-m-d'));
		$list =array();
		$spidno = $this->person['spidno'];
		$this->assign('spname',$this->person['spname']);
		$this->assign('spidno',$this->person['spidno']);
		$this->assign('spdate',date('Y-m-d',time()));			
		
		$m = M('qfund_noloan');
		$list = $m->where("spidno='$spidno'")->find();				
		if($list)
		{
			$tips="<font color='red'>由于您当前在我中心存在购房贷款记录，无法出具此证明。</font>（请另行打印其他相关贷款证明）";
			$this->assign('tips',$tips);
			$this->display('noLoanProof2');
		}
		else
		{
			$tips="当前在我中心无购房贷款记录，特此证明。";			
			$this->assign('tips',$tips);

			/*生成证明编号*/
			$token =getToken(10);
			$this->assign('token',$token);
			$this->display();				
		}     	
	}
	
	/**
	 * [loanProof 贷款证明]
	 */
	public function loanProof(){	
		$this->assign('queryDate',date('Y-m-d'));		
		$person_loan=array();
		$commloan=array();	
		$loanDetail =  array();	
		$list =array();
		$m = M('qfund_personloan');
		
		$person_loan = $m->where("spcode='$this->spcode'")->find();;
		if($person_loan)
		{
			//贷款银行名称
			$hkocid = $person_loan['ocid'];
			$list=M('ssorganization')->where("orgcode='$hkocid'")->select();
			$this->assign('orgname',$list[0]['orgname']);
			
			//贷款人单位名称
			$sncode = $this->person['sncode'];		
			$list = M('ssunitinfo')->where("sncode='$sncode'")->select();
			$this->assign('snname',$list[0]['snname']);
			
			//dump($person_loan);
			$this->assign('spname',$person_loan['spname']);
			$this->assign('htbh',$person_loan['htbh']);
			$this->assign('spidno',$person_loan['spidno']);
			$this->assign('jkje',$person_loan['jkje']);
			$this->assign('jkyll',$person_loan['jkyll']);
			$this->assign('fdrq',$person_loan['fdrq']);
			$this->assign('yhym',$person_loan['yhym']);
			$this->assign('bjye',cny($person_loan['bjye']));
			$this->assign('yqys',$person_loan['yqys']);		
			$this->assign('xxdz',$person_loan['xxdz']);
			$this->assign('hkzh',$person_loan['hkzh']);
			$this->assign('xykh',$person_loan['xykh']);
			$this->assign('jkqx',$person_loan['jkqx']);
			$this->assign('yhje',$person_loan['yhje']);
			$this->assign('jsrq',$person_loan['jsrq']);
			$this->assign('hkfs',$person_loan['hkfs']);
			$this->assign('yqbj',$person_loan['yqbj']);
			$this->assign('spcode',$person_loan['spcode']);			
			
			//查询共同贷款人
			//$this->assign('personloan',$person_loan);
			$sqbh=$person_loan['sqbh'];		
			$m = M('pmlsgyr');
			$commloan=$m->where("sqbh='$sqbh'")->select();
			if(commloan)
			{
				$this->assign('commloan',$commloan);
			}			
			///*
			//查询贷款明细
			$hkzh=$person_loan['hkzh'];
			//dump($hkzh);		
			$m = M('qfund_personloandetail2');
			/*$loanDetail=$m->query("SELECT hkzh,hkrq, decode(hklx,'09','逾期还款','01', '手工还款输入', '02','按月柜台还款', '03','公积金还贷', '04','银行代扣', '05','提前还款', '06','逐月提取还款', '07','银行补扣还款', '08','柜面补扣还款', '11','正常还款', '21','逾期还款', '31','提前还清', '32','提前部分还款', '33','全息还清', '41','挂帐结息', '51','挂帐存取', '61','每月转逾', '62','逾期调整', '71','贷款调帐', '91','还贷红冲') hklx,hkym, jzje, yhbj, yhlx,  fx,  ghyqbj,  ghyqlx,  yqbj, yqlx, bjye, nvl(ljyqbj,0) ljyqbj,nvl(ljyqlx,0) ljyqlx FROM hs_pmlshk where hkzh='".$hkzh."' order by hkrq desc");*/
			
			$loanDetail=$m->where("hkzh='$hkzh'")->order("hkrq desc")->limit(6)->select();
			if($loanDetail)
			{
				$this->assign('loandetail',$loanDetail);
				$this->assign('totalCount',count($loanDetail,0));
			}	
			//生成证明编号
			$token =getToken(10);
			$this->assign('token',$token);
			$this->display();						
		}
		else 
		{	
			$this->assign('spdate',date('Y-m-d',time()));
			$this->display('loanProof2');
		}
		
	}

	public function loanInfo(){	
		$this->assign('queryDate',date('Y-m-d'));		
		$person_loan=array();
		$commloan=array();	
		$loanDetail =  array();	
		$list =array();
		$m = M('qfund_personloan');
		
		$person_loan = $m->where("spcode='$this->spcode'")->find();;
		if($person_loan)
		{
			//贷款银行名称
			$hkocid = $person_loan['ocid'];
			$list=M('ssorganization')->where("orgcode='$hkocid'")->select();
			$this->assign('orgname',$list[0]['orgname']);
			
			//贷款人单位名称
			$sncode = $this->person['sncode'];		
			$list = M('ssunitinfo')->where("sncode='$sncode'")->select();
			$this->person['snname']=$list[0]['snname'];
			$this->assign('snname',$list[0]['snname']);
			
			//dump($person_loan);
			$this->assign('spname',$person_loan['spname']);
			$this->assign('htbh',$person_loan['htbh']);
			$this->assign('spidno',$person_loan['spidno']);
			$this->assign('jkje',$person_loan['jkje']);
			$this->assign('jkyll',$person_loan['jkyll']);
			$this->assign('fdrq',$person_loan['fdrq']);
			$this->assign('yhym',$person_loan['yhym']);
			$this->assign('bjye',cny($person_loan['bjye']));
			$this->assign('yqys',$person_loan['yqys']);		
			$this->assign('xxdz',$person_loan['xxdz']);
			$this->assign('hkzh',$person_loan['hkzh']);
			$this->assign('xykh',$person_loan['xykh']);
			$this->assign('jkqx',$person_loan['jkqx']);
			$this->assign('yhje',$person_loan['yhje']);
			$this->assign('jsrq',$person_loan['jsrq']);
			$this->assign('hkfs',$person_loan['hkfs']);
			$this->assign('yqbj',$person_loan['yqbj']);
			$this->assign('spcode',$person_loan['spcode']);			
			
			//查询共同贷款人			
			$sqbh=$person_loan['sqbh'];		
			$m = M('pmlsgyr');
			$commloan=$m->where("sqbh='$sqbh'")->select();
			if(commloan)
			{
				$this->assign('commloan',$commloan);
			}			
			///*
			//查询贷款明细
			$hkzh=$person_loan['hkzh'];
			//dump($hkzh);		
			$m = M('qfund_personloandetail2');
			/*$loanDetail=$m->query("SELECT hkzh,hkrq, decode(hklx,'09','逾期还款','01', '手工还款输入', '02','按月柜台还款', '03','公积金还贷', '04','银行代扣', '05','提前还款', '06','逐月提取还款', '07','银行补扣还款', '08','柜面补扣还款', '11','正常还款', '21','逾期还款', '31','提前还清', '32','提前部分还款', '33','全息还清', '41','挂帐结息', '51','挂帐存取', '61','每月转逾', '62','逾期调整', '71','贷款调帐', '91','还贷红冲') hklx,hkym, jzje, yhbj, yhlx,  fx,  ghyqbj,  ghyqlx,  yqbj, yqlx, bjye, nvl(ljyqbj,0) ljyqbj,nvl(ljyqlx,0) ljyqlx FROM hs_pmlshk where hkzh='".$hkzh."' order by hkrq desc");*/
			
			$loanDetail=$m->where("hkzh='$hkzh'")->order("hkrq desc")->select();
			if($loanDetail)
			{
				$this->assign('loandetail',$loanDetail);
				$this->assign('totalCount',count($loanDetail,0));
			}	
			//*/
			$this->display();						
		}
		else 
		{	
			$this->assign('spdate',date('Y-m-d',time()));
			$this->display('loanInfo2');
		}
	}
	
	public function loanDetail(){	
		$this->assign('queryDate',date('Y-m-d'));		
		$person_loan=array();
		$commloan=array();	
		$loanDetail =  array();	
		$list =array();
		$m = M('qfund_personloan');
		
		$person_loan = $m->where("spcode='$this->spcode'")->find();;
		if($person_loan)
		{
			//贷款银行名称
			$hkocid = $person_loan['ocid'];
			$list=M('ssorganization')->where("orgcode='$hkocid'")->find();
			$this->assign('orgname',$list['orgname']);
			
			//贷款人单位名称
			$sncode = $this->person['sncode'];		
			$list = M('ssunitinfo')->where("sncode='$sncode'")->find();
			$this->assign('snname',$list['snname']);
			
			//dump($person_loan);
			$this->assign('spname',$person_loan['spname']);
			$this->assign('htbh',$person_loan['htbh']);
			$this->assign('spidno',$person_loan['spidno']);
			$this->assign('jkje',$person_loan['jkje']);
			$this->assign('jkyll',$person_loan['jkyll']);
			$this->assign('fdrq',$person_loan['fdrq']);
			$this->assign('yhym',$person_loan['yhym']);
			$this->assign('bjye',cny($person_loan['bjye']));
			$this->assign('yqys',$person_loan['yqys']);		
			$this->assign('xxdz',$person_loan['xxdz']);
			$this->assign('hkzh',$person_loan['hkzh']);
			$this->assign('xykh',$person_loan['xykh']);
			$this->assign('jkqx',$person_loan['jkqx']);
			$this->assign('yhje',$person_loan['yhje']);
			$this->assign('jsrq',$person_loan['jsrq']);
			$this->assign('hkfs',$person_loan['hkfs']);
			$this->assign('yqbj',$person_loan['yqbj']);
			$this->assign('spcode',$person_loan['spcode']);			
			
			//查询共同贷款人
			//$this->assign('personloan',$person_loan);
			$sqbh=$person_loan['sqbh'];		
			$m = M('pmlsgyr');
			$commloan=$m->where("sqbh='$sqbh'")->select();
			if(commloan)
			{
				$this->assign('commloan',$commloan);
			}			
			///*
			//查询贷款明细
			$hkzh=$person_loan['hkzh'];
			//dump($hkzh);		
			$m = M('qfund_personloandetail2');
			/*$loanDetail=$m->query("SELECT hkzh,hkrq, decode(hklx,'09','逾期还款','01', '手工还款输入', '02','按月柜台还款', '03','公积金还贷', '04','银行代扣', '05','提前还款', '06','逐月提取还款', '07','银行补扣还款', '08','柜面补扣还款', '11','正常还款', '21','逾期还款', '31','提前还清', '32','提前部分还款', '33','全息还清', '41','挂帐结息', '51','挂帐存取', '61','每月转逾', '62','逾期调整', '71','贷款调帐', '91','还贷红冲') hklx,hkym, jzje, yhbj, yhlx,  fx,  ghyqbj,  ghyqlx,  yqbj, yqlx, bjye, nvl(ljyqbj,0) ljyqbj,nvl(ljyqlx,0) ljyqlx FROM hs_pmlshk where hkzh='".$hkzh."' order by hkrq desc");*/
			
			$loanDetail=$m->where("hkzh='$hkzh'")->order("hkrq desc")->select();
			if($loanDetail)
			{
				$this->assign('loandetail',$loanDetail);
				$this->assign('totalCount',count($loanDetail,0));
			}	
			//*/
			$this->display('loanDetail');						
		}
		else 
		{	
			$this->assign('spdate',date('Y-m-d',time()));
			$this->display('loanDetail2');
		}
		
	}
	
	public function allopatryLoanSave(){
		$data['token']=I('post.proofCode','','htmlspecialchars');		
		$data['fundcenter']=I('post.fundCenter','','htmlspecialchars');	
		$data['spname']='*'.mb_substr($this->person['spname'],1,8,'utf-8');	
		$data['snname']=$this->person['snname'];	
		$data['spcode']=$this->person['spcode'];	
		$data['spidno']=substr($this->person['spidno'],0,10).'****'.substr($this->person['spidno'],14);	
		$data['spkhrq']=$this->person['spkhrq'];	
		$data['hjstatus']=$this->person['hjstatus'];	
		$data['spmfact']=$this->person['spmfact'];	
		$data['spjcbl']=$this->person['spjcbl'];
		$data['spsingl']=$this->person['spsingl'];
		$data['spmend']=$this->person['spmend'];
		$data['spjym']=$this->person['spjym'];
		$data['sncode']=$this->person['sncode'];		
		
		$m = new \Home\Model\allopatryloancert();
		//$m=M('qfund_allopatryloancert');
		//dump($m);
		$m->create($data);
		$m->add();
		
		
		//$result = $m->add();
		//$result = $m->select();
		//dump($result);
		
	}

	public function saveProof(){
		$data['token']=I('proofCode','','htmlspecialchars');	
		$data['prooftype']=I('proofType','','htmlspecialchars');			
		$data['spname']=$this->person['spname'];			
		$data['querydate']=date('Y-m-d H:i');
		//dump($data);		
		
		$m = M('qfund_proofcert');		
		//var_dump($m);
		$result=$m->data($data)->add();
		
		
	}	
	
	

	
}
