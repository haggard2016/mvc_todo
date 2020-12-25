<?php

namespace MVC;

class TaskController
{
    public $viewData = [];

    public function index()
    {
        $tasks = new Task();
        $this->viewData['tasks'] = $tasks->getAll();
        $this->render('list');
    }

    public function addtask()
    {
        if (isset($_POST['username'])) {
            $task = new Task();
            $task->name = $this->clearInputs($_POST['username']);
            $task->email = $this->clearInputs($_POST['email']);
            $task->description = $this->clearInputs($_POST['description']);
            try {
                $task->save();
            } catch (\PDOException $e) {
                echo $e;
            }
            header("Location: /?request=done");
        }
        $this->render('addtask');
    }

    public function delete($id)
    {
        $task = new Task();
        $task->id = $id;
        try {
            $task->delete();
        } catch (\PDOException $e) {
            echo $e;
        }

        header("Location: /?request=done");
    }

    public function edit($id)
    {
        $task = new Task();
        if (isset($_POST['username'])) {

            session_name('User');
            session_id(PRIVATE_ID);
            session_start();
            $user = $_SESSION['user'];
            session_write_close();
            if ( ! $user) {
                header("Location: /task/login");
                exit();
            }
            $task->id = $id;
            $task->name = $this->clearInputs($_POST['username']);
            $task->email = $this->clearInputs($_POST['email']);
            $task->description = $this->clearInputs($_POST['description']);
            try {
                $task->update();
            } catch (\PDOException $e) {
                echo $e;
            }
            header("Location: /?request=done");
        }
        $this->viewData['task'] = $task->findOne($id);
        $this->render('updatetask');
    }

    public function status($id)
    {
        $task = new Task();
        $task->id = $id;
        try {
            $task->toggleStatus();
        } catch (\PDOException $e) {
            echo $e;
        }
        header("Location: /");
    }

    public function login()
    {
        if (isset($_POST['inputLogin'])) {
            if ($_POST['inputLogin'] == 'admin' && $_POST['inputPassword'] == '123') {
                session_name('User');
                session_id(PRIVATE_ID);
                session_start();
                $_SESSION['user'] = true;
                session_write_close();

                header("Location: /");
            } else {
                header("Location: /task/login/?response=wrong");
            }
        }

        $this->render('login');
    }

    public function logout()
    {
        session_name('User');
        session_id(PRIVATE_ID);
        session_start();
        $_SESSION = array();
        session_write_close();
        unset($this->viewData['user']);
        header("Location: /");
    }

    private function render($view)
    {
        session_name('User');
        session_id(PRIVATE_ID);
        session_start();
        $this->viewData['user'] = $_SESSION['user'];
        session_write_close();

        extract($this->viewData);
        ob_start();
        require_once '../views/' . $view . '.php';
        $pageContent = ob_get_clean();
        require_once '../views/main.php';
    }

    private function clearInputs($input)
    {
        return trim(strip_tags(htmlspecialchars($input)));
    }
}