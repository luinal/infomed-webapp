<!doctype html>
<html lang="pt-br">
	<head>
		<title>Infomed - Buscar médico</title>
		<meta charset="utf-8">


        <style>
            body{
                font-family: Arail, sans-serif;
            }
            /* Formatting search box */
            .search-box{
                width: 300px;
                position: relative;
                display: inline-block;
                font-size: 14px;
            }
            .search-box input[type="text"]{
                height: 32px;
                padding: 5px 10px;
                border: 1px solid #CCCCCC;
                font-size: 14px;
            }
            .result{
                position: absolute;        
                z-index: 999;
                top: 100%;
                left: 0;
            }
            .search-box input[type="text"], .result{
                width: 100%;
                box-sizing: border-box;
            }
            /* Formatting result items */
            .result p{
                margin: 0;
                padding: 7px 10px;
                border: 1px solid #CCCCCC;
                border-top: none;
                cursor: pointer;
            }
            .result p:hover{
                background: #f2f2f2;
            }
        </style>

		<link rel="stylesheet" type="text/css" href="../../css/estilo.css">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
        $(document).ready(function(){
            $('.search-box input[type="text"]').on("keyup input", function(){
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if(inputVal.length){
                    $.get("backend-search.php", {term: inputVal}).done(function(data){
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else{
                    resultDropdown.empty();
                }
         });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

    <body id="tela_de_consulta">
        <a href="../../index.html" id="back-button">Voltar</a>

        <div  id="container">
            <div id="logo">
                <h1>Info<span id="title-span">med</span></h1>       
            </div>
            <h2>Pesquisar</h2>
            <h3>mudou algo?</h3>
            <form action="_buscar.php" method"GET">
                <input type="text" name="digito_busca" size="50" placeholder="Digite aqui">
                <button style="width:100px";>Buscar</button>
            </form>
         <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search country..." />
        <div class="result"></div>
    </div>
        </div>

	</body>

</html>
