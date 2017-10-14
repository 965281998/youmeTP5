<?php
	namespace app\admin\validate;
	use think\Validate;

class Cate extends Validate
{
    protected $rule = [
        'catename'  =>  'require|max:25|unique:cate',
        'keywords'  =>  'require',
    ];

    protected $message  =   [
        'catename.require' => '栏目名称不能为空',   
        'catename.unique' => '栏目名称不能重复',   
        'catename.max' => '栏目名称超长',
        'keywords.require' => '栏目关键字不能为空', 
    ];

    //验证场景
    protected $scene = [
        'edit' => ['catename'],
    ];
}