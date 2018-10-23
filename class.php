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
                $ret=$q->fetch_all();
                $q->free();
                return $ret;
        }

	function querySingle($q)
	{
		$q=$this->db->query($q);
		$ret=$q->fetch_array();
		$q->free();
		return $ret;
	}
	function getChildsOf($id)
	{
		$q='SELECT id,Type FROM tree WHERE parentId = '.$id.';';
		return $this->queryAll($q);
	}
	function getRootId()
	{
                $q='SELECT id,Type FROM tree WHERE parentId = 0;';
                return $this->querySingle($q)['id'];
	}
}


?>
