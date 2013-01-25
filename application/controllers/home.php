<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        $lv[0] = $this->uri->segment(1, 0);
        $lv[1] = $this->uri->segment(2, 0);
        $lv[2] = $this->uri->segment(3, 0);
        $lv[3] = $this->uri->segment(4, 0);
        $lv[4] = $this->uri->segment(5, 0);
        $lv[5] = $this->uri->segment(6, 0);
        $lv[6] = $this->uri->segment(7, 0);
        $lv[7] = $this->uri->segment(8, 0);

        $content['breadcrumb'] = array();
        $content['title'] = '';
        $content['template'] = false;
        $content['template_file'] = '';

        foreach ($lv as $lev) {
            if ($lev != '0') {
                if (is_file('./application/views/' . $lev . '.php')) {
                    $content['template'] = true;
                    $content['template_file'] = $lev;
                } else {
                    if($content['template_file'] != '') {
                        break;
                    }                    
                }
            }
        }
        
        if ($content['template'] === false) {
            $content['template_file'] = 'home';
        }
        $content['content'] = $this->load->view($content['template_file'], $content, true);
        $this->load->view('body', $content);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */