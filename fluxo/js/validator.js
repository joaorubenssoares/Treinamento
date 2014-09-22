//function validaCampo(){
					document.getElementById("salvar").onclick = function () 
					{
						var nome = document.getElementById("NmUsuario").value;			
						if(nome.length <= 3)
						{ 
							document.getElementById("erron").innerHTML="<font class='alert-danger'> O nome dever ter mais de 3 caracteres</font>";
							//window.alert("Este campo é obrigatório!");
							return false;
						}
						else 
						{
							document.getElementById("erron").innerHTML="";
						};
						var email = document.getElementById("DsEmail").value;			
						if(email.length <= 10)
						{ 
							document.getElementById("erroe").innerHTML="<font class='alert-danger'>Digite um email válido</font>";
							//window.alert("Este campo é obrigatório!");
							return false;
						}
						else 
						{
							document.getElementById("erroe").innerHTML=""; 
						};
						var senha = document.getElementById("DsSenha").value;			
						if(senha.length < 8)
						{ 
							document.getElementById("erros").innerHTML="<font class='alert-danger'>A senha dever ter 8 caracter</font>";
							//window.alert("Este campo é obrigatório!");
							return false;
						}
						else 
						{
							document.getElementById("erros").innerHTML="";
							//
						};
						var senha = document.getElementById("DsSenha").value;
						var confSenha = document.getElementById("ConfSenha").value;		
						if(confSenha != senha)
						{ 
							document.getElementById("errocs").innerHTML="<font class='alert-danger'>A senha é diferente da confirmação</font>";
							//window.alert("Este campo é obrigatório!");
							return false;
						}
						else 
						{
							document.getElementById("errocs").innerHTML="";
							
						};
						document.getElementById("formCadUser").submit();   
					};
					//};