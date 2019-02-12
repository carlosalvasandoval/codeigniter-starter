<?php

class MY_Loader extends CI_Loader {

  public function __construct()
  {
    parent::__construct();
  }

  public function template($template_name, $vars = array(), $include_header = true, $include_footer = true, $return = FALSE)
  {
    if ($return)
    {
      $content = $include_header ? $this->view('header', $vars, $return) : '';
      $content .= $this->view($template_name, $vars, $return);
      $content .= $include_footer ? $this->view('footer', $vars, $return) : '';

      return $content;
    }
    else
    {
      $include_header ? $this->view('header', $vars) : '';
      $this->view($template_name, $vars);
      $include_footer ? $this->view('footer', $vars) : '';
    }
  }

}
