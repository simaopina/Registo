<!doctype html>
<html lang="pt-PT">
   <head>
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
      <style>
         * {
         box-sizing: border-box;
         }
         section {
         margin: 0em auto 0;
         width: 100%;
         max-width: 800px;
         }
         meter {
               
         margin: 1 auto 1em;
         width: 20%;
         height: .5em;

         background: none;
         background-color: rgba(0,0,0,0.1);
         }
         meter::-webkit-meter-bar {
         background: none;
         background-color: rgba(0,0,0,0.1);
         }
         meter[value="0"]::-webkit-meter-optimum-value,
         meter[value="1"]::-webkit-meter-optimum-value { background: red; }
         meter[value="2"]::-webkit-meter-optimum-value { background: orange; }
         meter[value="3"]::-webkit-meter-optimum-value { background: yellow; }
         meter[value="4"]::-webkit-meter-optimum-value { background: green; }
         meter[value="1"]::-moz-meter-bar,
         meter[value="1"]::-moz-meter-bar { background: red; }
         meter[value="2"]::-moz-meter-bar { background: orange; }
         meter[value="3"]::-moz-meter-bar { background: yellow; }
         meter[value="4"]::-moz-meter-bar { background: green; }

         .feedback {
         color: #9ab;
         font-size: 80%;
         padding: 0em;
         font-family: Courgette, cursive;
         margin-top: 0em;
         }

         meter::-webkit-meter-optimum-value {
         transition: width .4s ease-out;
         }
         .error {color: #FF0000;}
         .button {
         background-color: #4CAF50;
         border: none;
         color: white;
         padding: 2px 25px;
         text-align: center;
         font-size: 15px;
         cursor: pointer;
         }
         #myProgress {
         width: 20%;
         background-color: grey;
         }
         #myBar {
         width: 5%;
         height: 10px;
         background-color: red;
         }
         .header {
         overflow: hidden;
         background-color: #b3d1ff;
         padding: 20px 10px;
         }
      </style>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>Registo de utilizador</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>
   <body>
      <div class="header">
         <center>
            <h1>Registo de utilizador</h1>
         </center>
         <div class="header-right">
         </div>
      </div>

<!--************************************************************FORMULÁRIO******************************************************** -->

      <canvas id="myCanvas" width="200" height="50"></canvas>
      <p><span class="error">* Campos obrigatórios</span></p>
      <form  method="post" onSubmit="return checkform()" action="welcome.php">
         Email:  
         <input type="text" name="email" placeholder="Email" autofocus>
         <font color="red">*</font>
         <br>
         <br>
         <label for="password">Password:</label>
         <input type="password" name="password" id="password" placeholder="Password">
         <font color="red">*</font>
         <meter max="4" id="password-strength-meter"></meter>
         <p id="password-strength-text"></p>
         <br>
         Confirmar Password:
         <input type="password" name="confirmarpassword" placeholder="Confirmar Password">
         <font color="red">*</font>  
         <br>
         <br>
         Nome:
         <input type="text" name="nome" placeholder="Nome">
         <font color="red">*</font>
         <input type="text" name="apelido" placeholder="Apelido">
         <font color="red">*</font>
         <br>
         <br>
         Morada:
         <input type="text" name="morada" placeholder="Morada">
         <font color="red">*</font>
         <br>
         <br>
         Código Postal:
         <input type="text" name="codigopostal"  maxlength="4">
         -
         <input type="text" name="codigopostal2"  maxlength="3">
         <input type="text" name="localidade" placeholder="Localidade">
         <br>
         <br>
         País:
         <select id="país" name="país">
         </select>
         <font color="red">*</font>
         <br>
         <br>
         NIF:
         <input type="text" name="nif" placeholder="NIF" maxlength="9">
         <br>
         <br>
         Telefone:
         <input type="text" name="telefone" placeholder="Telefone" maxlength="9">
         <br>
         <br>
         <input type="submit" value="Submeter">
         <br>
         <br>
         <canvas id="myCanvas" width="200" height="323"></canvas>
         <div class="header">
         <div class="header-right">
         
      </form>
      <script type="text/javascript">

     //-----------------------------------------------------JAVASCRIPT DA INTESIDADE DE SEGURANÇA DA PASSWORD-------------------------------------------

         var strength = {
          0: "Muito má",
          1: "Má",
          2: "Fraca",
          3: "Boa",
          4: "Forte"
         }
         
         var password = document.getElementById('password');
         var meter = document.getElementById('password-strength-meter');
         var text = document.getElementById('password-strength-text');
         
         password.addEventListener('input', function()
         {
          var val = password.value;
          var result = zxcvbn(val);
         
          meter.value = result.score;
         
         
          if(val !== "") {
              text.innerHTML = "" + "<strong>" + strength[result.score] + "</strong>" + "<span class='feedback'>" + "</span"; 
          }
          else {
              text.innerHTML = "";
          } 
         });
         
     //----------------------------------------------------------JAVASCRIPT DE ENCHER O DROPDOWN COM O JSON-------------------------------------------

         let dropdown = document.getElementById('país');
         dropdown.length = 0;
         
         let defaultOption = document.createElement('option');
         defaultOption.text = 'Escolhe o país';
         
         dropdown.add(defaultOption);
         dropdown.selectedIndex = 0;
         
         const url = 'https://restcountries.eu/rest/v2/all';
         
         const request = new XMLHttpRequest();
         request.open('GET', url, true);
         
         request.onload = function() {
         if (request.status === 200) {
          const data = JSON.parse(request.responseText);
          let option;
          for (let i = 0; i < data.length; i++) {
            option = document.createElement('option');
            option.text = data[i].name;
            option.value = data[i].alpha3Code;
            dropdown.add(option);
          }
         } else {  
         }   
         } 
         
         request.onerror = function() {
         console.error('Aconteceu um erro a carregar o JSON ' + url);
         }; 
         
         request.send(); 
         
      </script>
   </body>
</html>