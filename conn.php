<?php
class pdf{
    public static $alerts=[];
    public static function connect()
    {
        $conn= new PDO("mysql:host=localhost;dbname=pdf","root","");
        return $conn;
    }
    public static function insert($name,$img)
    {
        $add=pdf::connect()->prepare("INSERT INTO pdf_table(id,name,img) VALUES('',?,?)");
        $add->execute(array($name,$img));
        if($add){
            $alerts[]='Ajouter';
        }else{
            pdf::$alerts[]='Pas Ajouter';
        }
    }
public static function select()
{
    $list=pdf::connect()->prepare("SELECT *FROM pdf_table");
    $list->execute();
    $fetch=$list->fetchAll(PDO::FETCH_ASSOC);
    return $fetch;
}
}

?>