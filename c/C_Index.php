<?php
//
// Конттроллер страниц.
//

class C_Index extends C_Base
{
    
    protected $col_tasks_on_page = 3;
    protected $page_num = 1;
    
	// Конструктор.
	public function __construct(){
		parent::__construct();
	}
	
	public function before(){
		//$this->needLogin = true;
		parent::before();
	}
	
	public function action_index(){
		$this->title .= '::Главная';
        $this->set_variables();
	}
    
    private function set_variables(){
        if ($_COOKIE["pageNum"]){
            $this->page_num = $_COOKIE["pageNum"];
        }
        if ($_COOKIE["postfix"]){
            $this->select_sting_postfix = $_COOKIE["postfix"];
        }
        ob_start();
            ob_start();
                $select_string = "SELECT `id`, `name`, `e-mail`, `text`, `status` FROM `tasks` ORDER BY " . $this->select_sting_postfix;
                $all_tasks = $this->msql->Select($select_string);
                $i = 0;
                foreach ($all_tasks as $task){
                    $i++;
                    if (($i > ($this->page_num-1)*$this->col_tasks_on_page) and ($i < $this->page_num*$this->col_tasks_on_page+1)){
                        $author = $task['name'];
                        $mail = $task['e-mail'];
                        $text = $task['text'];
                        if ($task['status'] == 1)
                            $status = "Не просмотрено администратором";
                        else if ($task['status'] == 2)
                            $status = "Отредактировано администратором";
                        else if ($task['status'] == 3)
                            $status = "Выполнено";
                        require('v/v_task.php');
                    }
                }
                for ($ik = 1; $ik < $i / $this->col_tasks_on_page + 1; $ik++){
                    print_r('<button class="page_button" id="'.$ik.'">'.$ik.'</button>');
                }
            $index_content = ob_get_clean();
            require('v/v_index.php');
        $this->content = ob_get_clean();
    }

}
