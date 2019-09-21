<?php

	require("config.php");

	//escrevo a query
	$sql = 'SELECT titulo, imagem, gostos FROM programas';

	// conexão da query com a base de dados
	$result = mysqli_query($connection, $sql);

	// fazer os dados num formato em que posso usar, associative array
	$programas = mysqli_fetch_all($result, MYSQLI_ASSOC);



	//NEWSLETTER
	
	//inicializar as variáveis vazias
	$email = '';
	$mensagemEmail =  '';

	//verificar e-mail na newsletter
	if(isset($_POST['submit'])){


		if(empty($_POST['email'])){
			$mensagemEmail = "Por favor, introduza o seu E-mail. <br/>";
		} else {

			$email = $_POST['email'];

			//validar o e-mail através de filter_var
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$mensagemEmail = 'Por favor, introduza um E-mail válido.';
				
			} else {

				$mensagemEmail = 'Obrigado pela sua subscrição!';
				
				//preparar os dados para entrar na base de dados
				$email = mysqli_real_escape_string($connection, $_POST['email']);

				//criar a sql string para adicionar dados
				$sqlnewsletter = "INSERT INTO newsletter(email) VALUES('$email')";

				mysqli_query($connection, $sqlnewsletter);


			}
		}

		//BOA PRÁTICA, desligar a ligação no fim

			//free the result from memory
			mysqli_free_result($result);

			//close the connection to database
			mysqli_close($connection);

		//print_r($programas);

	}


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Montserrat" rel="stylesheet">

		<!-- CSS -->
		<link rel="stylesheet" href="css/style.css"/>
		<!-- RESPONSIVE -->
		<link rel="stylesheet" href="css/responsive.css"/>
		
		<!-- AOS Plugin -->
		<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

		
		<title>Travelity: Programas Turísticos</title>
	
	</head>
  
	<body>
		<div id="homeSection">
			<div id="headerHomePage">
				<div class="container">
					<div class="contactsListDesktop">
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 width="15.833px" height="16.508px" viewBox="0 0 15.833 16.508" enable-background="new 0 0 15.833 16.508" xml:space="preserve">
						<g>
							<g>
								<path fill="#FFFFFF" d="M10.829,4.516L10.32,4.006L9.774,3.461C9.581,3.268,9.581,2.953,9.77,2.763l2.496-2.5
									c0.192-0.189,0.501-0.185,0.692,0.007c0.415,0.414,0.827,0.828,1.242,1.241l-3.205,3.206C10.947,4.646,10.891,4.578,10.829,4.516z
									 M6.79,10.188l-3.29,3.29c0.786,0.765,2.739,0.674,4.455-0.164c0.738-0.36,1.407-0.824,2.043-1.307
									c0.633-0.482,1.227-1.015,1.785-1.575c0.557-0.559,1.086-1.157,1.566-1.788c0.483-0.637,0.951-1.306,1.31-2.048
									c0.838-1.713,0.937-3.665,0.171-4.452l-3.287,3.29c0.193,0.521,0.121,1.141-0.249,1.568c-0.451,0.528-0.931,1.029-1.419,1.52
									C9.389,9.01,8.884,9.49,8.36,9.939C7.932,10.309,7.311,10.381,6.79,10.188z M1.629,11.603c0.415,0.413,0.829,0.827,1.242,1.244
									L6.074,9.64c-0.072-0.05-0.14-0.104-0.202-0.169L5.366,8.965L4.818,8.416H4.816C4.624,8.225,4.31,8.225,4.119,8.413L1.622,10.91
									C1.431,11.104,1.435,11.411,1.629,11.603z"/>
							</g>
						</g>
						</svg>
						<span>217 050 294</span>
						
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 width="18.333px" height="16.516px" viewBox="0 0 18.333 16.516" enable-background="new 0 0 18.333 16.516" xml:space="preserve">
						<g>
							<polygon fill="#FFFFFF" points="1.766,2.585 1.464,2.344 1.464,3.55 1.464,3.69 1.464,10.735 1.464,10.813 1.464,11.946 
								1.713,11.687 6.606,6.553 	"/>
							<path fill="#FFFFFF" d="M11.092,7.153L9.533,8.431c-0.091,0.075-0.206,0.112-0.32,0.112c-0.113,0-0.227-0.038-0.318-0.112
								l-1.56-1.279L2.379,12.35L2.127,12.63h1.274h0.066h11.51h0.049h1.319l-0.299-0.279L11.092,7.153z"/>
							<path fill="#FFFFFF" d="M2.479,1.962l6.734,5.525l6.736-5.525l0.261-0.229h-1.184H3.402c-0.014,0-0.027,0.001-0.04,0.001
								l-1.15,0.014L2.479,1.962z"/>
							<path fill="#FFFFFF" d="M16.963,3.533l0.001-1.192l-0.302,0.245l-4.842,3.969l4.894,5.133l0.25,0.244v-1.118v-0.021V3.55
								c0-0.006-0.002-0.012-0.002-0.019L16.963,3.533z"/>
						</g>
						</svg>
						<span>apoio@travelity.pt</span>
					</div>
						
					<div class="languagesListDesktop">
						<span class="active">PT</span>
						<span>|</span>
						<a href="#"><span>EN</span></a>
						<span>|</span>
						<a href="#"><span>FR</span></a>
						<span>|</span>
						<a href="#"><span>ES</span></a>
					</div>
				</div>
			</div>
			
			<div class="clear"></div>

			<?php
				include('menu.php');
			?>
				
			<div id="homepageImage">
			
				<div class="homepageImageDesktop">
					<img src="imagens/dubrovnik.jpg" alt="Dubrovnik City" class="homepageImage">
					  <div class="homepageImageText">
						
						<div>
							<div class="title">5 Dias em Dubrovnik, Croácia</div>
							<div class="subtitle">Junte-se ao nosso grupo e visite a cidade connosco!</div>
						</div>
						
							<div class="button">
								<div class="text">VEJA O PROGRAMA TURÍSTICO
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 width="34px" height="25.793px" viewBox="0 0 34 25.793" enable-background="new 0 0 34 25.793" xml:space="preserve">
									<polygon fill="#FFFFFF" points="22.209,14.373 13.791,22.793 13.791,5.955 "/>
									</svg>
								</div>
							</div>
					  </div>
				</div>
				
				<div class="homepageImageDevices"><a href="#">
					<picture>
					  <source srcset="imagens/homepageMobile.png" media="(max-width: 480px)" /> <!-- MOBILE 480px para baixo -->
					  <source srcset="imagens/homepageTablet.png" media="(max-width: 768px)" /> <!-- MOBILE 480px para baixo -->
					  <source srcset="imagens/homepage1200.png" media="(max-width: 1200px)" /> <!-- TABLETS 1200px para baixo -->
					  <img src="imagens/dubrovnik.jpg" alt="" />
					</picture>
				</div></a>
				
			</div>
			
			<div id="messageHomePage">
				<div class="container">
					<h1 class="text-center">EXPLORE AS CIDADES DO MUNDO</h1>
					<div class="text-center">
						<svg class="triangleHome" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 width="38.667px" height="21.667px" viewBox="0 0 38.667 21.667" enable-background="new 0 0 38.667 21.667" xml:space="preserve">
						<polygon fill="#FF664D" points="20.472,18.974 5.276,3.777 35.667,3.777 "/>
						</svg>
					</div>
				</div>
			</div>
		</div>
		
		<div id="trendsSection">
			<div class="container">
				<div>
					<h2>ÚLTIMAS TENDÊNCIAS 2018/2019</h2>
					<h3>Visite as cidades mais procuradas do ano!</h3>
				</div>
				<div>
					<div class="trendCard1">
						<img src="imagens/paris.png" alt="Paris"/>
						<h4>Paris, França</h4>
						<div class="topics">
								<div class="topic">
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 width="37px" height="29px" viewBox="0 0 37 29" enable-background="new 0 0 37 29" xml:space="preserve">
									<polygon fill="#3271A5" points="22.079,14.632 15.378,21.333 15.378,7.932 "/>
									</svg>
									<span>Torre Eiffel &ensp;|&ensp; Notre-Dame &ensp;|&ensp; Louvre &ensp;|&ensp; Arc de Triomphe</span>
								</div>
								<div class="topic2">
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 width="37px" height="29px" viewBox="0 0 37 29" enable-background="new 0 0 37 29" xml:space="preserve">
									<polygon fill="#3271A5" points="22.079,14.632 15.378,21.333 15.378,7.932 "/>
									</svg>
									<span><strong>DIA ESPECIAL:</strong> Palácio de Versalhes</span>
								</div>
							</div>
						<div class="trendsButton">
							<span>LEIA TODO O PROGRAMA TURÍSTICO</span>
						</div>
					</div>
					
					<div class="trendCard2">
						<img src="imagens/rome.png" alt="Rome"/>
						<h4>Roma, Itália</h4>
						
						<div class="topics">
								<div class="topic">
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 width="37px" height="29px" viewBox="0 0 37 29" enable-background="new 0 0 37 29" xml:space="preserve">
									<polygon fill="#3271A5" points="22.079,14.632 15.378,21.333 15.378,7.932 "/>
									</svg>
									<span>Coliseu &ensp;|&ensp; Fórum Romano &ensp;|&ensp; Vaticano &ensp;|&ensp; Fontana di Trevi</span>
								</div>
								<div class="topic2">
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 width="37px" height="29px" viewBox="0 0 37 29" enable-background="new 0 0 37 29" xml:space="preserve">
									<polygon fill="#3271A5" points="22.079,14.632 15.378,21.333 15.378,7.932 "/>
									</svg>
									<span><strong>DIA ESPECIAL:</strong> Basílica de São Pedro</span>
								</div>
							</div>
						<div class="trendsButton">
							<span>LEIA TODO O PROGRAMA TURÍSTICO</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div id="featuresSection">
			<div class="container">
				
				<div>
					<h2>CONHEÇA MAIS CIDADES A VISITAR</h2>
					<h3>Programas Turísticos a não perder!</h3>
				</div>
				
				<div class="allCards">

					<div class="featCard1">
						<h4><?php echo $programas[0]['titulo']; ?></h4>
						<img src="<?php echo $programas[0]['imagem']; ?>" alt="London"/>
						<div class="star">
							<img id="starLon" src="imagens/star.svg" alt="">
							<span id="starTextLon"><?php echo $programas[0]['gostos']; ?></span>
						</div>
						<div class="seeMore"><span>Veja o Programa Turístico</span>
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 width="20.259px" height="14px" viewBox="0 0 20.259 18.667" enable-background="new 0 0 20.259 18.667" xml:space="preserve">
							<polygon fill="#FFFFFF" points="17.011,9.333 8.188,18.157 8.188,0.51 "/>
							</svg>
						</div>
					</div>
					
					<div class="featCard2">
						<h4><?php echo $programas[1]['titulo']; ?></h4>
						<img src="<?php echo $programas[1]['imagem']; ?>" alt="Budapeste"/>
							<div class="star">
								<img id="starBuda" src="imagens/star.svg" alt="">
								<span id="starTextBuda"><?php echo $programas[1]['gostos']; ?></span>
							</div>
						<div class="seeMore">Veja o Programa Turístico
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 width="20.259px" height="14px" viewBox="0 0 20.259 18.667" enable-background="new 0 0 20.259 18.667" xml:space="preserve">
						<polygon fill="#FFFFFF" points="17.011,9.333 8.188,18.157 8.188,0.51 "/>
						</svg>
						</div>
					</div>
					
					<div class="featCard3">
						<h4><?php echo $programas[2]['titulo']; ?></h4>
						<img src="<?php echo $programas[2]['imagem']; ?>" alt="Porto"/>
							<div class="star">
								<img id="starPort" src="imagens/star.svg" alt="">
								<span id="starTextPort"><?php echo $programas[2]['gostos']; ?></span>
							</div>
						<div class="seeMore">Veja o Programa Turístico
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 width="20.259px" height="14px" viewBox="0 0 20.259 18.667" enable-background="new 0 0 20.259 18.667" xml:space="preserve">
						<polygon fill="#FFFFFF" points="17.011,9.333 8.188,18.157 8.188,0.51 "/>
						</svg>
						</div>
					</div>
					
					<div class="featCard4">
						<h4><?php echo $programas[3]['titulo']; ?></h4>
						<img src="<?php echo $programas[3]['imagem']; ?>" alt="Nova Iorque"/>
							<div class="star">
								<img id="starNYork" src="imagens/star.svg" alt="">
								<span id="starTextNYork"><?php echo $programas[3]['gostos']; ?></span>
							</div>
						<div class="seeMore">Veja o Programa Turístico
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 width="20.259px" height="14px" viewBox="0 0 20.259 18.667" enable-background="new 0 0 20.259 18.667" xml:space="preserve">
							<polygon fill="#FFFFFF" points="17.011,9.333 8.188,18.157 8.188,0.51 "/>
							</svg>
							</a>
						</div>
					</div>
					
					<div class="clear"></div>
					
				</div>
				
				
				
				<div class="button">
						<div class="text">VEJA MAIS CIDADES DISPONÍVEIS
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 width="34px" height="25.793px" viewBox="0 0 34 25.793" enable-background="new 0 0 34 25.793" xml:space="preserve">
								<polygon fill="#FFFFFF" points="22.209,14.373 13.791,22.793 13.791,5.955 "/>
							</svg>
						</div>
				</div>
				
				
					
			</div>
				
		</div>
		
		<div id="promoSection">
			<div class="container">
				<h2>GANHE UMA VIAGEM A RIO DE JANEIRO, BRASIL</h2>
				<h3>Participe!</h3>


				<div class="promoImageDevices"><a href="#">
					<picture>
					  <source srcset="imagens/banner_mobile320.png" media="(max-width: 480px)" />
					  <source srcset="imagens/banner_mobile.png" media="(max-width: 767px)" />
					  <source srcset="imagens/banner768.png" media="(max-width: 992px)" />
					  <source srcset="imagens/banner.png" media="(max-width: 1200px)" />
					  <img src="imagens/banner.png" alt="" />
					</picture>
				</div></a>

					<p>Para qualquer esclarecimento de dúvidas deste passatempo, contactar-nos.</p>

			</div>
		</div>

		<div id="aboutSection">
			<div class="container">
				<h2>QUEM SOMOS</h2>
				<h3>Saiba mais sobre nós</h3>

				<div class="row moreInfo">

			        <div class="col-lg-4 col-md-4 mb-3 card1">
			          <div class="" style="">
			            <!-- <img class="card-img-top" src="images/forest-logo.png" alt="Card image cap"> -->
			            <div class="card-body">
			              <h5 class="card-title">A empresa</h5>
			              <p class="card-text">foca-se na disponibilidade de pacotes turísticos a pessoas que pretendem conhecer e visitar diversas cidades do mundo.</p>
			            </div>
			          </div>
			        </div>

			        <div class="col-lg-4 col-md-4 mb-3 card2">
			          <div class="" style="">
			            <!-- <img class="card-img-top" src="images/forest-logo.png" alt="Card image cap"> -->
			            <div class="card-body">
			              <h5 class="card-title">Os clientes</h5>
			              <p class="card-text">têm a possibilidade de visitar com toda a orientação vários pontos turísticos durante vários dias de uma cidade à sua escolha.</p>
			            </div>
			          </div>
			        </div>

			        <div class="col-lg-4 col-md-4 mb-3 card3">
			          <div class="" style="">
			            <!-- <img class="card-img-top" src="images/forest-logo.png" alt="Card image cap"> -->
			            <div class="card-body">
			              <h5 class="card-title">A equipa</h5>
			              <p class="card-text">pretende comunicar aos nossos clientes de uma forma mais fácil, rápida e diferente em relação ao mercado que existe.</p>
			            </div>
			          </div>
			        </div>

			    </div>
			</div>
		</div>

		<div id="newsletterSection">

			<div class="container">

				<div class="text-center">
					<img src="imagens/letters.svg">
					<h2>NEWSLETTER MENSAL</h2>
					<h3>Receba conteúdo exclusivo!</h3>
				</div>

				<form action="#newsletterSection" method="POST">

					<input type="email" name="email" placeholder="E-mail" class="letter" value="<?php echo htmlspecialchars($email); ?>">
					<input type="submit" name="submit" value="Enviar" class="submitStyle">
					

					<p class=""><?php echo $mensagemEmail; ?></p>

				</form>

			</div>

		</div>

		<div id="footer">

			<div class="container">
				
				<div class="row">

					<div class="col-lg-3 col-md-3 mb-3">
						<h5>NAVEGUE</h5>
						<ul class="first">
							<li>Mapa do Site</li>
							<li>Programas Turísticos</li>
						</ul>
			        </div>

			        <div class="col-lg-3 col-md-4 mb-3">
						<h5>SIGA-NOS</h5>
						<ul class="redes">
							<li><img src="imagens/facebook.png"></li>
							<li><img src="imagens/youtube.png"></li>
							<li><img src="imagens/twitter.png"></li>
							<li><img src="imagens/instagram.png"></li>
						</ul>
			        </div>

			        <div class="col-lg-3 col-md-2 mb-3">
						<h5>APOIO</h5>
						<ul>
							<li>Contactos</li>
							<li>Perguntas Frequentes</li>
						</ul>
			        </div>

			        <div class="col-lg-3 col-md-3 mb-3">
						<h5>TERMOS LEGAIS</h5>
						<ul>
							<li>Termos e Condições</li>
							<li>Política de Privacidade</li>
						</ul>
			        </div>

				</div>

			</div>

		</div>

		<div id="rights">

			<div class="container">
				
				<p>© 2019 All rights reserved.</p>

			</div>
		</div>

		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		
		<!-- Popper.js -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		
		<!-- Bootstrap JS -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
		<!-- Script Menu -->
		<script type="text/javascript" src="scripts/menu.js"></script>
			
		
		<!-- Polyfills Plugin -->
		
			<!-- Script para funcionar em todos os browsers -->
			<script>
				document.createElement( "picture" );
			</script>
				
			<!-- Link do plugin -->
			<script src="https://cdn.rawgit.com/scottjehl/picturefill/3.0.2/dist/picturefill.js" async></script>
		
		<script></script>
		
	</body>
  
</html>