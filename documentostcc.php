<!DOCTYPE HTML>
<html>
<head>
<title>Documentos TCC</title>
<meta charset="utf-8">


<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />


<!-- font-awesome  icons CSS-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->

 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts-->
 
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">


<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            font-family: 'Arial';
        }
        .nav_tabs{
            width: 600px;
            height: 400px;
            margin: auto;
            background-color: #fff;
            position: relative;
        }
        .nav_tabs ul{
            list-style: none;
        }
        .nav_tabs ul li{
            float: left;
        }
        .nav_tabs label{
            width: 300px;
            padding: 25px;
            background-color: #4b7884;
            display: block;
            color: #fff;
            cursor: pointer;
            text-align: center;
        }
        .rd_tabs:checked ~ label{
            background-color: #e54e43;
        }
        .rd_tabs{
            display: none;
        }
        .content{
            background-color: #fff;
            display: none;
            position: absolute;
            height: 320px;
            width: 600px;
            left: 0;
        }
        .rd_tabs:checked ~ .content{
            display: block;
        }
        #tabela1, #tabela2{
            width: 100%;
            border: 2px solid #629aa9;      
        }
        td{
            border: 1px solid #629aa9; 
            padding: 10px;
        }
    </style>
    
    </head> 
<body>

<div id="page-wrapper" style="padding-top: 5%;">
			
			

			<div class="main-page login-page" style="width: 90%"> 
				
				<h2 class="title1" style="text-align: center; font-weight: bold;">Gerenciamento de documentos</h2>
				<div class="widget-shadow">					
					<form action="" method="post" class="form-horizontal">	
                        <br>
						<nav class="nav_tabs">
							<ul>
								<li>
									<input id="tab1" type="radio" name="tabs" class="rd_tabs">
									<label for="tab1">Certificados</label>
									<div class="content">
										<table id="tabela1">
											<tr>
												<td id="td1">Certificado 1<a id="link1" href="https://drive.google.com/open?id=0B0lb_UPr0dB_S1pkNmNiSTJLZU0" target="blank">
                                            <img src="icon.png" alt="=Download Button"></a></td>
											</tr>
											<tr>
												<td id="td2">Certificado 2<a id="link2" href="https://drive.google.com/open?id=0B0lb_UPr0dB_S1pkNmNiSTJLZU0" target="blank">
                                            <img src="icon.png" alt="=Download Button"></a></td>
											</tr>
											<tr>
												<td id="td3">Certificado 3<a id="link3" href="https://drive.google.com/open?id=0B0lb_UPr0dB_S1pkNmNiSTJLZU0" target="blank">
                                            <img src="icon.png" alt="=Download Button"></a></td>
											</tr>																						
										</table>
									</div>
								</li>
								<li>
									<input id="tab2" type="radio" name="tabs" class="rd_tabs">
									<label for="tab2">Documentos</label>
									<div class="content">
                                        <table id="tabela2">
                                            <tr>
                                                <td id="td4">Documento 1<a id="link4" href="https://drive.google.com/open?id=0B0lb_UPr0dB_S1pkNmNiSTJLZU0" target="blank">
                                            <img src="icon.png" alt="=Download Button"></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="td5">Documento 2<a id="link4" href="https://drive.google.com/open?id=0B0lb_UPr0dB_S1pkNmNiSTJLZU0" target="blank">
                                            <img src="icon.png" alt="=Download Button"></a></td>
                                            </tr>
                                            <tr>
                                                <td id="td6">Documento 3<a id="link5" href="https://drive.google.com/open?id=0B0lb_UPr0dB_S1pkNmNiSTJLZU0" target="blank">
                                            <img src="icon.png" alt="=Download Button"></a></td>
                                            </tr>                                                                                       
                                        </table>                           
                                    </div>
								</li>								
							</ul>
						</nav>


						</form>	
			<br><br><br><br><br><br><br>


	</div>

		<!--footer-->
		<div class="footer">
		   <p>&copy; 2018 Todos os direitos reservados a ARCH Software.</a></p>		
		</div>
        <!--//footer-->	
</body>
</html>