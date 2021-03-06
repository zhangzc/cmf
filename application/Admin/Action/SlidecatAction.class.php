<?php
class SlidecatAction extends AdminbaseAction{
	
	protected $slidecat_obj;
	
	function _initialize() {
		parent::_initialize();
		$this->slidecat_obj = new  SlideCatModel();
	}
	
	function index(){
		$cats=$this->slidecat_obj->where("cat_status!=0")->select();
		$this->assign("slidecats",$cats);
		$this->display();
	}
	
 	/**
     *  添加
     */
    public function add() {
        $this->display();
    }
	
    /**
     *  添加
     */
    public function add_post() {
    	if (IS_POST) {
    		if ($this->slidecat_obj->create()) {
    			if ($this->slidecat_obj->add()) {
    				$this->success("添加成功！", U("slidecat/index"));
    			} else {
    				$this->error("添加失败！");
    			}
    		} else {
    			$this->error($this->slidecat_obj->getError());
    		}
    	}
    }
	function edit(){
		$id=$this->_get("id");
		$slidecat=$this->slidecat_obj->where("cid=$id")->find();
		$this->assign($slidecat);
		$this->display();
	}
	
	function edit_post(){
		if (IS_POST) {
			if ($this->slidecat_obj->create()) {
				if ($this->slidecat_obj->save()!==false) {
					$this->success("保存成功！", U("slidecat/index"));
				} else {
					$this->error("保存失败！");
				}
			} else {
				$this->error($this->slidecat_obj->getError());
			}
		}
	}
	
	
	function delete(){}
	
	
}