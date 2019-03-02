<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

function is_active_nav($current_class, $current_action = 'index')
{
    $ci     = & get_instance();
    $class  = $ci->router->fetch_class();
    $action = $ci->router->fetch_method();
    if ($class == $current_class && $action == $current_action) {
        return true;
    }
    return false;
}

function set_files($file, $config, $ci, $header, $time = TRUE)
{
    if (is_array($file)) {
        if (!is_array($file) && count($file) <= 0) {
            return;
        }
        foreach ($file AS $item) {
            $header[] = [$item, $time];
        }
        $ci->config->set_item($config, $header);
    } else {
        $header[] = [$file, $time];
        $ci->config->set_item($config, $header);
    }
}

function prepend_js($file = '', $time = TRUE)
{
    $ci        = &get_instance();
    $header_js = $ci->config->item('prepend_js');

    if (empty($file)) {
        return;
    }
    set_files($file, 'prepend_js', $ci, $header_js, $time);
}

function prepend_css($file = '')
{
    $ci         = &get_instance();
    $header_css = $ci->config->item('prepend_css');

    if (empty($file)) {
        return;
    }
    set_files($file, 'prepend_css', $ci, $header_css);
}

function append_js($file = '', $time = TRUE)
{
    $ci        = &get_instance();
    $header_js = $ci->config->item('append_js');

    if (empty($file)) {
        return;
    }
    set_files($file, 'append_js', $ci, $header_js, $time);
}

function append_css($file = '')
{
    $ci         = &get_instance();
    $header_css = $ci->config->item('append_css');

    if (empty($file)) {
        return;
    }
    set_files($file, 'append_css', $ci, $header_css);
}

function get_prepend_css()
{
    $str        = '';
    $ci         = &get_instance();
    $header_css = $ci->config->item('prepend_css');
    foreach ($header_css AS $item) {
        $path = ( $item[1] ) ? $item[0]. "?t='" . time() . "'" : $item[0];
        $str .= '<link rel="stylesheet" href="' . $path . '" type="text/css" />' . "\n";
    }

    echo $str;
}

function get_append_css()
{
    $str        = '';
    $ci         = &get_instance();
    $header_css = $ci->config->item('append_css');
    foreach ($header_css AS $item) {
        $path = ( $item[1] ) ? $item[0]. "?t='" . time() . "'" : $item[0];
        $str .= '<link rel="stylesheet" href="' . $path . '" type="text/css" />' . "\n";
    }

    echo $str;
}

function get_prepend_js()
{
    $str       = '';
    $ci        = &get_instance();
    $header_js = $ci->config->item('prepend_js');

    foreach ($header_js AS $item) {
        $path = ( $item[1] ) ? $item[0]. "?t='" . time() . "'" : $item[0];
        $str .= '<script type="text/javascript" src="' . $path . '"></script>' . "\n";
    }

    echo $str;
}

function get_append_js()
{
    $str       = '';
    $ci        = &get_instance();
    $header_js = $ci->config->item('append_js');
    
    foreach ($header_js AS $item) {
        $path = ( $item[1] ) ? $item[0]. "?t='" . time() . "'" : $item[0];
        $str .= '<script type="text/javascript" src="' . $path . '"></script>' . "\n";
    }

    echo $str;
}

function include_default_js()
{
    $ci            = & get_instance();
    $class         = $ci->router->fetch_class();
    $action        = $ci->router->fetch_method();
    $filePath = 'assets/js/';
    if(ENVIRONMENT != 'development'){
         $filePath = 'assets/dist/js/';
    }
    $relative_path = $filePath . $class . '/' . $action . '.js';
    if (file_exists(FCPATH . $relative_path)) {
        echo '<script type = "text/javascript" src ="' . base_url($relative_path . '?time=' . time()) . '"></script>'. "\n";
    }
}

function include_default_css()
{
    $ci            = & get_instance();
    $class         = $ci->router->fetch_class();
    $action        = $ci->router->fetch_method();
    $filePath = 'assets/css/';
    if(ENVIRONMENT != 'development'){
         $filePath = 'assets/dist/css/';
    }
    $relative_path = $filePath . $class . '/' . $action . '.css';
    if (file_exists(FCPATH . $relative_path)) {
        echo '<link href="' . base_url($relative_path . '?time=' . time()) . '" rel="stylesheet" type="text/css"/>';
    }
}

function array_sort_by_column(&$arr, $col, $dir = SORT_DESC)
{
    $sort_col = array();
    foreach ($arr as $key => $row) {
        $sort_col[$key] = $row[$col];
    }
    array_multisort($sort_col, $dir, $arr);
    //return $arr;
}

function uniqidReal($lenght = 20)
{
    // uniqid gives 13 chars, but you could adjust it to your needs.
    if (function_exists("random_bytes")) {
        $bytes = random_bytes(ceil($lenght / 2));
    } elseif (function_exists("openssl_random_pseudo_bytes")) {
        $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
    } else {
        throw new Exception("no cryptographically secure random function available");
    }
    return substr(bin2hex($bytes), 0, $lenght);
}

function post_mapping($remove_values = [])
{
    $ci       = & get_instance();
    $postData = $ci->input->post();
    foreach ($remove_values as $del_val) {
        unset($postData[$del_val]);
    }

    return $postData;
}

function debug($list)
{
    echo "<pre>";
    print_r($list);
    die;
}

function create_flash_message($message = 'operación exitosa!', $type = 'success')
{
    $ci = & get_instance();
    $ci->session->set_flashdata([
        'message' => $message,
        'type'    => $type ]);
}

function show_flash_messages()
{
    $ci        = & get_instance();
    $flashdata = $ci->session->flashdata();

    if (!empty($flashdata)) {
        echo '<div class="alert alert-' . $flashdata['type'] . ' alert-dismissible fade show" role="alert">
      ' . $flashdata['message'] . '
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button></div>';
    }
}

function convertir_string_url($string, $separator = '-', $lowercase = TRUE)
{
    $url = url_title(convert_accented_characters(trim($string)), $separator, $lowercase);
    return $url;
}
