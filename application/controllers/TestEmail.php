<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class TestEmail extends CI_Controller {
     
public function index()
    {
      $this->load->library("email") ;

$config = array(

'protocol'=>'smtp' ,
'smtp_host' =>'ssl://smtp.gmail.com',
'smtp_port' =>465,
'smtp_timeout'=>30,
'smtp_user'   =>'ichrak.jerad@gmail.com',
'smtp_pass'    => '01ali @01234501',
'charset'   => 'utf-8',
'newline'    => "\r\n",
'mailtype' => "html"


);
$this->email->initialize($config) ;
      $this->email->set_newline("\r\n") ;

            $this->email->set_crlf("\r\n") ;


      $this->email->to("ichrak.jerad@gmail.com") ;
       $this->email->from("jdichrak@gmail.com") ; 
       $this->email->subject("test email") ;
        $this->email->message("hello this is test email funtion") ;
       if($this->email->send())   {
        echo "Mail send succseffly" ;
       }else {
        echo "sorry enable to send" ;
                print_r($this->email->print_debugger()) ;

        }


    }
      


    }
    