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
        
        $filter = array("<", ">");
        
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
                $this->redirect('../');
            }
            if($_POST['addnewtask']){
                $new_task = array();
                $new_task['`name`'] = str_replace ($filter, "|", $_POST['author']);
                $new_task['`e-mail`'] = str_replace ($filter, "|", $_POST['email']);
                $new_task['`text`'] = str_replace ($filter, "|", $_POST['text']);
                $new_task['`status`'] = 1;
                $this->msql->Insert('tasks', $new_task);
            }
            if($_POST['modifytask']){
                if(! is_null($this->muser->id_user)){
                    $modif_task = array();
                    $modif_task['`text`'] = str_replace ($filter, "|", $_POST['text']);
                    $modif_task['`status`'] = $_POST['status'];
                    $this->msql->Update('tasks', $modif_task, "`id` = '".$_POST['id']."'");
                }
                else{
                    $this->redirect('../auth/login');
                }
            }
            if($_POST['page_num']){
                setcookie("pageNum", $_POST['page_num'], time()+15, '/');
            }
            if($_POST['login']){
                $auth_done = $this->muser->log_in($_POST['auth_login'], md5($_POST['auth_password']));
                if ($auth_done){
                    $this->redirect('../index/index');
                } else {
                    print_r("<h3 align='center'>Неверный логин или пароль!</h3>");
                }
            }
            if($_POST['account_exit']){
                $this->muser->id_user = null;
                $this->muser->user_role = null;
                $this->muser->user_name = null;
                setcookie("userLogin", '', time()-86400, '/');
                setcookie("userPassword", '', time()-86400, '/');
            }
		}
    }
}
