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
        border-radius: 5px;
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
            <p style="text-align: center;"><strong>TERMO DE RESPONSABILIDADE DE AUTORIA</strong></p><BR>
            <p>
                Eu, <?php echo $consultatcc[0]['nome']; ?> , matrícula <?php echo $consultatcc[0]['ra']; ?>, estudante do curso <?php echo $consultatcc[0]['curso']; ?>, estou ciente de que é considerada utilização indevida, ilegal e/ou plágio, os seguintes casos:
            </p>
            <p>
                <ul>
                    <li>Texto de autoria de terceiros;</li>
                    <li>Texto adaptado em parte ou totalmente;</li>
                    <li>Texto produzido por terceiros, sob encomenda, mediante pagamento (ou não) de honorários profissionais.</li>
                </ul>
            </p>    
            <p>
               Logo, declaro ser de minha inteira responsabilidade a autoria do texto referente ao Trabalho
de Conclusão de Curso sob o título . 
            </p>
            <BR>
            <BR>
            <BR>
            <p>Ituiutaba, <?php echo strftime('%d de %B de %Y', strtotime('today')); ?>.</p>
            <BR>
            <BR>            
            <p style="text-align: center;">
                ________________________________<br>
                <?php echo $consultatcc[0]['nome']; ?>
            </p>
        </div>    
    </div>
</div>
</body>
</html>