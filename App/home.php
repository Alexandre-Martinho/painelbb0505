<?php 
	require_once 'homeController.php';
	$r = new homeController();
	$r->index();
	$vl = $r->data;
/* 	echo '<pre>';
	print_r($vl);
	echo '</pre>';
	exit; */
	extract($vl);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="./assets/css/template.css">
	<title>Document</title>
</head>
<body>
	
	<div class="db-row row1"> <!-- db means dashboard   -->
		<div class="grid-1">
			<div class="db-grid-area">
				<div class="db-grid-area-count"><?php //echo $products_sold; ?></div>
				<div class="db-grid-area-legend">Produtos Vendidos</div>
			</div>
		</div>
	
		<div class="grid-1">
			<div class="db-grid-area">
				<!--$revenue vem do extract($data) em homeController.php, data['revenue'] se tranforma em $revenue -->
				<div class="db-grid-area-count">R$ <?php echo number_format($revenue, 2); ?></div>
				<div class="db-grid-area-legend">Receitas</div>
			</div>
		</div>
	
		<div class="grid-1">
			<div class="db-grid-area">
				<div class="db-grid-area-count">R$ <?php echo number_format($expenses, 2); ?></div>
				<div class="db-grid-area-legend">Despesas</div>
			</div>
		</div>
	
	</div>
	
	<div class="db-row row2">
		<div class="grid-2">
			<div class="db-info">
				<div class="db-info-title">Receitas e Despesas nos últimos 30 dias</div>
				<div class="db-info-body" style="height:300px">
					<canvas id="rel1"></canvas>
				</div>
			</div>
		</div>
	
		<div class="grid-1">
			<div class="db-info">
				<div class="db-info-title">Status de Pgto.</div>
				<div class="db-info-body" style="height:300px">
					<canvas id="rel2" height="300"></canvas>
				</div>
			</div>
		</div>
	</div>
	
		<script type="text/javascript">
		var days_list = <?php echo json_encode($days_list); ?>;
		var revenue_list = <?php echo json_encode(array_values($revenue_list)); ?>;
		var expenses_list = <?php echo json_encode(array_values($expenses_list)); ?>;
		var status_name_list = <?php echo json_encode(array_values($statuses)); ?>;
		var status_list = <?php echo json_encode(array_values($status_list)); ?>;
		</script>
	
		<!-- <script type="text/javascript" src="<?php// echo BASE_URL; ?>/App/assets/js/Chart.min.js"></script> -->
		<script type="text/javascript" src="http://localhost/painelbb0505/App/assets/js/Chart.min.js"></script>
		<!-- <script type="text/javascript" src="<?php// echo BASE_URL; ?>/App/assets/js/script_home.js"></script> -->
		<script type="text/javascript" src="http://localhost/painelbb0505/App/assets/js/script_home.js"></script>
</body>
</html>
