<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Datatables
{
    private $table;
    private $key_table;
    private $select;
    private $join     = array();
    private $where    = array();
    private $wherein  = array();
    private $like     = array();
    private $order_by = "";
    private $group_by = "";

    public function setFrom($table)
    {
        $this->table = $table;
    }

    public function setSelect(array $array)
    {
        $this->select = $array;
    }

    public function setJoin($table, $condicion, $type = "INNER")
    {
        $this->join[] = array($table, $condicion, $type);
    }

    public function setLeftJoin($table, $condicion, $type = "LEFT")
    {
        $this->join[] = array($table, $condicion, $type);
    }

    public function setWhere($column, $val = "")
    {
        $this->where[] = [$column, $val];
    }

    public function setWhereIn($column, $val = [])
    {
        $this->wherein = ['column' => $column, 'values' => $val];
    }

    public function setLike($column, $val)
    {
        $this->like[] = array($column, $val);
    }

    public function setOrderBy($text)
    {
        $this->order_by = $text;
    }

    public function setGroupBy($text)
    {
        $this->group_by = $text;
    }

    public function getData()
    {
        $CI = & get_instance();
        $CI->load->database();

        $aColumns      = $this->select;
        $searchColumns = $aColumns;
        $sTable        = $this->table;

        $idColumn = $aColumns[count($aColumns) - 1];
        $idColumn = explode(".", $idColumn);
        if (count($idColumn) > 1) {
            $idColumn = $idColumn[1];
        } else {
            $idColumn = $idColumn[0];
        }

        for ($i = 0; $i < count($aColumns); $i++) {
            $result = explode(" AS ", $aColumns[$i]);
            if (count($result) > 1) {
                $aColumns[$i] = trim($result[1]);
            }
        }

        for ($i = 0; $i < count($searchColumns); $i++) {
            $result = explode(" AS ", $searchColumns[$i]);
            if (count($result) > 1) {
                $searchColumns[$i] = trim($result[0]);
            }
        }

        if ((int) $_GET['start'] != 0) {
            $limit = " LIMIT ".(int) $_GET['length']." OFFSET ".(int) $_GET['start']." ";
        } else {
            $limit = " LIMIT ".(int) $_GET['length'];
        }

        /**
         *
         * order[0][column]: 1
           order[0][dir]: asc
         */
        
        $text_order_by_datatable = "";
        if($_GET['order']){
            $text_order_by_datatable .= " ".$searchColumns[(int) $_GET['order'][0]['column']]." ".strtoupper($_GET['order'][0]['dir']);
        }

        $text_order_by = "";
        if (!empty($text_order_by_datatable) && !empty($this->order_by)) {
            $text_order_by_datatable .= ", ";
        }

        $text_order_by_datatable = ($this->order_by != "") ? $text_order_by_datatable.$this->order_by
                : $text_order_by_datatable;
        $text_order_by           .= (!empty($text_order_by_datatable)) ? " ORDER BY ".$text_order_by_datatable
                : " ";

        $where                = "";
        $text_where_datatable = "";

        for ($i = 0; $i < count($searchColumns); $i++) {
            if (isset($_GET['columns'][$i]["search"]["value"]) && $_GET['search']["value"]
                != '') {
                $type                 = ( $i != 0 ) ? " OR " : "";
                $text_where_datatable .= $type.$searchColumns[$i]." LIKE '%".$_GET['search']["value"]."%' ";
            }
        }
        if ($text_where_datatable != "") {
            $text_where_datatable = " (".$text_where_datatable.") ";
        }

        for ($i = 0; $i < count($this->where); $i++) {
            if ($i == 0 && $text_where_datatable != "") {
                $type = " AND ";
            } elseif ($i == 0 && $where == "") {
                $type = "";
            } else {
                $type = " AND ";
            }

            $operador = " ";

            if (!empty($this->where[$i][1])) {
                if (!strpos($this->where[$i][0], "=")) {
                    $operador = " = ";
                }

                if (!is_numeric($this->where[$i][1]) && strlen($this->where[$i][1])
                    == 1) {
                    $this->where[$i][1] = "'".$this->where[$i][1]."'";
                }
            }
            $text_where_datatable .= $type.$this->where[$i][0].$operador.$this->where[$i][1]." ";
        }
        $where = ($text_where_datatable != "") ? " WHERE ".$text_where_datatable
                : "";

        $like                = '';
        $text_like_datatable = '';
        for ($i = 0; $i < count($this->like); $i++) {
            if ($i == 0 && $text_like_datatable != "") {
                $type = " AND ";
            } elseif ($i == 0 && $like == "") {
                $type = "";
            } else {
                $type = " AND ";
            }
            $operador = " ";
            if (!strpos($this->like[$i][0], "=")) {
                $operador = " like ";
            }
            if (!is_numeric($this->like[$i][1]) && strlen($this->like[$i][1]) == 1) {
                $this->like[$i][1] = "'".$this->like[$i][1]."'";
            }
            $text_like_datatable .= $type.$this->like[$i][0].$operador.$this->like[$i][1]." ";
        }
        $wherein = '';
        if (!empty($this->wherein)) {
            if ($where != '') {
                $wherein .= ' AND ';
            } else {
                $wherein .= ' WHERE ';
            }
            $values  = implode(',', $this->wherein['values']);
            $wherein .= $this->wherein['column'].' IN('.$values.')';
        }
        if ($where != '' && $wherein != '') {
            $like = ($text_like_datatable != "") ? " AND ".$text_like_datatable : "";
        } else {
            $like = ($text_like_datatable != "") ? " WHERE ".$text_like_datatable
                    : "";
        }

        $text_group_by = (!empty($this->group_by) ) ? " GROUP BY ".$this->group_by." "
                : $this->group_by;

        $join = "";
        for ($i = 0; $i < count($this->join); $i++) {
            if (!isset($this->join[$i][2])) {
                $type_join = "INNER";
            } else {
                $type_join = $this->join[$i][2];
            }
            $join .= " ".$type_join." JOIN ".$this->join[$i][0]." ON ".$this->join[$i][1]." ";
        }

        $sql          = "SELECT ".implode(',',$this->select)." FROM ".$sTable.$join.$where.$wherein.$like.$text_group_by.$text_order_by.$limit;
        $rResult      = $CI->db->query($sql);
        $iTotal       = count($rResult->result());
        $sql_all_data = "SELECT COUNT(*) AS found_rows FROM ".$sTable.$join.$where.$wherein;

        $new_query = $CI->db->query($sql_all_data);
        if (count($new_query->row()) > 0) {
            $iFilteredTotal = $new_query->row()->found_rows;
        } else {
            $iFilteredTotal = $iTotal;
        }

        $output = array(
            'draw'            => $_GET['draw'],
            'recordsTotal'    => $iTotal,
            'recordsFiltered' => intval($iFilteredTotal),
            'data'            => array()
        );


        foreach ($aColumns as $k => $val) {
            if (strpos($val, 'AS')) {
                $newKey       = explode('AS', $val);
                $aColumns[$k] = trim($newKey[1]);
            }
        }

        foreach ($rResult->result_array() as $aRow) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                $key   = explode(".", $aColumns[$i]);
                $key   = (count($key) > 1) ? trim($key[1]) : trim($key[0]);
                $row[] = $aRow[$key];
                if (trim($key) == trim($idColumn)) {
                    $row['DT_RowId'] = $aRow[$key];
                }
            }
            $output['data'][] = $row;
        }
        return json_encode($output);
    }
}
?>