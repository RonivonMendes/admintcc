<?php
    require_once 'php/tcc.php';
    require_once 'php/integrante.php';

    if (isset($_GET['id']))
    {
        $tcc = new CadastroTcc("","","","","");
        $consultatcc = $tcc->buscar($_GET['id']);

        #se não encontrar projeto com esse ID, redireciona pata index
        if($consultatcc=="0")
        {
            header('location: index.php');

        }

        $integrante = new Integrante("", "", "", "", "", "", "");
        $consultaOrientador=$integrante->buscar($consultatcc[0]['integrantes_id']);

        #se tiver coorientador, consultar
        if($consultatcc[0]['coorientador_id']!="")
        {
            $consultaCoorientador=$integrante->buscar($consultatcc[0]['coorientador_id']);
        }
    }

    else
        header('location: index.php');

    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
?>
<html>
<head>

<script>
    function myFunction() 
    {
        window.print();
    }

</script>

<style>
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #dcdcdc;
        font-size: 12pt;
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 20mm;
        margin: 10mm auto;
        background: white;
    }
    .subpage {
        padding: 1cm;
        height: 257mm;
    }
    
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
    table {
        width:100%;
        padding: 3px 3px;
        border: 1px solid #ccc;
    }
    header {height: 110px;}

    button{
        background-color: #598c93;
        border: none;
        color: white;
        height: 50px;
    }

    button:hover{
        background-color: #73adb7;
        color: white;
        cursor: pointer;
        transition-duration: 500ms;
    }
</style>
</head>
<body>
<div class="book">
    <div class="page">
        <div class="subpage">
            <header>
                <div><img style="height: 110px; float: left;" src="logo-iftm.jpg"/></div>
                <div style="width: 55%; text-align: center; float: right; padding-top: 35px; font-size: 10pt;">INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DO TRIÂNGULO MINEIRO</div>
            </header>
            <p style="text-align: center;"><strong>FORMALIZAÇÃO DO TCC</strong></p><BR>
            <p>
                1. Título do Projeto de Pesquisa (Projeto de TCC):<br>
                <?php echo $consultatcc[0]['titulo']; ?>
            </p>
            <p>
                2. Linha e/ou Grupo de Pesquisa a que o projeto está vinculado:<br>
                <?php echo $consultatcc[0]['grupoPesquisa']; ?>
            </p>    
            <p>
                3. Estudante:<br>
                Nome: <?php echo $consultatcc[0]['nome']; ?><br>
                Curso: <?php echo $consultatcc[0]['curso']; ?><br>
                Matrícula (RA): <?php echo $consultatcc[0]['ra']; ?><br>
                Telefone: <?php echo $consultatcc[0]['telefone']; ?><br>
                Endereço eletrônico (e-mail): <?php echo $consultatcc[0]['email']; ?><br>
            </p>
            <p>
                4. Orientador:<br>
                Nome: <?php echo $consultaOrientador[0]['nome']; ?><br>
                Titulação: <?php echo $consultaOrientador[0]['titulacao']; ?><br>
                Telefone: <?php echo $consultaOrientador[0]['telefone']; ?><br>
                Endereço eletrônico (e-mail): <?php echo $consultaOrientador[0]['email']; ?><br>
            </p>
             
            <?php if($consultaCoorientador[0]['nome']!="")
            {?>
                <p>
                    5. Coorientador:<br>
                    Nome: <?php echo $consultaCoorientador[0]['nome']; ?><br>
                    Titulação: <?php echo $consultaCoorientador[0]['titulacao']; ?><br>
                    Telefone: <?php echo $consultaCoorientador[0]['telefone']; ?><br>
                    Endereço eletrônico (e-mail): <?php echo $consultaCoorientador[0]['email']; ?><br>
                </p>

            <?php } ?>               
                
        </div>    
    </div>

    <div class="page">
        <div class="subpage">
            <p style="text-align: center;"><strong>RESUMO DO PROJETO DE PESQUISA</strong></p><BR>
            <p>
               Nome: <?php echo $consultatcc[0]['nome']; ?><br>
               Matrícula (RA): <?php echo $consultatcc[0]['ra']; ?><br>
                Professor Orientador: <?php echo $consultaOrientador[0]['nome']; ?><br>
                <?php if($consultaCoorientador[0]['nome']!="")
                {?>
                    Professor Coorientador: <?php echo $consultaCoorientador[0]['nome']; ?><br>
                <?php } ?>
                Curso: <?php echo $consultatcc[0]['curso']; ?><br>
                Área de Concentração: <br>
            </p>
            <hr>
            <p style="text-align: center;"><strong>RESUMO</strong></p><BR>
                <?php echo $consultatcc[0]['resumo']; ?>
            <BR>
            <BR>
            <BR>
            Data: <?php echo strftime('%d de %B de %Y', strtotime('today')); ?><br><br>
            Assinatura:<br>
        </div>    
    </div>            
</div>
<button  style="margin-left: 46.5%" onclick="myFunction()">Imprimir Documento</button>
<br><br>
</body>
</html>