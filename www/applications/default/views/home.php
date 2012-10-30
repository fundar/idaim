<div id="message">
	<h2>"En est&aacute; parte se desplegar&aacute; datos que destaquen del &iacute;ndice de transparencia"</h2>
	<div class="clear"></div>
	<a href="/ranking" title="Descarga el ranking final"   class="downloads ranking-download margin-download ">Descarga el ranking final</a>
	<a href="/indice" title="Descarga la matriz del IDAIM" class="downloads indice-download">Descarga la matriz del IDAIM</a>
</div>

<div id="results-graph">
	<h2>Ranking general de las entidades</h2>
</div>

<div id="indice-nacional">
	<h3>&Iacute;ndice Rep&uacute;blica Mexicana</h3><span class="close">Cerrar</span><span class="more">Abrir</span>
	<img src="<?php print $this->themePath; ?>/css/images/nacional.png" class="indice-icon" alt="Nacional" />
</div>

<div id="indice-estatal">
	<h3>&Iacute;ndice por Estado</h3><span class="more">Abrir</span><span class="close">Cerrar</span>
	<img src="<?php print $this->themePath; ?>/css/images/estado.png" class="indice-icon" alt="Estado" />
</div>

<div id="divisor"></div>

<div id="results-nacional"></div>

<div id="results-estatal">
	<div id="top-resutls">
		<a class="button-download" href="/" title="Descargar PDF del indice del estado"><span>Descargar PDF</span></a>
		
		<div id="form-estados">
			<a class="button-seek" href="/" title="Buscar por estado">
				<span>Buscar</span>
			</a>
			
			<select name="estados">
				<option value="Aguascalientes">Aguascalientes</option>
				<option value="BC">Baja California</option>
				<option value="BCS">Baja California Sur</option>
				<option value="Campeche">Campeche</option>
				<option value="Chiapas">Chiapas</option>
				<option value="Chihuahua">Chihuahua</option>
				<option value="Coahuila">Coahuila</option>
				<option value="Colima">Colima</option>
				<option value="DF">Distrito Federal</option>
				<option value="Durango">Durango</option>
				<option value="Mexico">M&eacute;xico</option>
				<option value="Guanajuato">Guanajuato</option>
				<option value="Guerrero">Guerrero</option>
				<option value="Hidalgo">Hidalgo</option>
				<option value="Jalisco">Jalisco</option>
				<option value="Michoacan">Michoac&aacute;n</option>
				<option value="Morelos">Morelos</option>
				<option value="Nayarit">Nayarit</option>
				<option value="NL">Nuevo Le&oacute;n</option>
				<option value="Oaxaca">Oaxaca</option>
				<option value="Puebla">Puebla</option>
				<option value="Queretaro">Quer&eacute;taro</option>
				<option value="QR">Quintana Roo</option>
				<option value="SLP">San Luis Potos&iacute;</option>
				<option value="Sinaloa">Sinaloa</option>
				<option value="Sonora">Sonora</option>
				<option value="Tabasco">Tabasco</option>
				<option value="Tamaulipas">Tamaulipas</option>
				<option value="Tlaxcala">Tlaxcala</option>
				<option value="Veracruz">Veracruz</option>
				<option value="Yucatan">Yucat&aacute;n</option>
				<option value="Zacatecas">Zacatecas</option>
				<option value="Federal">Federal</option>
			</select>















		</div>
			
		<div class="clear"></div>
			
		<div id="resultados-estado">
			<div id="desc-estado">
				<div id="name-estado">San Luis Potos&iacute;</div>
				<div class="img-estados slp-img"></div>
			</div>
			
			<div id="indice-estado">
				<div id="indice-pro">
					<div class="name">&Iacute;ndice progresivo</div>
					<div class="clear"></div>
					<div class="circle"><span>7.1</span></div>
				</div>
				
				<div id="indice-base">
					<div class="name">&Iacute;ndice base</div>
					<div class="clear"></div>
					<div class="circle"><span>7.3</span></div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="clear"></div>
	
	<div id="burbujas">
		<div id="chart"></div>
		<script src="<?php print $this->themePath; ?>/js/pack.js"></script>
		
		<div id="chart2"></div>
		<script src="<?php print $this->themePath; ?>/js/pack2.js"></script>
	</div>
</div>
