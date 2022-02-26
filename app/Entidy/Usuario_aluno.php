<?php 

namespace App\Entidy;

use \App\Db\Database;

use \PDO;

class Usuario_aluno{
    

    public $usuarios_id;
    public $alunos_id;
    
    public function cadastar(){


        $obdataBase = new Database('usuarios_has_alunos');  
        
        $this->id = $obdataBase->insert([
          
           
            'alunos_id'                  => $this->alunos_id,
            'usuarios_id'                => $this->usuarios_id
          
        ]);

        return true;

    }

    public function atualizar(){
        return (new Database ('usuarios_has_alunos'))->update('alunos_id = ' .$this-> alunos_id, [
    
            'alunos_id'                  => $this->alunos_id,
            'usuarios_id'                => $this->usuarios_id
        ]);
      
    }

    public static function getList($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('usuarios_has_alunos'))->select($fields, $table, $where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }



    public static function getQtd($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('usuarios_has_alunos'))->select('COUNT(*) as qtd', 'usuarios_has_alunos', null, null)
            ->fetchObject()
            ->qtd;
    }


    public static function getID($fields, $table, $where, $order, $limit)
    {
        return (new Database('usuarios_has_alunos'))->select($fields, $table, 'id = ' . $where, $order, $limit)
            ->fetchObject(self::class);
    }

    public static function getUsauriAlunoID($fields, $table, $where, $order, $limit)
    {
        return (new Database('usuarios_has_alunos'))->select($fields, $table, 'alunos_id = ' . $where, $order, $limit)
            ->fetchObject(self::class);
    }


public function excluir(){
    return (new Database ('usuarios_has_alunos'))->delete('id = ' .$this->id);
  
}


public static function getUsuarioPorEmail($email){

    return (new Database ('usuarios_has_alunos'))->select('email = "'.$email.'"')-> fetchObject(self::class);

}



}