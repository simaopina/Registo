<head>
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script> 

   <style type="text/css">.button {
      background-color: #4CAF50;
      border: black;
      border-radius: 5px;
      color: white;
      padding: 4px 25px;
      text-align: center;
      font-size: 20px;
      cursor: pointer;
      }
   </style>
</head>
<?php
    //------------------------------------------------------CONEXÃO À BASE DE DADOS-------------------------------------------
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "test";
   
   
   $conn = new mysqli("localhost", "root", "", "test");
    
   
   if($conn->connect_error){
       die("ERROR: Could not connect. " . $conn->connect_error);
   }
    
     $nemail = $_REQUEST['email'];
   
   $sql ="SELECT * FROM user WHERE Email='$nemail'";
   $row = mysqli_query($conn, $sql);
    

    //------------------------------------------------------PASSAR CAMPOS PARA VARIAVEIS---------------------------------------

   $email = $_REQUEST['email'];
   $password = $_REQUEST['password'];
   $nome = $_REQUEST['nome'];
   $apelido =  $_REQUEST['apelido'];
   $morada =  $_REQUEST['morada'];
   $codigopostal =  $_REQUEST['codigopostal'];
   $codigopostal2 =  $_REQUEST['codigopostal2'];
   $localidade =  $_REQUEST['localidade'];
   $país =  $_REQUEST['país'];
   $nif = $_REQUEST['nif'];
   $telefone = $_REQUEST['telefone'];
   
   function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
   }
   
   //------------------------------------------------------VALIDAÇÕES-------------------------------------------------------
   if (empty($_POST["email"])) {
       echo "<center><h1>Email é obrigatório</center></h1>";
     } else {
       $email = test_input($_POST["email"]);
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         echo "<center><h1>Formato de email invalido</center></h1>"; 
       }
    else {
   	if (empty($_POST["password"])) {
       echo "<center><h1>Password é obrigatório</center></h1>";
     } else {
       $password = test_input($_POST["password"]);
       if (!preg_match("/^[a-zA-Z0-9 ]*$/",$password)) {
         echo "<center><h1>Apenas letras e números permitidos na password</center></h1>"; 
       }
    else{
   	if (empty($_POST["confirmarpassword"])) {
       echo "<center><h1>Confirmar a password é obrigatório</center></h1>";
     } else {
       $confirmarpassword = test_input($_POST["confirmarpassword"]);
       if (!preg_match("/^[a-zA-Z0-9 ]*$/",$password)) {
         echo "<center><h1>Apenas letras e números permitidos em confirmarpassword</center></h1>"; 
       } else {
         if($password != $confirmarpassword){
           echo "<center><h1>Passwords não são iguais</center></h1>";
         }
       
    else{
   	if (empty($_POST["nome"])) {
       echo "<center><h1>Nome é obrigatório</center></h1>";
     } else {
       $nome = test_input($_POST["nome"]);
       if (!preg_match("/^[a-zA-Z]*$/",$nome)) {
         echo "<center><h1>Apenas letras são permitidas no nome</center></h1>"; 
       }
       
      else{
     	if (empty($_POST["apelido"])) {
       echo "<center><h1>Apelido é obrigatório</center></h1>"; }
      else {
       $apelido = test_input($_POST["apelido"]);
       if (!preg_match("/^[a-zA-Z]*$/",$apelido)) {
         echo "<center><h1>Apenas letras são permitidas no apelido</center></h1>"; 
       }
      else{
   
     	if($país == "Portugal" and empty($_POST["codigopostal"])) 
     	{
       echo "<center><h1>Codigo Postal é obrigatório (quando país selecionado é Portugal)</center></h1>"; }
   
      else {
       $codigopostal = test_input($_POST["codigopostal"]);
       if (!preg_match("/^[0-9 ]*$/",$codigopostal)) {
         echo "<center><h1>Apenas números são permitidos no codigo postal</center></h1>";
         } else {
   
         	if($país == "Portugal" and empty($_POST["codigopostal2"])) 
     	{
       echo "<center><h1>Codigo Postal é obrigatório (quando país selecionado é Portugal)</center></h1>"; }
       else {
       $codigopostal = test_input($_POST["codigopostal"]);
       if (!preg_match("/^[0-9 ]*$/",$codigopostal)) {
         echo "<center><h1>Apenas números são permitidos no codigo postal</center></h1>";
         } else {
   
   
   
         if($país == "Portugal" and empty($_POST["localidade"]))
         {
       echo "<center><h1>Localidade é obrigatório (quando país selecionado é Portugal)</center></h1>"; 
   }
      else {
       $localidade = test_input($_POST["localidade"]);
       if (!preg_match("/^[a-zA-Z ]*$/",$localidade)) {
         echo "<center><h1>Apenas letras são permitidos na localidade</center></h1>";
         }
   
           else {
     	if($país == "Portugal" and empty($_POST["nif"])){
       
       echo "<center><h1>NIF é obrigatório (quando país selecionado é Portugal)</center></h1>";
   }
      else {
       $nif = test_input($_POST["nif"]);
       if (!preg_match("/^[0-9 ]*$/",$nif)) {
         echo "<center><h1>Apenas números são permitidos no NIF</center></h1>";
         }
       
   
      else {
     	if($país == "Portugal" and empty($_POST["telefone"])) 
     	{
       echo "<center><h1>Telefone é obrigatório (quando país selecionado é Portugal)</center></h1>"; 
   }
      else {
   
        $telefone = test_input($_POST["telefone"]);
       if (!preg_match("/^[0-9 ]*$/",$telefone)) {
         echo "<center><h1>Apenas números são permitidos no Telefone</center></h1>";
         }
       
      else {
      	
     	if (empty($_POST["morada"])) {
      echo "<center><h1>Morada é obrigatório</center></h1>";
     } else {
       $morada = test_input($_POST["morada"]);
       if (!preg_match("/^[a-zA-Z ]*$/",$morada)) {
          echo "<center><h1>Apenas letras são permitidas na morada</center></h1>"; 
       } else {
   
       	if(mysqli_num_rows($row) > 0){
    echo "<center><h1>Email ja esta a ser utilizado</center></h1>";
   } else {

     if (substr($telefone, 0, 3) === '241' || substr($telefone, 0, 3) === '295' || substr($telefone, 0, 3) === '235' || substr($telefone, 0, 3) === '234' || substr($telefone, 0, 3) === '284' || substr($telefone, 0, 3) === '253' || substr($telefone, 0, 3) === '273' || substr($telefone, 0, 3) === '262' || substr($telefone, 0, 3) === '272' || substr($telefone, 0, 3) === '286' || substr($telefone, 0, 3) === '276' || substr($telefone, 0, 3) === '239' || substr($telefone, 0, 3) === '275' || substr($telefone, 0, 3) === '268' || substr($telefone, 0, 3) === '266' || substr($telefone, 0, 3) === '289' || substr($telefone, 0, 3) === '233' || substr($telefone, 0, 3) === '291' || substr($telefone, 0, 3) === '271' || substr($telefone, 0, 3) === '292' || substr($telefone, 0, 3) === '288' || substr($telefone, 0, 3) === '244' || substr($telefone, 0, 2) === '21' || substr($telefone, 0, 3) === '231' || substr($telefone, 0, 3) === '278' || substr($telefone, 0, 3) === '279' || substr($telefone, 0, 3) === '285' || substr($telefone, 0, 3) === '283' || substr($telefone, 0, 3) === '255' || substr($telefone, 0, 3) === '254' || substr($telefone, 0, 3) === '236' || substr($telefone, 0, 3) === '296' || substr($telefone, 0, 3) === '242' || substr($telefone, 0, 3) === '245' || substr($telefone, 0, 3) === '282' || substr($telefone, 0, 2) === '22' || substr($telefone, 0, 3) === '274' || substr($telefone, 0, 3) === '256' || substr($telefone, 0, 3) === '243' || substr($telefone, 0, 3) === '269' || substr($telefone, 0, 3) === '238' || substr($telefone, 0, 3) === '265' || substr($telefone, 0, 3) === '281' || substr($telefone, 0, 3) === '249' || substr($telefone, 0, 3) === '261' || substr($telefone, 0, 3) === '251' || substr($telefone, 0, 3) === '258' || substr($telefone, 0, 3) === '263' || substr($telefone, 0, 3) === '252' || substr($telefone, 0, 3) === '259' || substr($telefone, 0, 3) === '232' || substr($telefone, 0, 2) === '91' || substr($telefone, 0, 3) === '921' || substr($telefone, 0, 2) === '96' || substr($telefone, 0, 3) === '924' || substr($telefone, 0, 3) === '925' || substr($telefone, 0, 3) === '929' || substr($telefone, 0, 2) === '93' || substr($telefone, 0, 3) === '922') { 

   //------------------------------------------------------------------------INSERIR DADOS NA BASE DE DADOS----------------------------------------------------------------
 
   $sql = "INSERT INTO user (Email, Password, Nome, Apelido, Morada, Codigo_Postal, Codigo_Postal2, Localidade, Pais, NIF, Telefone) VALUES ('$email', '$password', '$nome', '$apelido', '$morada', '$codigopostal', '$codigopostal2', '$localidade', '$país', '$nif', '$telefone')";


   //-----------------------------------------------------------------------CONFIRMAÇÃO DE DADOS INSERIDOS-----------------------------------------------------------------

   if ($conn->query($sql) === TRUE) {
       echo "<center>";
       echo "<h1>";
       echo "<strong>";
       echo "Conta criada com sucesso";
       echo "</h1>";
       echo "</strong>";
       echo "<br>";
       echo "<br>";
       echo "Email: ";
       echo $email;
       echo "<br>";
       echo "Nome: ";
       echo $nome;
   	   echo " ";
   	   echo $apelido;
   	   echo "<br>";
   	   echo "Codigo Postal: ";
   	   echo $codigopostal;
   	   echo "-";
   	   echo $codigopostal2;
   	   echo "<br>";
   	   echo "Localidade: ";
   	   echo $localidade;
   	   echo "<br>";
   	   echo "País: ";
   	   echo $país;
   	   echo "<br>";
   	   echo "NIF: ";
   	   echo $nif;
   	   echo "<br>";
   	   echo "Telefone: ";
   	   echo $telefone;
   	   echo "</center>";
   } else {
       echo "Erro: " . $sql . "<br>" . $conn->error;
   }
   
   }
   else{
   	echo "<center><h1>Número de telemovel/telefone inválido!</h1></center>";
   }
}}}}}}}}}}}}}}}}}}}}}}}} 
   
   
   
   
   $conn->close();
   ?>

<br>
<br>
<CENTER>
   <a href="Registo 2.0.php"><button type="button" class="button">Voltar</button></a>
</CENTER>