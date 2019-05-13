<?php
class Core {

	public function run() {
// ex. usuario digitou: localhost/painel_bb/compra/celular/samsung/j7/
// $_SERVER['PHP_SELF']	retorna /painel_bb/index.php/compra/celular/samsung/j7/	  o index.php é devido ao .htaccess
	/*	echo '$_SERVER[\'PHP_SELF\'] vale:'.'<br>';
		print_r($_SERVER['PHP_SELF']);
		echo '<br>';
		echo '<br>';   */
        $url = explode('index.php', $_SERVER['PHP_SELF']); // transforma uma string em Array ( [0] => /painel_bb/ [1] => /compra/celular/samsung/j7/ ) 

  /*      echo 'explode(\'index.php\'),$_SERVER[\'PHP_SELF\']) vale: '.'<br>';
        print_r($url);
        echo '<br>';
        echo '<br>';   */


        $url = end($url); // vale: /compra/celular/samsung/j7/ 
    /*    echo 'end($url) vale: '.'<br>';
		print_r($url);
        echo '<br>';
        echo '<br>';   */


        
		$params = array();
		if(!empty($url) && $url != '/') {
			$url = explode('/', $url); //  Array ( 0=> null 1=>compra 2=>celular 3=>samsung 4=> j7  5=> null)
	/*	echo 'explode (\'/\', $url) vale: '.'<br>';
		echo '<pre>';
		print_r($url);
		echo '</pre>';
        echo '<br>';     */

		array_shift($url); // remove o 1º indice: Array ( 0=> compra 1=>celular 2=>samsung 3=>j7 4=> null)
	/*	
        echo 'array_shift($url) vale: '.'<br>';
		echo '<pre>';
		print_r($url);
		echo '</pre>';  */

			$currentController = $url[0].'Controller'; // retorna compra
		/*	echo 'Current controler: '.'<br>';
			print_r($currentController);
			echo '<br>';  */

			array_shift($url);  // remove o 1º indice, Array (0=> celular 1=>sansung 2=> j7)

	/* 	echo '<pre>';
		print_r($url);
		echo '</pre>';
		echo '<br>'; 
		exit(); */

				if(isset($url[0])) {
					$currentAction = $url[0]; // a action é : celular
				/*	echo 'A action vale :'.'<br>';
					print_r($url[0]);
					echo '<br>';     */
					array_shift($url);
				} else {
					$currentAction = 'index';
				}

				if(count($url) > 0) {
					$params = $url;   // params vale: samsung, j7
			/*		echo '$params vale: '.'<br>';
					print_r($url);
					exit;     */
				}

		} else {
			$currentController = 'homeController';
			$currentAction = 'index';
		}

		$c = new $currentController();
		call_user_func_array(array($c, $currentAction), $params);

	}

}