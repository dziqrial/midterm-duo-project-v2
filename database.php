<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','db_midterm');

class Database {
  protected mysqli $mysqli;
  protected string $query='';
  protected array $bindings=[];
  protected string $types='';

  function __construct(){
    $this->mysqli=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if($this->mysqli->connect_errno){
      die('Koneksi gagal: '.$this->mysqli->connect_error);
    }
  }

  private function resetBind(){ $this->bindings=[]; $this->types=''; }
  private function inferType($v){ return is_int($v)?'i':'s'; }

  function table($table){
    $this->resetBind();
    $this->query="SELECT * FROM `$table`";
    return $this;
  }

  function where(array $arr=[]){
    if(!$arr) return $this;
    $w=[];
    foreach($arr as $k=>$v){
      $w[]="`$k`=?";
      $this->bindings[]=$v;
      $this->types.=$this->inferType($v);
    }
    $this->query.=" WHERE ".implode(' AND ',$w);
    return $this;
  }

  function get(){
    $s=$this->mysqli->prepare($this->query);
    if($this->bindings) $s->bind_param($this->types,...$this->bindings);
    $s->execute();
    $r=$s->get_result();
    return $r?$r->fetch_all(MYSQLI_ASSOC):[];
  }

  function first(){
    $this->query.=' LIMIT 1';
    $r=$this->get();
    return $r[0]??null;
  }

  function insert(array $arr){
    $this->query=preg_replace('/^SELECT \* FROM /','INSERT INTO ',$this->query);
    $c=$v=[]; $this->resetBind();
    foreach($arr as $k=>$val){
      $c[]="`$k`"; $v[]='?';
      $this->bindings[]=$val;
      $this->types.=$this->inferType($val);
    }
    $this->query.=' ('.implode(',',$c).') VALUES ('.implode(',',$v).')';
    $s=$this->mysqli->prepare($this->query);
    $s->bind_param($this->types,...$this->bindings);
    return $s->execute();
  }

  function update(array $arr){
    $this->query=preg_replace('/^SELECT \* FROM /','UPDATE ',$this->query);
    $p=explode(' WHERE ',$this->query,2);
    if(count($p)<2) die('UPDATE wajib WHERE');
    $set=[]; $nb=[]; $nt='';
    foreach($arr as $k=>$v){
      $set[]="`$k`=?";
      $nb[]=$v;
      $nt.=$this->inferType($v);
    }
    $this->bindings=array_merge($nb,$this->bindings);
    $this->types=$nt.$this->types;
    $this->query=$p[0].' SET '.implode(',',$set).' WHERE '.$p[1];
    $s=$this->mysqli->prepare($this->query);
    $s->bind_param($this->types,...$this->bindings);
    return $s->execute();
  }

  function delete(){
    $this->query=preg_replace('/^SELECT \* FROM /','DELETE FROM ',$this->query);
    if(strpos($this->query,'WHERE')===false) die('DELETE wajib WHERE');
    $s=$this->mysqli->prepare($this->query);
    if($this->bindings) $s->bind_param($this->types,...$this->bindings);
    return $s->execute();
  }
}
