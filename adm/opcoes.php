<html> 
    <head> 
        <title>Sistema Cadastro de Produtos</title> 
    </head> 
    <body> 
        <a href="logout.php">Logout</a><p> Autenticação de Usuários<br>

<? //VERIFICA SE A SESSÃO ESTÁ ATIVA include"verifica.php"; ?>  

<form action="<?php echo $_SERVER["PHP_SELF"];  ?>" method="post"> <select name="opcao"> 

<option value="incluir">   Incluir Produto</option>

<option value="alterar">  Alterar Produto</option> 

<option value="excluir"> Excluir Produto </option> 

<option value="listar">  Listar Produtos</option> </select> 

<input type="submit" value="OK"/><br> 
</form>  

<?php session_start();  //echo "Usuário logado no sistema: ".$_SESSION["nome"];  

if(isset($_POST['opcao'])){   $op=$_POST['opcao'];        
  if($op=="incluir")Header("Location: incluir.php");        
    else if($op=="alterar")Header("Location: alterar.php");          
    else if($op=="excluir")Header("Location: excluir.php");                
    else if($op=="listar")Header("Location: listar.php"); }   ?> 

</body> 

</html> 