<?php 
class MainObjectBDD { 

    public function __construct($id=null)
    {
        if (!empty($id)) {
            $bdd = BDD::getConnection();
            $res = $bdd->query('SELECT * FROM '.Static::$tablename.' WHERE id=' . $id);
            $result = $res->fetch(PDO::FETCH_ASSOC);
          
            foreach ($result as $k => $v) {
                $this->$k = $v;
            }
        }
    }


    public static function findOne($filters)
    {
        $bdd = BDD::getConnection();
        $where = '';
        $clauses = [];
        foreach ($filters as $k => $f) {
            $clauses[] = $k.'='.$bdd->quote($f);
        }

        if (!empty($clauses)) {
            $where = 'WHERE '.implode(' AND ', $clauses);
        }
        $query = 'SELECT * FROM '.Static::$tablename.' '.$where.'LIMIT 0,1';// je comprends pas !!
        var_dump($query);
        $res = $bdd->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        return $res->fetch();

    }

    public static function findAll($filters=[])// tableau ou pas !!
    {
        $bdd = BDD::getConnection();

        $clauses = [];
        $where = '';
        foreach ($filters as $k => $f) {
            $clauses[] = $k.'='.$bdd->quote($f);
        }

        if (!empty($clauses)) {
            $where = 'WHERE '.implode(' AND ', $clauses);
        }
        $query = 'SELECT * FROM '.Static::$tablename.' '.$where;
        var_dump($query);
        $res = $bdd->query($query);
        return $res->fetchAll(PDO::FETCH_CLASS, get_called_class());
    }
}
