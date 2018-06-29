<?php
	require_once '../persistence/dao_funcionario.php';
	require_once '../persistence/dao_cargo.php';
	
	$daoFuncionario = new DAOFuncionario();
	$listaFuncionarios = $daoFuncionario->listarFuncionarios();
	
	$daoCargo = new DAOCargo();
	$listaCargos = $daoCargo->listarCargos();
	
?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>Pizzaria</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>
  
  <body>
 	<nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          	<a class="navbar-brand" href="index.php">Home</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav">
            <li><a href="view_pizza.php">Pizzas</a></li>
            <li><a href="view_comanda.php">Comandas</a></li>
            <li class="active"><a href="view_funcionario.php">Funcionários</a></li>
            <li><a href="view_cargo.php">Cargos</a></li>
            <li><a href="view_rosicleidemaria.php">Rosicleide Maria</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav>
    
<div class="jumbotron" style="background-image:url('pizzaBanner.jpg'); color: #FFFFFF; background-size: 100%;">	
  	<div class="container">   		
		<h1>Pizzaria</h1>
		<h2>Italiana</h2>
	</div>
</div> 


<div class="container">
	
	<form action="../controller/incluir_funcionario.php" method="post">
		<fieldset>
	  		<legend>Novo Funcionário</legend>
	
	  		<div class="form-group">
	    			<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
	  		</div>
	
	  		<div class="form-group">
	    			<input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">  
	  		</div>
	  		
	  		<label>Data Admissão</label>
		  		<div class="form-group">
		    			<input type="date" class="form-control" id="dataAdmissao" name="dataAdmissao">  
		  		</div>
		  		
		  	<div class="form-group">	
	  			<label>Status</label>
			    <select name="status">
					  <option value="Ativo">Ativo</option>
					  <option value="Demitido">Demitido</option>  
					  <option value="Férias">Férias</option>
					  <option value="Licença médica">Licença médica</option>
				</select>
			</div>
			
			<div class="form-group">	
		  			<label>Cargo</label>
				    <select name="codigoCargo">
				    	<?php
				    		while ($objetoCargo = array_shift($listaCargos)) {
				    	?>
						  <option value="<?php echo $objetoCargo->getCodigo(); ?>">  <?php echo $objetoCargo->getNome(); ?>  </option>
						 <?php
						}
						 ?>
					</select>
				</div>
	  
	  		<button type="submit" class="btn btn-primary">
	  				<span class="glyphicon glyphicon-thumbs-up"></span>
	  				Cadastrar
			</button>
		</fieldset>  
	</form> 			
</div> <!-- fim .container 1 --> 

<div class="container">
 	<br /> <br /> 
</div> <!-- fim .container 2 -->
	
	
<div class="container">
  <div class="panel panel-default">
  		<div class="panel-heading">
    		<h2 class="panel-title">Lista de Funcionários</h2>
 	 	</div><!-- fim .panel-heading -->
		
		<div class="panel-body">  
  			<table class="table table-hover">
  				<tr>
  						<th>Código</th>
  						<th>Nome</th>
  						<th>CPF</th>
  						<th>Data Admissão</th>
  						<th>Status</th>
  						<th>Cargo</th>
  						<th></th>
  				</tr>
  				<?php
  					while ($objetoFuncionario = array_shift($listaFuncionarios)) {
  				?>	
    				<tr>
    					<td class="col-md-1"><?php echo $objetoFuncionario->getCodigo(); ?></td>
    					<td class="col-md-3"><?php echo $objetoFuncionario->getNome(); ?></td>
    					<td class="col-md-1"><?php echo $objetoFuncionario->getCpf(); ?></td>
    					<td class="col-md-1"><?php echo date('d/m/Y',  strtotime($objetoFuncionario->getDataAdmissao())); ?></td>
    					<td class="col-md-1"><?php echo $objetoFuncionario->getStatus();?></td>
    					<td class="col-md-1"><?php echo $objetoFuncionario->getCargo()->getNome();?></td>
    					<td class="col-md-1">
    						<a class="btn btn-danger" href="../controller/excluir_funcionario.php?codigo=<?= $objetoFuncionario->getCodigo(); ?>" role="button">Excluir</a>  								
    					</td>
    				</tr>
    			<?php
					}
    			?>
    				
    			</table>
    			
 		</div><!-- fim .panel-body -->
	</div><!-- fim .panel -->
</div><!-- fim .container 3 -->

    </body>
</html>