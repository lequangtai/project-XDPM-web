<?php
function menuMulti($data, $parent_id = 0, $str ="-|", $select =0){
	foreach ($data as  $val) {
		$id = $val["id"];
		$name = $val["tenloai"];

		if($val["id_cha"]==$parent_id){
			if($select !=0 && $id == $select){
				echo '<option value="'.$id.'"selected>'.$str."".$name.'</option>';
			}else{
				echo '<option value="'.$id.'">'.$str."".$name.'</option>';
			}
		
		menuMulti($data, $id, $str."-|");
		}

	}
}

function menuMulti2($quyen, $parent_id = 0, $str ="-|", $select =0){
	foreach ($quyen as  $val) {
		$id = $val["id"];
		$name = $val["tenquyen"];

		if($val["id_cha"]==$parent_id){
			if($select !=0 && $id == $select){
				echo '<option value="'.$id.'"selected>'.$str."".$name.'</option>';
			}else{
				echo '<option value="'.$id.'">'.$str."".$name.'</option>';
			}
		
		menuMulti2($quyen, $id, $str."-|");
		}

	}
}


function listCate($data, $parent =0,$str ="-"){
	
	foreach ($data as  $val) {

		
		$id =$val["id"];
		$name =$val["tenloai"];
		if($val["id_cha"] ==$parent){
		echo'

			<tr>';
	        if($str =="-"){

	        	echo' <td><b>'.$str.''.$name.'</b></td>';
	        }else{
	        	echo' <td>'.$str.''.$name.'</td>';
	        }
	       echo'
	       <td style="text-align: center;">
	       <a href="edit/'.$id.'"><i class="fa  fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="delete/'.$id.'"onclick = "return xacnhanxoa (\'Bạn có muốn xóa không?\')"><i class="fa  fa-trash-o"></i></a>

       </td>
    </tr>';
    listCate($data, $id, $str."-|");
		}
	
	}
}



function menuMulti1($data){
	foreach ($data as  $val) {
		echo '<option value="'.$val["id"].'">'.$val["tennhomquyen"].'</option>';
	}			
}
?>