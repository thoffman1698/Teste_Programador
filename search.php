<?php
include 'assets/includes/header.php';

    include 'sidebar.php';

    require_once 'assets/includes/conexao.php';

    $Search = trim(addslashes($_GET["search"]));

    $consulta = "SELECT * FROM tbl_artigos WHERE Artigo LIKE '%" . $Search . "%'";
    $resultado = mysqli_query($ligacao,$consulta) or die(mysqli_error($ligacao));
    $row = mysqli_fetch_assoc($resultado);

    // Associative array
    $CodiArtigo = $row['CodiArtigos'];
    $Link = $row["Link"];
    $Artigo = $row["Artigo"];

    $itens = get_feeds('https://www.uplexis.com.br/blog/feed/');
    
    ?>

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12" id="blog">
                   
               <?php 

                    if ($resultado==true AND $resultado!=""){
                        echo '<h2><strong>Você pesquisou por: ' . $Search . '</strong></h2>'; 
                        
                        // Consulta existência de usuario
                        foreach ($itens->item as $item): 
                            $Titulo_artigo = $item->title;
                            $Link_artigo = $item->link;
                                
                            if (isset($item)){ // Se houver notícia desejada
                                $insere = "INSERT INTO tbl_artigos(Artigo, Link) VALUES (' $Titulo_artigo ', '$Link_artigo')";
                                mysqli_query($ligacao,$insere) or die(mysqli_error($ligacao));
                            }
                            else{ // Se não houver notícia desejada
                                echo '<h3>Nada encontrado</h3>';
                            }
                        endforeach;
                    ?>

                    <div class="row">
                        <div class=" col-10 offset-1">
                            <table class="table table-dark">
                                <thead>
                                    <tr align="center">
                                        <th scope="col">#</th>
                                        <th scope="col">Título</th>
                                        <th scope="col">Link</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr align="center">
                                        <th scope="row"><?php echo $CodiArtigo; ?></th>
                                        <td><?php echo $Artigo; ?></td>
                                        <td><a href="<?php echo $Link; ?>"><?php echo $Link; ?></a></td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>

                        <?php
                    }
                    else{
                        echo '<h2><strong> Nada encontrado. </strong></h2>';
                    }
                ?>

                </div>
            </div>
        </div>
    </section>

<?php

include 'assets/includes/footer.php';

?>