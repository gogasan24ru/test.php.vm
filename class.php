<?php
class tree
{
	var $db;
	function tree($db,$host,$password,$username){
		$this->db=mysqli_connect($host,
			$username,
			$password,
			$db);//, $opt['port'], $opt['socket']);

		if ($this->db->connect_error) {
			throw new Exception("Mysql connection error");
		}
	}
        function queryAll($q)
        {
                $q=$this->db->query($q);
                $ret=$q->fetch_all(MYSQLI_ASSOC);
                $q->free();
                return $ret;
        }

	function querySingle($q)
	{
		$q=$this->db->query($q);
		$ret=$q->fetch_array(MYSQLI_ASSOC);
		$q->free();
		return $ret;
	}

        function query($q)
        {
                $q=$this->db->query($q);
        }


	function getChildsOf($id)
	{
		$q='SELECT id,Type FROM tree WHERE parentId = '.$id.';';
		return $this->queryAll($q);
	}

	function getChildsOfRec($id,$ret=Array())
        {
                $q='SELECT id,Type FROM tree WHERE parentId = '.$id.';';
		$array=$this->queryAll($q);
		foreach($array as $item)
		{
			if($item["Type"]=="B")
				$ret[]=$item;
			if($item["Type"]=="A")
				$ret=array_merge($this->getChildsOfRec($item['id'],$ret),$ret);
		}
                return $ret;
        }

	function getRootId()
	{
                $q='SELECT id,Type FROM tree WHERE parentId = 0;';
                return $this->querySingle($q)['id'];
	}

	function createElement($parentId,$type)
	{
		if(in_array($type,Array("A","B")))
		{
			$q='INSERT INTO `tree` (`parentId`,`Type`)'.
				' VALUES ('.
				$parentId.
				',"'.
				$type.
				'");';
			 $this->query($q);
		}
	}
}


?>
