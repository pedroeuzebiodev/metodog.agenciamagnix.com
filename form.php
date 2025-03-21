<?php

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $voce_e = htmlspecialchars($_POST['voce-e']);
    $seguimento = htmlspecialchars($_POST['qual-e-o-seguimento-do-seu-negocio']);
    $faturamento = htmlspecialchars($_POST['qual-e-o-faturamento-do-seu-negocio']);
    $desafio = htmlspecialchars($_POST['qual-e-o-seu-maior-desafio-no-momento']);
    
    $para = "comercial@metodog.agenciamagnix.com";
    $assunto = "Novo contato do formulário do site";
      
    $mensagem_html = "
      <html>
        <head>
          <title>Novo contato do site</title>
          <style>
            body { 
              font-family: Arial, sans-serif; 
            }

            table { 
              border-collapse: 
              collapse; width: 100%; 
            }
            
            th, td { 
              padding: 8px; 
              text-align: left; 
              border-bottom: 1px solid #ddd;
            }

            th { 
              background-color: #f2f2f2; 
            }
          </style>
        </head>
      <body>
        <h2>Novo contato recebido</h2>

        <table>
          <tr>
            <th>Nome</th>
            <td>$nome</td>
          </tr>

          <tr>
            <th>E-mail</th>
            <td>$email</td>
          </tr>

          <tr>
            <th>Telefone</th>
            <td>$telefone</td>
          </tr>

          <tr>
            <th>Perfil</th>
            <td>$voce_e</td>
          </tr>

          <tr>
            <th>Seguimento do negócio</th>
            <td>$seguimento</td>
          </tr>

          <tr>
            <th>Faturamento</th>
            <td>$faturamento</td>
          </tr>

          <tr>
            <th>Maior desafio</th>
            <td>$desafio</td>
          </tr>
        </table>
      </body>
      </html>
    ";
      
    $mensagem_texto = "Novo contato recebido:\n\n";
    $mensagem_texto .= "Nome: " . $nome . "\n";
    $mensagem_texto .= "E-mail: " . $email . "\n";
    $mensagem_texto .= "Telefone: " . $telefone . "\n";
    $mensagem_texto .= "Perfil: " . $voce_e . "\n";
    $mensagem_texto .= "Seguimento do negócio: " . $seguimento . "\n";
    $mensagem_texto .= "Faturamento: " . $faturamento . "\n";
    $mensagem_texto .= "Maior desafio: " . $desafio . "\n";
      
    $cabecalhos = "MIME-Version: 1.0\r\n";
    $cabecalhos .= "Content-type: text/html; charset=UTF-8\r\n";
    $cabecalhos .= "From: $nome <$email>\r\n";
    $cabecalhos .= "Reply-To: $email\r\n";
      
    if (mail($para, $assunto, $mensagem_html, $cabecalhos)) {
      header("Location: sucesso.php");
      exit;
    } else {
      echo "Ocorreu um erro ao enviar o formulário. Por favor, tente novamente.";
    }
  }

?>
