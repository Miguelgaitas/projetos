<?php

 
$fich_mail = $escreve = $escreve2 = $escreve3  =$de = $mensagem = "teste"; 

$nameErr = $emailErr = $genderErr = $websiteErr = ""; 
$name = $email = $gender = $comment = $website = ""; 

$fich_mail=fopen('mensagens.txt','a');  

$escreve=fwrite($fich_mail,$de."\t");  

$escreve2=fwrite($fich_mail,$email."\t");  

$escreve3=fwrite($fich_mail,$mensagem."\n");  

fclose($fich_mail);  

 

if($de) {  

 

if(validaEMAIL($email)==1) {  

 

if($mensagem) {  

    echo 'e-mail enviado com sucesso. Aguarde resposta dos nossos serviços!';     

    echo '<br>'; 

    echo '<a href=Form_email.html>'.'Enviar novo e-mail...';      

}   

else {  

    echo '.... Falta mensagem do e-mail.... !';    

    echo '<a href=Form_email.html>'.'Voltar...';   

} 

} else {  

    echo 'Endereço de e-mail falta ou está incorreto... !';   

    echo '<a href=Form_email.html>'.'Voltar...';   

}  

} else {  

    echo 'Falta remetente... !';   

    echo '<a href=Form_email.html>'.'Voltar...';  

echo '<a href="Form_email.html">Voltar</a>'  ;

}  




?>  

 