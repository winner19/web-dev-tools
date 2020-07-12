<?php

$table['name']="tbl_user";
$table['sname']="user";

$table['cname']="user";

$add['name']="";
$add['return']="";

$update['name']="";
$update['return']="";
$update['field']="user_id";

$select['name']="";
$select['return']="";
$select['field']="user_id";

$delete['name']="";
$delete['return']="";
$delete['field']="user_id";

if( $_POST ){

	$table['name']= $_POST['table_name'];

	$table['sname']= $_POST['table_sname'];

	$table['cname']=$_POST['table_cname'];

	$add['name']= $_POST['fun_add'];
	//$add['return']= $_POST['add_return'];

	$update['name']= $_POST['fun_update'];
	//$update['return']= $_POST['update_return'];
	$update['field']= $_POST['update_feild'];

	$select['name']= $_POST['fun_select'];
	$select['return']= $_POST['select_return'];
	$select['field']= $_POST['select_feild'];

	$delete['name']= $_POST['fun_delete'];
	//$delete['return']= $_POST['delete_return'];
	$delete['field']= $_POST['delete_feild'];

}


function get_function_return_options($name='',$selected='')
{
	?>
	<select class="form-control" name="<?=$name?>" >
		<option value="array" <?=($selected=='array'?'selected':'')?> >Result (array)</option>
		<option value="object" <?=($selected=='object'?'selected':'')?> >Result (object)</option>
		<option value="result" <?=($selected=='result'?'selected':'')?> >Query Result</option>
	</select>
	<?php

}

function get_return_f_name($result_query,$type_name)
{
	$r = $result_query;
	if($type_name=="array"){
		$r .= "->result_array()";
	}elseif ($type_name=="object") {
		$r .= "->result()";
	}else{
	}
	return $r.";";
}


function write_add_fun()
{
	global $table,$add ,$update ,$select ,$delete;
?>
	//add <?=$table['cname'];?>

	public function <?=($add['name']==""?'add_'.$table['sname']:$add['name'])?>($data)
	{
		$result = $this->db->insert("<?=$table['name']?>", $data);
		if($result)
		{ 
			return $this->db->insert_id();
		}
		else
		{ return false; }
	}
<?php
}

function write_update_fun()
{ global $table,$add ,$update ,$select ,$delete;
?>
 	//update <?=$table['cname']?>

 	public function <?=($update['name']==""?'update_'.$table['sname']:$update['name'])?>($update_date,$<?=$update['field']?>)
 	{
		$this->db->where('<?=$update['field']?>', $<?=$update['field']?>);
	 	$result = $this->db->update('<?=$table['name']?>', $update_date); 
		if($result==true)
		{ return $result; }
		else
		{ return false; }
 	}
<?php
}

function write_select_fun()
{ global $table,$add ,$update ,$select ,$delete;
	$tt = get_return_f_name('$'."result_query",$select['return']);
?>
	//select <?=$table['cname']?>

 	public function <?=($select['name']==""?'get_selected_'.$table['sname'].'_row':$select['name'])?>($<?=$select['field']?>)
 	{
		$sql = "SELECT * FROM <?=$table['name']?> WHERE <?=$select['field']?> = '$<?=$select['field']?>' LIMIT 0,1";
 		$result_query = $this->db->query($sql);
 		if($result_query->num_rows() > 0){
 			$result = <?=$tt?>

 			return $result;
 		}else
 		{ return false;}
 	}
<?php
}

function write_delete_fun()
{ global $table,$add ,$update ,$select ,$delete;
?>
	//delete <?=$table['cname']?>

 	public function <?=($delete['name']==""?'delete_'.$table['sname']:$delete['name'])?>($<?=$delete['field']?>)
 	{
		$this->db->where('<?=$delete['field']?>', $<?=$delete['field']?>);
	 	$result = $this->db->delete('<?=$table['name']?>');

 		if($result){
 			return true;
 		}else
 		{ return false;}
 	}
<?php
}


?>