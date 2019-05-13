<?php
require_once 'Sales.php';
require_once 'Controller.php';
class homeController extends controller {

    public $data = array();

        public function __construct() {
     /*    parent::__construct(); //construtor não está sendo utilizado

        $u = new Users();
        if($u->isLogged() == false) {
            header("Location: ".BASE_URL."/login");
            exit;
        } */
    }

    public function index() {

        $data = array(); //Essa linha n e necessaria

        $s = new Sales();

        $this->data['statuses'] = array(
            '0'=>'Canceladas',
            '1'=>'Receitas',
            '2'=>'Despesas'
        );

        $this->data['revenue'] = $s->getTotalRevenue('2018-05-13 06:30','2018-05-13 10:00'); //receitas no DASHBOARD
        
        $this->data['days_list'] = array();// essa linha n faz nn diferenca

        //dif relacionado ao period1, dif2 ao period2
        // $dif = ( date('i') > 30)? -date('i')-180 : -date('i') - 180;
        $dif = ( date('i') > 30)? -(date('i')-30)-180 : -date('i') - 180;
        $dif2 = ( date('i') > 30)? -(date('i')-30) : -date('i');
        $period1 = date('Y/m/d H:i', strtotime($dif." "."minutes"));
        $period2 = date('Y/m/d H:i', strtotime($dif2." "."minutes"));

        $h=0;
      
        $this->data['days_list'][]=0;
        for($min=$dif;$min<=0;$min +=30){
            /* $this->data['days_list'][] = date('d/m H:i', strtotime("0 days"." "."-".$h." "."hours"." ".$min." "."minutes")); */
            $this->data['days_list'][] = date('Y/m/d H:i', strtotime("0 days"." "."-".$h." "."hours"." ".$min." "."minutes"));
          }

        $this->data['revenue_list'] = $s->getRevenueList($period1, $period2);

        $this->data['expenses_list'] = array(0=> '2015-05-05, 15:00');

        $this->data['status_list'] = $s->getQuantStatusList(date('Y-m-d', strtotime('-30 days')), date('Y-m-d'));

        return $this->data;
    }
 }

 


