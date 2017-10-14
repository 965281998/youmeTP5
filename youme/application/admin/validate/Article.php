<?php
	namespace app\admin\validate;
	use think\Validate;

class Article extends Validate
{
    protected $rule = [
        'title'  =>  'require|max:100|unique:article',
        'keywords'  =>  'require',
    ];
    protected $message  =   [
        'title.require' => '栏目名称不能为空',   
        'title.unique' => '栏目名称不能重复',   
        'title.max' => '栏目名称超长',
        'keywords.require' => '关键字不能为空', 
    ];
}