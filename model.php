<?php
include 'connect.php';
class model{
    function all(){
        global $conn;
        $table=get_class($this);
        $stmt=$conn->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function find($id){
        global $conn;
        $table=get_class($this);
        $stmt=$conn->prepare("SELECT * FROM $table WHERE id=$id");
        $stmt->execute();
        return $stmt->fetch();
    }
    function insert($set){
        global $conn;
        $table=get_class($this);
        $stmt=$conn->prepare("INSERT INTO $table SET $set");
        $stmt->execute();
        // $set = userName='ahmed',email='ahmed@gmail.com'
    }
    function update($set,$id){
        global $conn;
        $table=get_class($this);
        $stmt=$conn->prepare("UPDATE $table SET $set WHERE id='$id'");
        $stmt->execute();
        // $set = userName='ahmed',email='ahmed@gmail.com'
    }
    function delete($id){
        global $conn;
        $table=get_class($this);
        $stmt=$conn->prepare("DELETE FROM $table WHERE id='$id'");
        $stmt->execute();
    }
    function unique($where){
        global $conn;
        $table=get_class($this);
        $stmt=$conn->prepare("SELECT * FROM $table WHERE $where");
        $stmt->execute();
        return $stmt->rowCount();
        // $where = userName='$userName'
    }
}
class users extends model{

}
class categories extends model{

}
$userObject=new users();
$categoryObject=new categories();

// print_r($categoryObject->all());
// print_r($categoryObject->find($id));
// $userObject->insert("userName='fatema', email='fatema@gmail.com',password='12345'");
// $categoryObject->insert("name='emarketing'");
// $userObject->update("userName='essam',email='essam@gmail.com'",4);
// $userObject->delete(4);



// https://github.com/engamibiz/rcc29-7-2021