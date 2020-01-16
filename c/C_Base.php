<?php
//
// Базовый контроллер сайта.
//
abstract class C_Base extends C_Controller
{
	protected $title;		// заголовок страницы
	protected $content;		// содержание страницы
	protected $needLogin;	// необходима ли авторизация
    protected $msql;        // объект БД
    protected $muser;       // данные пользователя
    protected $select_sting_postfix = "`name`";  // дополнение к sql-запросу для правильной сортировки задач

	// Конструктор.
	function __construct()
	{	
		$this->needLogin = false;
        $this->msql = M_MSQL::Instance();
        $this->muser = M_User::Instance();
	}
    
	protected function before()
	{
        
        // Авторизация по кукам
        if (is_null($this->muser->id_user)){
            if ($_COOKIE["userLogin"] && $_COOKIE["userPassword"]){
                $this->muser->log_in($_COOKIE["userLogin"], $_COOKIE["userPassword"]); 
            }
        }
	
        $this->post_method_handler();
		$this->title = '';
		$this->content = '';
	}
	
	// Генерация базового шаблона	
	public function render()
	{
		$vars = array('title' => $this->title, 'content' => $this->content);
		$page = $this->Template('v/v_main.php', $vars);				
		echo $page;
	}
    
    // Обработчик данных, пришедших в POST-запросе от script.js
    private function post_method_handler(){
        if($this->isPost())
		{
            if($_POST['sorting']){
                switch ($_POST['value']) {
                    case 1:
                        $postfix = "`name`";
                        break;
                    case 2:
                        $postfix = "`e-mail`";
                        break;
                    case 3:
                        $postfix = "`status`";
                        break;
                }
                switch ($_POST['order']) {
                    case 1:
                        break;
                    case 2:
                        $postfix .= " DESC";
                        break;
                }
                setcookie("postfix", $postfix, time()+3600, '/');
                $this->redirect('/');
            }
            if($_POST['addnewtask']){
                $new_task = array();
                $new_task['`name`'] = $_POST['author'];
                $new_task['`e-mail`'] = $_POST['email'];
                $new_task['`text`'] = $_POST['text'];
                $new_task['`status`'] = 1;
                $this->msql->Insert('tasks', $new_task);
            }
            if($_POST['page_num']){
                setcookie("pageNum", $_POST['page_num'], time()+15, '/');
            }
		}
    }
}
