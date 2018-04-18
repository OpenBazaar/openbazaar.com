<script type="text/javascript">
	function processConfig(frm) {
	    var formData = $(frm).serializeArray();
	    $.ajax({
		    type: "POST",
		    url: "config/save_settings",
		    data: formData,
		    success: function() {
				$('#Config-Modal').hide();
		    }
		  });
	    
	    return false;
    };
    </script>

<div class=overlay>	
</div>
<div class="Purchasing-Modal" style="height:auto;padding:30px 10px;opacity:1;background-color: #ffffff;top: 100px;position: fixed;left: 50%;transform: translateX(-50%);">	
	
	<div class="Modal-Header" style="margin:0 auto;text-align: center;font-size:16px;">Settings</div>
	
	<div style="margin-top:20px;height:1px; background-color:#d2d3d9;"></div>
	
	<form id="Config-Form" method="post" onsubmit="return processConfig(this)">
	
	<div class="Settings-Row">
		<div>Language</div>
		<div>
		<div class="Settings-Select">

		<select>
			<?php foreach($languages as $language) { ?>
            <option value="<?=$language['code']?>"><?=$language['name']?></option>
            <?php } ?>
		</select>	</div>
		</div>
	</div>
	
	<div class="Settings-Row">
		<div>Country</div>
		<div>
		<div class="Settings-Select">
		<select id="settingsCountrySelect" name="country" class="clrSh2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
            
            <?php foreach($languages as $language) { ?>
            
            <?php } ?>
            
            <option value="AFGHANISTAN">Afghanistan</option>
            <option value="ALAND_ISLANDS">Aland Islands</option>
            
            <option value="ALBANIA">Albania</option>
            
            <option value="ALGERIA">Algeria</option>
            
            <option value="AMERICAN_SAMOA">American Samoa</option>
            
            <option value="ANDORRA">Andorra</option>
            
            <option value="ANGOLA">Angola</option>
            
            <option value="ANGUILLA">Anguilla</option>
            
            <option value="ANTIGUA">Antigua and Barbuda</option>
            
            <option value="ARGENTINA">Argentina</option>
            
            <option value="ARMENIA">Armenia</option>
            
            <option value="ARUBA">Aruba</option>
            
            <option value="AUSTRALIA">Australia</option>
            
            <option value="AUSTRIA">Austria</option>
            
            <option value="AZERBAIJAN">Azerbaijan</option>
            
            <option value="BAHAMAS">Bahamas (The)</option>
            
            <option value="BAHRAIN">Bahrain</option>
            
            <option value="BANGLADESH">Bangladesh</option>
            
            <option value="BARBADOS">Barbados</option>
            
            <option value="BELARUS">Belarus</option>
            
            <option value="BELGIUM">Belgium</option>
            
            <option value="BELIZE">Belize</option>
            
            <option value="BENIN">Benin</option>
            
            <option value="BERMUDA">Bermuda</option>
            
            <option value="BHUTAN">Bhutan</option>
            
            <option value="BOLIVIA">Bolivia (Plurinational State of)</option>
            
            <option value="BONAIRE_SINT_EUSTATIUS_SABA">Bonaire, Sint Eustatius and Saba</option>
            
            <option value="BOSNIA">Bosnia and Herzegovina</option>
            
            <option value="BOTSWANA">Botswana</option>
            
            <option value="BOUVET_ISLAND">Bouvet Island</option>
            
            <option value="BRAZIL">Brazil</option>
            
            <option value="BRITISH_INDIAN_OCEAN_TERRITORY">British Indian Ocean Territory (The)</option>
            
            <option value="BRUNEI_DARUSSALAM">Brunei Darussalam</option>
            
            <option value="BULGARIA">Bulgaria</option>
            
            <option value="BURKINA_FASO">Burkina Faso</option>
            
            <option value="BURUNDI">Burundi</option>
            
            <option value="CABO_VERDE">Cabo Verde</option>
            
            <option value="CAMBODIA">Cambodia</option>
            
            <option value="CAMEROON">Cameroon</option>
            
            <option value="CANADA">Canada</option>
            
            <option value="CAYMAN_ISLANDS">Cayman Islands (The)</option>
            
            <option value="CENTRAL_AFRICAN_REPUBLIC">Central African Republic (The)</option>
            
            <option value="CHAD">Chad</option>
            
            <option value="CHILE">Chile</option>
            
            <option value="CHINA">China</option>
            
            <option value="CHRISTMAS_ISLAND">Christmas Island</option>
            
            <option value="COCOS_ISLANDS">Cocos (KEELING) Islands (The)</option>
            
            <option value="COLOMBIA">Colombia</option>
            
            <option value="COMOROS">Comoros (The)</option>
            
            <option value="CONGO_REPUBLIC">Congo (The Democratic Republic of the)</option>
            
            <option value="CONGO">Congo (The)</option>
            
            <option value="COOK_ISLANDS">Cook Islands (The)</option>
            
            <option value="COSTA_RICA">Costa Rica</option>
            
            <option value="COTE_DIVOIRE">Côte D'Ivoire</option>
            
            <option value="CROATIA">Croatia</option>
            
            <option value="CUBA">Cuba</option>
            
            <option value="CURACAO">Curaçao</option>
            
            <option value="CYPRUS">Cyprus</option>
            
            <option value="CZECH_REPUBLIC">Czech Republic (The)</option>
            
            <option value="DENMARK">Denmark</option>
            
            <option value="DJIBOUTI">Djibouti</option>
            
            <option value="DOMINICA">Dominica</option>
            
            <option value="DOMINICAN_REPUBLIC">Dominican Republic (The)</option>
            
            <option value="ECUADOR">Ecuador</option>
            
            <option value="EGYPT">Egypt</option>
            
            <option value="EL_SALVADOR">El Salvador</option>
            
            <option value="EQUATORIAL_GUINEA">Equatorial Guinea</option>
            
            <option value="ERITREA">Eritrea</option>
            
            <option value="ESTONIA">Estonia</option>
            
            <option value="ETHIOPIA">Ethiopia</option>
            
            <option value="FALKLAND_ISLANDS">Falkland Islands (The)</option>
            
            <option value="FAROE_ISLANDS">Faroe Islands (The)</option>
            
            <option value="FIJI">Fiji</option>
            
            <option value="FINLAND">Finland</option>
            
            <option value="FRANCE">France</option>
            
            <option value="FRENCH_GUIANA">French Guiana</option>
            
            <option value="FRENCH_POLYNESIA">French Polynesia</option>
            
            <option value="FRENCH_SOUTHERN_TERRITORIES">French Southern Territories (The)</option>
            
            <option value="GABON">Gabon</option>
            
            <option value="GAMBIA">Gambia (The)</option>
            
            <option value="GEORGIA">Georgia</option>
            
            <option value="GERMANY">Germany</option>
            
            <option value="GHANA">Ghana</option>
            
            <option value="GIBRALTAR">Gibraltar</option>
            
            <option value="GREECE">Greece</option>
            
            <option value="GREENLAND">Greenland</option>
            
            <option value="GRENADA">Grenada</option>
            
            <option value="GUADELOUPE">Guadeloupe</option>
            
            <option value="GUAM">Guam</option>
            
            <option value="GUATEMALA">Guatemala</option>
            
            <option value="GUERNSEY">Guernsey</option>
            
            <option value="GUINEA">Guinea</option>
            
            <option value="GUINEA_BISSAU">Guinea-Bissau</option>
            
            <option value="GUYANA">Guyana</option>
            
            <option value="HAITI">Haiti</option>
            
            <option value="HEARD_ISLAND">Heard Island and McDonald Islands</option>
            
            <option value="HOLY_SEE">Holy See (The)</option>
            
            <option value="HONDURAS">Honduras</option>
            
            <option value="HONG_KONG">Hong Kong</option>
            
            <option value="HUNGARY">Hungary</option>
            
            <option value="ICELAND">Iceland</option>
            
            <option value="INDIA">India</option>
            
            <option value="INDONESIA">Indonesia</option>
            
            <option value="IRAN">Iran (Islamic Republic of)</option>
            
            <option value="IRAQ">Iraq</option>
            
            <option value="IRELAND">Ireland</option>
            
            <option value="ISLE_OF_MAN">Isle of Man</option>
            
            <option value="ISRAEL">Israel</option>
            
            <option value="ITALY">Italy</option>
            
            <option value="JAMAICA">Jamaica</option>
            
            <option value="JAPAN">Japan</option>
            
            <option value="JERSEY">Jersey</option>
            
            <option value="JORDAN">Jordan</option>
            
            <option value="KAZAKHSTAN">Kazakhstan</option>
            
            <option value="KENYA">Kenya</option>
            
            <option value="KIRIBATI">Kiribati</option>
            
            <option value="NORTH_KOREA">Korea (The Democratic People's Republic of)</option>
            
            <option value="SOUTH_KOREA">Korea (The Republic of)</option>
            
            <option value="KUWAIT">Kuwait</option>
            
            <option value="KYRGYZSTAN">Kyrgyzstan</option>
            
            <option value="LAO">Lao People's Democratic Republic (The)</option>
            
            <option value="LATVIA">Latvia</option>
            
            <option value="LEBANON">Lebanon</option>
            
            <option value="LESOTHO">Lesotho</option>
            
            <option value="LIBERIA">Liberia</option>
            
            <option value="LIBYA">Libya</option>
            
            <option value="LIECHTENSTEIN">Liechtenstein</option>
            
            <option value="LITHUANIA">Lithuania</option>
            
            <option value="LUXEMBOURG">Luxembourg</option>
            
            <option value="MACAO">Macao</option>
            
            <option value="MACEDONIA">Macedonia (The Former Yugoslav Republic of)</option>
            
            <option value="MADAGASCAR">Madagascar</option>
            
            <option value="MALAWI">Malawi</option>
            
            <option value="MALAYSIA">Malaysia</option>
            
            <option value="MALDIVES">Maldives</option>
            
            <option value="MALI">Mali</option>
            
            <option value="MALTA">Malta</option>
            
            <option value="MARSHALL_ISLANDS">Marshall Islands (The)</option>
            
            <option value="MARTINIQUE">Martinique</option>
            
            <option value="MAURITANIA">Mauritania</option>
            
            <option value="MAURITIUS">Mauritius</option>
            
            <option value="MAYOTTE">Mayotte</option>
            
            <option value="MEXICO">Mexico</option>
            
            <option value="MICRONESIA">Micronesia (Federated States of)</option>
            
            <option value="MOLDOVA">Moldova (The Republic of)</option>
            
            <option value="MONACO">Monaco</option>
            
            <option value="MONGOLIA">Mongolia</option>
            
            <option value="MONTENEGRO">Montenegro</option>
            
            <option value="MONTSERRAT">Montserrat</option>
            
            <option value="MOROCCO">Morocco</option>
            
            <option value="MOZAMBIQUE">Mozambique</option>
            
            <option value="MYANMAR">Myanmar</option>
            
            <option value="NAMIBIA">Namibia</option>
            
            <option value="NAURU">Nauru</option>
            
            <option value="NEPAL">Nepal</option>
            
            <option value="NETHERLANDS">Netherlands (The)</option>
            
            <option value="NEW_CALEDONIA">New Caledonia</option>
            
            <option value="NEW_ZEALAND">New Zealand</option>
            
            <option value="NICARAGUA">Nicaragua</option>
            
            <option value="NIGER">Niger (The)</option>
            
            <option value="NIGERIA">Nigeria</option>
            
            <option value="NIUE">Niue</option>
            
            <option value="NORFOLK_ISLAND">Norfolk Island</option>
            
            <option value="NORTHERN_MARIANA_ISLANDS">Northern Mariana Islands (The)</option>
            
            <option value="NORWAY">Norway</option>
            
            <option value="OMAN">Oman</option>
            
            <option value="PAKISTAN">Pakistan</option>
            
            <option value="PALAU">Palau</option>
            
            <option value="PANAMA">Panama</option>
            
            <option value="PAPUA_NEW_GUINEA">Papua New Guinea</option>
            
            <option value="PARAGUAY">Paraguay</option>
            
            <option value="PERU">Peru</option>
            
            <option value="PHILIPPINES">Philippines (The)</option>
            
            <option value="PITCAIRN">Pitcairn</option>
            
            <option value="POLAND">Poland</option>
            
            <option value="PORTUGAL">Portugal</option>
            
            <option value="PUERTO_RICO">Puerto Rico</option>
            
            <option value="QATAR">Qatar</option>
            
            <option value="REUNION">Réunion</option>
            
            <option value="ROMANIA">Romania</option>
            
            <option value="RUSSIA">Russian Federation (The)</option>
            
            <option value="RWANDA">Rwanda</option>
            
            <option value="SAINT_BARTHELEMY">Saint Barthélemy</option>
            
            <option value="SAINT_HELENA">Saint Helena, Ascension and Tristan da Cunha</option>
            
            <option value="SAINT_KITTS">Saint Kitts and Nevis</option>
            
            <option value="SAINT_LUCIA">Saint Lucia</option>
            
            <option value="SAINT_MARTIN">Saint Martin (French Part)</option>
            
            <option value="SAINT_PIERRE">Saint Pierre and Miquelon</option>
            
            <option value="SAINT_VINCENT">Saint Vincent and The Grenadines</option>
            
            <option value="SAMOA">Samoa</option>
            
            <option value="SAN_MARINO">San Marino</option>
            
            <option value="SAO_TOME">Sao Tome and Principe</option>
            
            <option value="SAUDI_ARABIA">Saudi Arabia</option>
            
            <option value="SENEGAL">Senegal</option>
            
            <option value="SERBIA">Serbia</option>
            
            <option value="SEYCHELLES">Seychelles</option>
            
            <option value="SIERRA_LEONE">Sierra Leone</option>
            
            <option value="SINGAPORE">Singapore</option>
            
            <option value="SINT_MAARTEN">Sint Maarten (Dutch Part)</option>
            
            <option value="SUCRE">Sistema Unitario de Compensacion Regional de Pagos 'Sucre'</option>
            
            <option value="SLOVAKIA">Slovakia</option>
            
            <option value="SLOVENIA">Slovenia</option>
            
            <option value="SOLOMON_ISLANDS">Solomon Islands</option>
            
            <option value="SOMALIA">Somalia</option>
            
            <option value="SOUTH_AFRICA">South Africa</option>
            
            <option value="SOUTH_SUDAN">South Sudan</option>
            
            <option value="SPAIN">Spain</option>
            
            <option value="SRI_LANKA">Sri Lanka</option>
            
            <option value="SUDAN">Sudan (The)</option>
            
            <option value="SURINAME">Suriname</option>
            
            <option value="SVALBARD">Svalbard and Jan Mayen</option>
            
            <option value="SWAZILAND">Swaziland</option>
            
            <option value="SWEDEN">Sweden</option>
            
            <option value="SWITZERLAND">Switzerland</option>
            
            <option value="SYRIAN_ARAB_REPUBLIC">Syrian Arab Republic</option>
            
            <option value="TAIWAN">Taiwan</option>
            
            <option value="TAJIKISTAN">Tajikistan</option>
            
            <option value="TANZANIA">Tanzania, United Republic of</option>
            
            <option value="THAILAND">Thailand</option>
            
            <option value="TIMOR_LESTE">Timor-Leste</option>
            
            <option value="TOGO">Togo</option>
            
            <option value="TOKELAU">Tokelau</option>
            
            <option value="TONGA">Tonga</option>
            
            <option value="TRINIDAD">Trinidad and Tobago</option>
            
            <option value="TUNISIA">Tunisia</option>
            
            <option value="TURKEY">Turkey</option>
            
            <option value="TURKMENISTAN">Turkmenistan</option>
            
            <option value="TURKS_AND_CAICOS_ISLANDS">Turks and Caicos Islands (The)</option>
            
            <option value="TUVALU">Tuvalu</option>
            
            <option value="UGANDA">Uganda</option>
            
            <option value="UKRAINE">Ukraine</option>
            
            <option value="UNITED_ARAB_EMIRATES">United Arab Emirates (The)</option>
            
            <option value="UNITED_KINGDOM">United Kingdom of Great Britain and Northern Ireland (The)</option>
            
            <option value="UNITED_STATES" selected="">United States of America (The)</option>
            
            <option value="URUGUAY">Uruguay</option>
            
            <option value="UZBEKISTAN">Uzbekistan</option>
            
            <option value="VANUATU">Vanuatu</option>
            
            <option value="VENEZUELA">Venezuela (Bolivarian Republic Of)</option>
            
            <option value="VIETNAM">Vietnam</option>
            
            <option value="VIRGIN_ISLANDS_BRITISH">Virgin Islands (British)</option>
            
            <option value="VIRGIN_ISLANDS_US">Virgin Islands (U.S.)</option>
            
            <option value="WALLIS_AND_FUTUNA">Wallis and Futuna</option>
            
            <option value="WESTERN_SAHARA">Western Sahara</option>
            
            <option value="YEMEN">Yemen</option>
            
            <option value="ZAMBIA">Zambia</option>
            
            <option value="ZIMBABWE">Zimbabwe</option>
            
          </select>
          	</div>
		</div>
	</div>
	
	
	<div class="Settings-Row">
		<div>Currency</div>
		<div>
		<div class="Settings-Select">
		<select>
			<?php foreach($currencies as $currency) { ?>
			<?=$currency?>
            <option value="<?=$currency['code']?>"><?=$currency['name']?></option>
            <?php } ?>
		</select>
			</div>
		</div>
	</div>
	
	<div class="Settings-Row">
		<div>NSFW Content</div>
		<div>
			<input name="nsfw" type="radio" checked="checked"/> Visible <input name="nsfw" type="radio"/> Hidden 
		</div>
	</div>
	
	<div class="Settings-Row">
		<div>Gateway</div>
		<div>
			<input class="Settings-Text" type="text" style="width:300px;" placeholder="https://gateway.ob1.io"/>
		</div>
	</div>
	
	
	
	<div style="margin-top:20px;height:1px; background-color:#d2d3d9;"></div>
	
	<div style="margin-top:20px;text-align:right;width:100%">
	<button type="submit" class="download-button" style="width:auto;padding-right:20px; padding-left:20px;" >Save</button>
	</div>
	
	</form>
	
</div>