<?php

namespace MVC;

class Task
{
    public $id, $name, $email, $description, $created_at, $updated_at;

    public function save()
    {
        $sql = "INSERT INTO tasks (user_name, email, description, created_at, updated_at) 
                           VALUES (:user_name, :email, :description, :created_at, :updated_at)";

        $req = Db::getDbh()->prepare($sql);

        return $req->execute([
            'user_name' => $this->name,
            'email' => $this->email,
            'description' => $this->description,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
    }

    public function update()
    {
        $sql = "UPDATE tasks SET user_name = :user_name, email = :email, description = :description , updated_at = :updated_at WHERE id = :id";

        $req = Db::getDbh()->prepare($sql);

        return $req->execute([
            'id' => $this->id,
            'user_name' => $this->name,
            'email' => $this->email,
            'description' => $this->description,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function delete()
    {
        $sql = 'DELETE FROM tasks WHERE id = ?';
        $req = Db::getDbh()->prepare($sql);
        return $req->execute([$this->id]);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM tasks";
        $req = Db::getDbh()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function findOne($id)
    {
        $sql = "SELECT user_name, email, description FROM tasks WHERE id = :id";
        $req = Db::getDbh()->prepare($sql);
        $req->execute(['id' => $id]);
        return $req->fetch();
    }

    public function toggleStatus()
    {
        $sql = "UPDATE tasks SET status = !status WHERE id = :id";
        $req = Db::getDbh()->prepare($sql);
        return $req->execute(['id' => $this->id]);
    }
}