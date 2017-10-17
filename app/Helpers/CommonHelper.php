<?php

function menuMulti($data, $parent_id = 0, $str = '---|', $select = 0)
{
    foreach ($data as $val) {
        $id = $val['id'];
        $name = $val['name'];
        if ($val['parent_id'] == $parent_id) {
            if ($select != 0 && $id == $select) {
                echo '<option value="' . $id . '" selected="" ' . $select . '>' . $str . ' ' . $name . '</option>';
            } else {
                echo '<option value="' . $id . '" ' . $select . '>' . $str . ' ' . $name . '</option>';
            }

            menuMulti($data, $id, $str . ' ---|', $select);
        };
    }
}


function listCat($data, $parent = 0, $str = "")
{
    foreach ($data as $val) {
        $id = $val['id'];
        $name = $val['name'];

        if ($val['parent_id'] == $parent) {
            echo '
				<tr class="list_data">';
            if ($parent == 0) {
                echo '<td class="list_td "  style="width:80%;"><b>' . $str . ' ' . $name . '</b></td>';
            } else {
                echo '<td class="list_td "  style="width:80%;">' . $str . ' ' . $name . '</td>';
            }
            echo '<td class="list_td text-center" style="width:20%;">
	                    <a  class="btn btn-primary btn-sm" role="button" href="' . route('getCatEdit', ['id' => $id]) . '"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;
	                    <a  class="btn btn-danger  btn-sm" role="button" href="' . route('getCatDel', ['id' => $id]) . '" onclick="return xacnhanxoa(\'Are you sure ?\')"><i class="fa fa-times" aria-hidden="true"></i></a>
	                </td>
	            </tr>';
            listCat($data, $id, $str . "---|");
        }
    }
}

function listPer($data, $parent = 0, $str = "")
{
    foreach ($data as $val) {
        $id = $val['id'];
        $name = $val['name'];
        $routes = $val['routes'];

        if ($val['parent_id'] == $parent) {
            echo '
				<tr class="list_data">';
            if ($parent == 0) {
                echo '<td class="list_td alignleft"><b>' . $str . ' ' . $name . '</b></td>';
            } else {
                echo '<td class="list_td alignleft">' . $str . ' ' . $name . '</td>';
            };
            echo '<td class="list_td text-center"><em>' . $routes . '</em></td>';
            echo '<td class="list_td text-center">
	                    <a  class="btn btn-primary btn-sm" role="button" href="' . route('getPerEdit', ['id' => $id]) . '"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;	                  
	                    <a  class="btn btn-danger  btn-sm" role="button" href="' . route('getPerDel', ['id' => $id]) . '" onclick="return xacnhanxoa(\'Are you sure ?\')"><i class="fa fa-times" aria-hidden="true"></i></a>
	                </td>
	            </tr>';
            listPer($data, $id, $str . "---|");
        }
    }
}
function listPer2($data, $parent = 0,$data_old="")
{
    foreach ($data as $val) {
        $id = $val['id'];
        $name = $val['name'];
        if ($val['parent_id'] == $parent) {
            if(!empty($data_old)){
                $data_old = $data_old;
                $data_curent = json_decode($data_old);
            }
            if ($parent == 0) {
                echo '<div class="col" style="padding-top: 10px;padding-bottom: 10px;">
                            <input type="checkbox" name="listper[]" ';
                            if(isset($data_curent)):
                if (in_array($id, $data_curent)) {
                  echo "checked";
            };endif;         
            echo ' value="'.$id.'" class="checkbox-inline"> <b>'.$name.'</b>
                        </div>';
            } else {
                echo '<div class="col-4">---|-
                            <label class="checkbox-inline"><input type="checkbox" name="listper[]" ';
                            if(isset($data_curent)):
                if (in_array($id, $data_curent)) {
                  echo "checked";
            };endif;          
            echo '  value="'.$id.'"> '.$name.'</label>
                        </div>';
            };        
            listPer2($data, $id,$data_old);
        }
    }
}

?>