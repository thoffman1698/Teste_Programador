<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Teste </title>
    <link rel="icon" type="image/png" sizes="16x16" href="https://www.uplexis.com.br/wp-content/themes/uplexis/vendor/favicon/favicon-16x16.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
      function formatar_mascara(src, mascara) {
        var campo = src.value.length;
        var saida = mascara.substring(0,1);
        var texto = mascara.substring(campo);
        if(texto.substring(0,1) != saida) {
          src.value += texto.substring(0,1);
        }
      }
    </script>

    <?php

    /**
    * Função para importar os feeds de um site
    * @author Rafael Wendel Pinheiro
    * @param  String $url A URL completa da página de feeds
    * @return Array $itens Um array com informações do site onde os feeds foram buscados e de suas notícias/posts
    */
    function get_feeds($url){
        $content = simplexml_load_file($url);

        if(!isset($content->channel)){
            die('Conteúdo rss não é válido');
        }

        $itens = $content->channel;

        return $itens;
    }
    ?>
  
  </head>
  <body class="nav-md">