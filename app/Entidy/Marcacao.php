<?php 

namespace App\Entidy;

use \App\Db\Database;

use \PDO;

class Marcacao{
    
    public $id;
    public $data;
    public $status;
    public $alunos_id;
    public $horario_id;
    
    public function cadastar(){


        $obdataBase = new Database('marcacao');  
        
        $this->id = $obdataBase->insert([
          
           
            'id'                         => $this->id,
            'data'                       => $this->data,
            'status'                     => $this->status,
            'alunos_id'                  => $this->alunos_id,
            'horario_id'                 => $this->horario_id
          
        ]);

        return true;

    }

    public function atualizar(){
        return (new Database ('marcacao'))->update('id = ' .$this-> id, [
    
           
            'id'                         => $this->id,
            'data'                       => $this->data,
            'status'                     => $this->status,
            'alunos_id'                  => $this->alunos_id,
            'horario_id'                 => $this->horario_id
        ]);
      
    }
    

    public static function getList($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('marcacao'))->select($fields, $table, $where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }



    public static function getQtd($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('marcacao'))->select('COUNT(*) as qtd', 'marcacao', null, null)
            ->fetchObject()
            ->qtd;
    }


    public static function getID($fields, $table, $where, $order, $limit)
    {
        return (new Database('marcacao'))->select($fields, $table, 'id = ' . $where, $order, $limit)
            ->fetchObject(self::class);
    }
    public static function getAlunoMarcado($fields, $table, $where, $order, $limit)
    {
        return (new Database('marcacao'))->select($fields, $table, 'alunos_id = ' . $where, $order, $limit)
            ->fetchObject(self::class);
    }


    public static function getHoraID($fields, $table, $where, $order, $limit)
    {
        return (new Database('marcacao'))->select($fields, $table, 'horario_id = ' . $where, $order, $limit)
        ->fetchAll(PDO::FETCH_CLASS, self::class);
    }


public function excluir(){
    return (new Database ('marcacao'))->delete('id = ' .$this->id);
  
}

}