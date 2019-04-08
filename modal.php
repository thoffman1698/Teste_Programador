

<section>
    <div class="container-fluid" id="captura">
        <div class="row justify-content-center">
            <div class="col-4 col-offset-4" align="center">
            <button class="open_Modal" onclick="open_Search()">Click para pesquisar</button>
        </div>

        <div id="myOverlay" class="overlay">
            <span class="closebtn" onclick="close_Search()" title="Fechar Modal">X</span>
            <div class="overlay-content">
                <form method="GET" action="search.php">
                    <input type="text" autofocus placeholder="S e a r c h . . ." name="search">
                    <button class="tbn tbn-primary" type="submit">Capturar</button>
                </form>
            </div>
        </div>
    </div>
</section>