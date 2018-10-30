<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>A random title</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="here2.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
<?php
            
			// define variables and set to empty values
						$nameErr = $emailErr = $genderErr = $websiteErr = $apellidoErr = "";
						$name = $email = $gender  = $website =  "";
			// Extra varibles to meet requirements
						
						$edadErr = $paísErr = $estadoErr = $ciudadErr = $professionErr = $countryErr = '';
			
						$edad = $telNumber = '';
						$apellido = $pais = $estado = $ciudad = $profession = $country = '';
						
			// validating data
						if (isset($_POST['submit'])) {
							$ok = true;
			
			// COUNTRY
							if (empty($_POST['country'])|| $_POST['country'] == 'x'){
								$ok = false;
								$countryErr = 'País requerido.';
							}   else {
								$country = test_input($_POST['country']);
							}
							if (empty($_POST["name"])) {
			// NOMBRE           
								 $ok = false;
								$nameErr = "Nombre requerido.";
							   
							} else {
								$name = test_input($_POST["name"]);
								// check if name only contains letters and whitespace
								if (!preg_match("/^[a-zA-Z]*$/",$name)) {
									$nameErr = "Sólo letras y espacio aceptados. (Omita acentos)";
									$ok = false;
									}
							}
			// APELLIDO
							if(!isset($_POST['apellido']) || $_POST['apellido'] == ''){
								$apellidoErr = 'Apellido requerido.';
								$ok = false;
							} else {
								$apellido = test_input($_POST['apellido']);
							}
			//ESTADO
							if(empty($_POST['estado'])){
								$estadoErr = 'Estado requerido.';
								$ok = false;
							}   else {
								$estado = test_input($_POST['estado']);
							}
			// CIUDAD
							if(empty($_POST['ciudad'])){
								$ciudadErr = 'Ciudad requerida.';
								$ok = false;
							} else {
								$ciudad = $_POST['ciudad'];
							}
			// PROFESIÓN
							if(empty($_POST['profession'])){
								$professionErr = 'Profesión requerida.';
								$ok = false;
							} else {
								$profession = $_POST['profession'];
							}
			// TELÉFONO 
							if(!empty($_POST['telNumber'])){
								$telNumber = $_POST['telNumber'];
							}   
			// EDAD
							if(empty($_POST['edad'])){
								$edadErr = 'Edad requerida.';
								$ok = false;
							} else {
								$edad = $_POST['edad'];
							}
			// CORREO
							if (empty($_POST["email"])) {
								$emailErr = "Email requerido.";
								$ok = false;
							} else {
								$email = test_input($_POST["email"]);
							// check if e-mail address is well-formed
								if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
									$emailErr = "Formato de correo inválido.";
									$ok = false;
								}
							}
			// WEBSITE 
							if (empty($_POST["website"])) {
								$website = "";
							} else {
								$website = test_input($_POST["website"]);
				// check if URL address syntax is valid (this regular expression also allows dashes in the URL)
								if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
								$websiteErr = "URL inválida";
								$ok = false;
								}
							}
			
						  
			// SEXOOOOOOOOOO
							if (empty($_POST["gender"])) {
								$genderErr = "Género requerido";
								$ok = false;
							} else {
								$gender = test_input($_POST["gender"]);
							} 
			// db connection logic
							if($ok){
								
								$db = mysqli_connect('localhost', 'root', '', 'letsphp');
								$sql = sprintf("INSERT INTO clientes (nombre, apellido, edad, correo, telefono, website, estado,
								ciudad, profesion, sexo, country) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
								mysqli_real_escape_string($db, $name),
								mysqli_real_escape_string($db, $apellido),
								mysqli_real_escape_string($db, $edad),
								mysqli_real_escape_string($db, $email),
								mysqli_real_escape_string($db, $telNumber),
								mysqli_real_escape_string($db, $website),
								mysqli_real_escape_string($db, $estado),
								mysqli_real_escape_string($db, $ciudad),
								mysqli_real_escape_string($db, $profession),
								mysqli_real_escape_string($db, $gender),
								mysqli_real_escape_string($db, $country));
				
								mysqli_query($db, $sql);
								mysqli_close($db);
				
								
								header('Location: amaze.html');
							
							}
							
			
						}
			// Sanitazing it a bit.
			function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
			?>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Ingrese datos del cliente</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					
						<label for='a'>Nombre: </label><span class="error">* <?php echo $nameErr;?></span>
           				<input  id='a' autocomplete='off' type="text" name="name" value="<?php echo $name;?>">
            			

						<label for='b'>Apellido: </label><span class="error">* <?php echo $apellidoErr;?></span>
						
						<input id='b' autocomplete='off' type="text" name="apellido" value="<?php echo $apellido;?>">
						
						
					
						<label for='c'>Edad: </label><span class="error">* <?php echo $edadErr;?></span>
						<input id='c' type="number" name="edad" value="<?php echo $edad;?>">
						
						
						
					
						<label for='d'>E-mail: </label><span class="error">* <?php echo $emailErr;?></span>
						<input id='d' autocomplete='off' type="text" name="email" value="<?php echo $email;?>">
						
						
						
					
						<label for='e'>Teléfono: </label><span class='error'></span>
						<input id='e' type="text" name="telNumber" value="<?php echo $telNumber;?>">
					
						

					
						<label for='f'>Website: </label><span class="error"><?php echo $websiteErr;?></span>
						<input id='f' autocomplete='off' type="text" name="website" value="<?php echo $website;?>">
						
						    

					
						<label for='g'>Estado/Provincia: </label><span class="error">* <?php echo $estadoErr;?></span>
						<input id='g' autocomplete='off' type="text" name="estado" value="<?php echo $estado;?>">
						
						

					
						<label for='h'>Ciudad: </label><span class="error">* <?php echo $ciudadErr;?></span>
						<input id='h' autocomplete='off' type="text" name="ciudad" value="<?php echo $ciudad;?>">
						

					
						<label for='i'>Profesión: </label>	<span class="error">* <?php echo $professionErr;?></span>
						<input id='i' autocomplete='off' type="text" name="profession" value="<?php echo $profession;?>">
					
						
						<label for='k'> Seleccione su país </label> <span class='error'>* <?php echo $countryErr; echo '<br>'; ?></span>
								<select id='k' name='country' value='x'>
									<option value='x'>Seleccione su país.</option>
									<option value="AF">Afghanistan</option>
									<option value="AX">Åland Islands</option>
									<option value="AL">Albania</option>
									<option value="DZ">Algeria</option>
									<option value="AS">American Samoa</option>
									<option value="AD">Andorra</option>
									<option value="AO">Angola</option>
									<option value="AI">Anguilla</option>
									<option value="AQ">Antarctica</option>
									<option value="AG">Antigua and Barbuda</option>
									<option value="AR">Argentina</option>
									<option value="AM">Armenia</option>
									<option value="AW">Aruba</option>
									<option value="AU">Australia</option>
									<option value="AT">Austria</option>
									<option value="AZ">Azerbaijan</option>
									<option value="BS">Bahamas</option>
									<option value="BH">Bahrain</option>
									<option value="BD">Bangladesh</option>
									<option value="BB">Barbados</option>
									<option value="BY">Belarus</option>
									<option value="BE">Belgium</option>
									<option value="BZ">Belize</option>
									<option value="BJ">Benin</option>
									<option value="BM">Bermuda</option>
									<option value="BT">Bhutan</option>
									<option value="BO">Bolivia, Plurinational State of</option>
									<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
									<option value="BA">Bosnia and Herzegovina</option>
									<option value="BW">Botswana</option>
									<option value="BV">Bouvet Island</option>
									<option value="BR">Brazil</option>
									<option value="IO">British Indian Ocean Territory</option>
									<option value="BN">Brunei Darussalam</option>
									<option value="BG">Bulgaria</option>
									<option value="BF">Burkina Faso</option>
									<option value="BI">Burundi</option>
									<option value="KH">Cambodia</option>
									<option value="CM">Cameroon</option>
									<option value="CA">Canada</option>
									<option value="CV">Cape Verde</option>
									<option value="KY">Cayman Islands</option>
									<option value="CF">Central African Republic</option>
									<option value="TD">Chad</option>
									<option value="CL">Chile</option>
									<option value="CN">China</option>
									<option value="CX">Christmas Island</option>
									<option value="CC">Cocos (Keeling) Islands</option>
									<option value="CO">Colombia</option>
									<option value="KM">Comoros</option>
									<option value="CG">Congo</option>
									<option value="CD">Congo, the Democratic Republic of the</option>
									<option value="CK">Cook Islands</option>
									<option value="CR">Costa Rica</option>
									<option value="CI">Côte d'Ivoire</option>
									<option value="HR">Croatia</option>
									<option value="CU">Cuba</option>
									<option value="CW">Curaçao</option>
									<option value="CY">Cyprus</option>
									<option value="CZ">Czech Republic</option>
									<option value="DK">Denmark</option>
									<option value="DJ">Djibouti</option>
									<option value="DM">Dominica</option>
									<option value="DO">Dominican Republic</option>
									<option value="EC">Ecuador</option>
									<option value="EG">Egypt</option>
									<option value="SV">El Salvador</option>
									<option value="GQ">Equatorial Guinea</option>
									<option value="ER">Eritrea</option>
									<option value="EE">Estonia</option>
									<option value="ET">Ethiopia</option>
									<option value="FK">Falkland Islands (Malvinas)</option>
									<option value="FO">Faroe Islands</option>
									<option value="FJ">Fiji</option>
									<option value="FI">Finland</option>
									<option value="FR">France</option>
									<option value="GF">French Guiana</option>
									<option value="PF">French Polynesia</option>
									<option value="TF">French Southern Territories</option>
									<option value="GA">Gabon</option>
									<option value="GM">Gambia</option>
									<option value="GE">Georgia</option>
									<option value="DE">Germany</option>
									<option value="GH">Ghana</option>
									<option value="GI">Gibraltar</option>
									<option value="GR">Greece</option>
									<option value="GL">Greenland</option>
									<option value="GD">Grenada</option>
									<option value="GP">Guadeloupe</option>
									<option value="GU">Guam</option>
									<option value="GT">Guatemala</option>
									<option value="GG">Guernsey</option>
									<option value="GN">Guinea</option>
									<option value="GW">Guinea-Bissau</option>
									<option value="GY">Guyana</option>
									<option value="HT">Haiti</option>
									<option value="HM">Heard Island and McDonald Islands</option>
									<option value="VA">Holy See (Vatican City State)</option>
									<option value="HN">Honduras</option>
									<option value="HK">Hong Kong</option>
									<option value="HU">Hungary</option>
									<option value="IS">Iceland</option>
									<option value="IN">India</option>
									<option value="ID">Indonesia</option>
									<option value="IR">Iran, Islamic Republic of</option>
									<option value="IQ">Iraq</option>
									<option value="IE">Ireland</option>
									<option value="IM">Isle of Man</option>
									<option value="IL">Israel</option>
									<option value="IT">Italy</option>
									<option value="JM">Jamaica</option>
									<option value="JP">Japan</option>
									<option value="JE">Jersey</option>
									<option value="JO">Jordan</option>
									<option value="KZ">Kazakhstan</option>
									<option value="KE">Kenya</option>
									<option value="KI">Kiribati</option>
									<option value="KP">Korea, Democratic People's Republic of</option>
									<option value="KR">Korea, Republic of</option>
									<option value="KW">Kuwait</option>
									<option value="KG">Kyrgyzstan</option>
									<option value="LA">Lao People's Democratic Republic</option>
									<option value="LV">Latvia</option>
									<option value="LB">Lebanon</option>
									<option value="LS">Lesotho</option>
									<option value="LR">Liberia</option>
									<option value="LY">Libya</option>
									<option value="LI">Liechtenstein</option>
									<option value="LT">Lithuania</option>
									<option value="LU">Luxembourg</option>
									<option value="MO">Macao</option>
									<option value="MK">Macedonia, the former Yugoslav Republic of</option>
									<option value="MG">Madagascar</option>
									<option value="MW">Malawi</option>
									<option value="MY">Malaysia</option>
									<option value="MV">Maldives</option>
									<option value="ML">Mali</option>
									<option value="MT">Malta</option>
									<option value="MH">Marshall Islands</option>
									<option value="MQ">Martinique</option>
									<option value="MR">Mauritania</option>
									<option value="MU">Mauritius</option>
									<option value="YT">Mayotte</option>
									<option value="MX">Mexico</option>
									<option value="FM">Micronesia, Federated States of</option>
									<option value="MD">Moldova, Republic of</option>
									<option value="MC">Monaco</option>
									<option value="MN">Mongolia</option>
									<option value="ME">Montenegro</option>
									<option value="MS">Montserrat</option>
									<option value="MA">Morocco</option>
									<option value="MZ">Mozambique</option>
									<option value="MM">Myanmar</option>
									<option value="NA">Namibia</option>
									<option value="NR">Nauru</option>
									<option value="NP">Nepal</option>
									<option value="NL">Netherlands</option>
									<option value="NC">New Caledonia</option>
									<option value="NZ">New Zealand</option>
									<option value="NI">Nicaragua</option>
									<option value="NE">Niger</option>
									<option value="NG">Nigeria</option>
									<option value="NU">Niue</option>
									<option value="NF">Norfolk Island</option>
									<option value="MP">Northern Mariana Islands</option>
									<option value="NO">Norway</option>
									<option value="OM">Oman</option>
									<option value="PK">Pakistan</option>
									<option value="PW">Palau</option>
									<option value="PS">Palestinian Territory, Occupied</option>
									<option value="PA">Panama</option>
									<option value="PG">Papua New Guinea</option>
									<option value="PY">Paraguay</option>
									<option value="PE">Peru</option>
									<option value="PH">Philippines</option>
									<option value="PN">Pitcairn</option>
									<option value="PL">Poland</option>
									<option value="PT">Portugal</option>
									<option value="PR">Puerto Rico</option>
									<option value="QA">Qatar</option>
									<option value="RE">Réunion</option>
									<option value="RO">Romania</option>
									<option value="RU">Russian Federation</option>
									<option value="RW">Rwanda</option>
									<option value="BL">Saint Barthélemy</option>
									<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
									<option value="KN">Saint Kitts and Nevis</option>
									<option value="LC">Saint Lucia</option>
									<option value="MF">Saint Martin (French part)</option>
									<option value="PM">Saint Pierre and Miquelon</option>
									<option value="VC">Saint Vincent and the Grenadines</option>
									<option value="WS">Samoa</option>
									<option value="SM">San Marino</option>
									<option value="ST">Sao Tome and Principe</option>
									<option value="SA">Saudi Arabia</option>
									<option value="SN">Senegal</option>
									<option value="RS">Serbia</option>
									<option value="SC">Seychelles</option>
									<option value="SL">Sierra Leone</option>
									<option value="SG">Singapore</option>
									<option value="SX">Sint Maarten (Dutch part)</option>
									<option value="SK">Slovakia</option>
									<option value="SI">Slovenia</option>
									<option value="SB">Solomon Islands</option>
									<option value="SO">Somalia</option>
									<option value="ZA">South Africa</option>
									<option value="GS">South Georgia and the South Sandwich Islands</option>
									<option value="SS">South Sudan</option>
									<option value="ES">Spain</option>
									<option value="LK">Sri Lanka</option>
									<option value="SD">Sudan</option>
									<option value="SR">Suriname</option>
									<option value="SJ">Svalbard and Jan Mayen</option>
									<option value="SZ">Swaziland</option>
									<option value="SE">Sweden</option>
									<option value="CH">Switzerland</option>
									<option value="SY">Syrian Arab Republic</option>
									<option value="TW">Taiwan, Province of China</option>
									<option value="TJ">Tajikistan</option>
									<option value="TZ">Tanzania, United Republic of</option>
									<option value="TH">Thailand</option>
									<option value="TL">Timor-Leste</option>
									<option value="TG">Togo</option>
									<option value="TK">Tokelau</option>
									<option value="TO">Tonga</option>
									<option value="TT">Trinidad and Tobago</option>
									<option value="TN">Tunisia</option>
									<option value="TR">Turkey</option>
									<option value="TM">Turkmenistan</option>
									<option value="TC">Turks and Caicos Islands</option>
									<option value="TV">Tuvalu</option>
									<option value="UG">Uganda</option>
									<option value="UA">Ukraine</option>
									<option value="AE">United Arab Emirates</option>
									<option value="GB">United Kingdom</option>
									<option value="US">United States</option>
									<option value="UM">United States Minor Outlying Islands</option>
									<option value="UY">Uruguay</option>
									<option value="UZ">Uzbekistan</option>
									<option value="VU">Vanuatu</option>
									<option value="VE">Venezuela, Bolivarian Republic of</option>
									<option value="VN">Viet Nam</option>
									<option value="VG">Virgin Islands, British</option>
									<option value="VI">Virgin Islands, U.S.</option>
									<option value="WF">Wallis and Futuna</option>
									<option value="EH">Western Sahara</option>
									<option value="YE">Yemen</option>
									<option value="ZM">Zambia</option>
									<option value="ZW">Zimbabwe</option>
								</select>
					
							
						<label for='j'>Género:</label><span class="error">* <?php echo $genderErr; echo '<br>';?></span>
						<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Mujer
						<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Hombre
						<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Otra cosa  
						
						

					
							
								
							
						
					
					<input type="submit" value="Almacenar" name='submit'>
				</form>
				
			</div>
		</div>
		>
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>