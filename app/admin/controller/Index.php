<?php
namespace app\admin\controller;

class Index extends \think\Controller
{
    public function index()
    {
		$this->assign('spname','ThinkPHP');
        $this->assign('email','thinkphp@qq.com');
        // 或者批量赋值
        $this->assign([
            'name'  => 'ThinkPHP',
            'email' => 'thinkphp@qq.com'
        ]);
        // 模板输出
        return $this->fetch('index');
    }
	
	public function welcome()
	{
		return "";
	}
}
