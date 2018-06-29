<?php
  require_once '../persistence//dao_pizza.php';
  $daoPizza = new DAOPizza();
  $listaPizzas = $daoPizza-> listarPizzas();
  
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
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

  </head>
  
  <body>
  <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Home</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav">
            <li class="active"><a href="view_pizza.php">Pizzas</a></li>
            <li><a href="view_comanda.php">Comandas</a></li>
            <li><a href="view_funcionario.php">Funcionários</a></li>
            <li> <a href="view_cargo.php">Cargos</a></li>
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
  
  <form action="../controller/incluir_pizza.php" method="post">
    <fieldset>
        <legend>Nova Pizza</legend>
  
        <div class="form-group">
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da Pizza">
        </div>
  
        <div class="form-group">
            <input type="text" class="form-control" id="ingredientes" name="ingredientes" placeholder="Ingredientes">  
        </div>
        
        <div class="form-group">
            <input type="number" min="0" step="any" class="form-control" id="valor" name="valor" placeholder="Valor em reais">  
        </div>

        <div class="form-group">  
            <label>Status</label>
            <select name=status>
              <option value="indisponivel">Insiponivel</option>
              <option value="disponivel">Disponpivel</option>
            </select>
        </div>

        <div class="form-group">  
            <label>Tipo</label>
            <select name=tipo>
              <option value="salgado">Salgado</option>
              <option value="doce">Doce</option>
              <option value="fit">Fit</option>
              <option value="vegetariana">Vegetariana</option>
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
        <h2 class="panel-title">Lista de Pizzas</h2>
    </div><!-- fim .panel-heading -->
    
    <div class="panel-body">  
        <table class="table table-hover">
          <tr>
              <th>Código</th>
              <th>Nome</th>
              <th>Ingredientes</th>
              <th>Valor</th>
              <th>Status</th>
              <th>Tipo</th>
              <th></th>
          </tr>
          <?php
            while ($objetoPizza = array_shift($listaPizzas)) {
          ?>  
            <tr>
              <td class="col-md-1"><?php echo $objetoPizza->getCodigo();?></td>
              <td class="col-md-3"><?php echo $objetoPizza->getNome();?></td>
              <td class="col-md-1"><?php echo $objetoPizza->getIngredientes();?></td>
              <td class="col-md-1"><?php echo "R$ ".$objetoPizza->getValor();?></td>
              <td class="col-md-1"><?php echo $objetoPizza->getStatus();?></td>
              <td class="col-md-1"><?php echo $objetoPizza->getTipo();?></td>
              <td class="col-md-1">
                <a class="btn btn-danger" href="../controller/excluir_pizza.php?codigo=<?= $objetoPizza->getCodigo(); ?>" role="button">Excluir</a>                 
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