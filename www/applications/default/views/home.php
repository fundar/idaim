<div id="message">
	<div id="message-content">
		<h2>"El IDAIM mide la calidad de las leyes de transparencia de los Estados
en relaci&oacute;n al artículo 6° Constitucional y a las mejores pr&aacute;cticas en la materia."</h2>
		<div class="clear"></div>
		<a href="/ranking" title="Descarga el ranking final"   class="downloads ranking-download">Descarga el ranking final</a>
		<a href="/indice" title="Descarga la matriz del IDAIM" class="downloads indice-download">Descarga la matriz del IDAIM</a>
	</div>
</div>

<div id="results-graph">
	<div id="results-graph-content">
		<h2>Ranking general de las entidades</h2>
		<div id="container-r"></div>
		<div id="interval-rank"></div>
		<div id="rank-estados"></div>
		<span class="text-bar">Alta transparencia</span>
			<div id="bar-colors">
				<span class="color color1"></span>
				<span class="color color2"></span>
				<span class="color color3"></span>
				<span class="color color4"></span>
				<span class="color color5"></span>
				<span class="color color6"></span>
			</div>
		<span class="text-bar">Baja transparencia</span>
    </div>
</div>

<div id="indice-nacional">
	<div id="indice-nacional-content">
		<h3>&Iacute;ndice Rep&uacute;blica Mexicana</h3><span class="close">Cerrar</span><span class="more">Abrir</span>
		<img src="<?php print $this->themePath; ?>/css/images/nacional.png" class="indice-icon" alt="Nacional" />
	</div>
</div>

<div id="indice-estatal">
	<div id="indice-estatal-content">
		<h3>&Iacute;ndice por Estado</h3><span class="more">Abrir</span><span class="close">Cerrar</span>
		<img src="<?php print $this->themePath; ?>/css/images/estado.png" class="indice-icon" alt="Estado" />
	</div>
</div>

<div id="results-nacional">
	<div id="results-nacional-content">
		<div id="top-resutls">
			<a id="button-download-nacional" class="button-download" href="/" title="Descargar PDF del indice del estado"><span>Descargar PDF</span></a>
		</div>
				
			<div class="clear"></div>
				
			<div id="resultados-estado">
				<div id="desc-estado">
					<div id="nname-estado">Nacional</div>
					<div class="estado img-estados">
						<?php include 'svg.php'; ?>
					</div>
				</div>
				
				<div id="indice-estado">
					<div id="indice-pro">
						<div class="name">&Iacute;ndice progresivo</div>
						<div class="clear"></div>
						<div class="circle"><span id="niprogresivo">6.0</span></div>
					</div>
					
					<div id="indice-base">
						<div class="name">&Iacute;ndice base</div>
						<div class="clear"></div>
						<div class="circle"><span id="nibase">6.9</span></div>
					</div>
				</div>
			</div>
		
		
		<div class="clear"></div>
		
		<section class="tabs">
			<input id="ntab-1" type="radio" name="nradio-set" class="tab-selector-1" checked="checked" />
			<label for="ntab-1" class="tab-label-1">Base</label>

			<input id="ntab-2" type="radio" name="nradio-set" class="tab-selector-2" />
			<label for="ntab-2" class="tab-label-2">Progresivo</label>
			
			<div class="clear"></div>
			
			<div id="burbujas">
				<div id="npro-chart">
					<div id="nchart">
						 <script src="<?php print $this->themePath; ?>/js/pack.js"></script>
					</div>
				</div>
				<div id="nbase-chart">
					<div id="nchart2">
						 <script src="<?php print $this->themePath; ?>/js/pack2.js"></script>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<div class="clear"></div>

<div id="results-estatal">
	<div id="results-estatal-content">
		<div id="top-resutls">
			<a id="button-download"  class="button-download" href="/" title="Descargar PDF del indice del estado"><span>Descargar PDF</span></a>
			
			<div id="form-estados">
				<div class="loading"></div>
				<a class="button-seek" href="/" title="Buscar por estado">
					<span>Buscar</span>
				</a>
				<?php $estado = segment(1);?>
				<?php echo ($estado==false) ? '<input id="showes" name="showes" value="0" type="hidden" />' : '<input type="hidden" id="showes" name="showes" value="1" />' ?>
				<select id="estados" name="estados">
					<option value="Aguascalientes" <?php echo ($estado=="Aguascalientes") ? 'selected="selected"' : "";?>>Aguascalientes</option>
					<option value="BC" <?php echo ($estado=="BC") ? 'selected="selected"' : "";?>>Baja California</option>
					<option value="BCS" <?php echo ($estado=="BCS") ? 'selected="selected"' : "";?>>Baja California Sur</option>
					<option value="Campeche" <?php echo ($estado=="Campeche") ? 'selected="selected"' : "";?>>Campeche</option>
					<option value="Chiapas" <?php echo ($estado=="Chiapas") ? 'selected="selected"' : "";?>>Chiapas</option>
					<option value="Chihuahua" <?php echo ($estado=="Chihuahua") ? 'selected="selected"' : "";?>>Chihuahua</option>
					<option value="Coahuila" <?php echo ($estado=="Coahuila") ? 'selected="selected"' : "";?>>Coahuila</option>
					<option value="Colima" <?php echo ($estado=="Colima") ? 'selected="selected"' : "";?>>Colima</option>
					<option value="DF" <?php echo ($estado=="DF") ? 'selected="selected"' : "";?>>Distrito Federal</option>
					<option value="Durango" <?php echo ($estado=="Durango") ? 'selected="selected"' : "";?>>Durango</option>
					<option value="Mexico" <?php echo ($estado=="Mexico") ? 'selected="selected"' : "";?>>M&eacute;xico</option>
					<option value="Guanajuato" <?php echo ($estado=="Guanajuato") ? 'selected="selected"' : "";?>>Guanajuato</option>
					<option value="Guerrero" <?php echo ($estado=="Guerrero") ? 'selected="selected"' : "";?>>Guerrero</option>
					<option value="Hidalgo" <?php echo ($estado=="Hidalgo") ? 'selected="selected"' : "";?>>Hidalgo</option>
					<option value="Jalisco" <?php echo ($estado=="Jalisco") ? 'selected="selected"' : "";?>>Jalisco</option>
					<option value="Michoacan" <?php echo ($estado=="Michoacan") ? 'selected="selected"' : "";?>>Michoac&aacute;n</option>
					<option value="Morelos" <?php echo ($estado=="Morelos") ? 'selected="selected"' : "";?>>Morelos</option>
					<option value="Nayarit" <?php echo ($estado=="Nayarit") ? 'selected="selected"' : "";?>>Nayarit</option>
					<option value="NL" <?php echo ($estado=="NL") ? 'selected="selected"' : "";?>>Nuevo Le&oacute;n</option>
					<option value="Oaxaca" <?php echo ($estado=="Oaxaca") ? 'selected="selected"' : "";?>>Oaxaca</option>
					<option value="Puebla" <?php echo ($estado=="Puebla") ? 'selected="selected"' : "";?>>Puebla</option>
					<option value="Queretaro" <?php echo ($estado=="Queretaro") ? 'selected="selected"' : "";?>>Quer&eacute;taro</option>
					<option value="QR" <?php echo ($estado=="QR") ? 'selected="selected"' : "";?>>Quintana Roo</option>
					<option value="SLP" <?php echo ($estado=="SLP") ? 'selected="selected"' : "";?>>San Luis Potos&iacute;</option>
					<option value="Sinaloa" <?php echo ($estado=="Sinaloa") ? 'selected="selected"' : "";?>>Sinaloa</option>
					<option value="Sonora" <?php echo ($estado=="Sonora") ? 'selected="selected"' : "";?>>Sonora</option>
					<option value="Tabasco" <?php echo ($estado=="Tabasco") ? 'selected="selected"' : "";?>>Tabasco</option>
					<option value="Tamaulipas" <?php echo ($estado=="Tamaulipas") ? 'selected="selected"' : "";?>>Tamaulipas</option>
					<option value="Tlaxcala" <?php echo ($estado=="Tlaxcala") ? 'selected="selected"' : "";?>>Tlaxcala</option>
					<option value="Veracruz" <?php echo ($estado=="Veracruz") ? 'selected="selected"' : "";?>>Veracruz</option>
					<option value="Yucatan" <?php echo ($estado=="Yucatan") ? 'selected="selected"' : "";?>>Yucat&aacute;n</option>
					<option value="Zacatecas" <?php echo ($estado=="Zacatecas") ? 'selected="selected"' : "";?>>Zacatecas</option>
					<option value="Federal" <?php echo ($estado=="Federal") ? 'selected="selected"' : "";?>>Federal</option>
				</select>
			</div>
				
			<div class="clear"></div>
				
			<div id="resultados-estado">
				<div id="desc-estado">
					<div id="name-estado"></div>
					<div id="mapa" class="estado img-estados">
						<div id="img-estado" class=""></div>
					</div>
				</div>
				
				<div id="indice-estado">
					<div id="indice-pro">
						<div class="name">&Iacute;ndice progresivo</div>
						<div class="clear"></div>
						<div class="circle"><span id="iprogresivo"></span></div>
					</div>
					
					<div id="indice-base">
						<div class="name">&Iacute;ndice base</div>
						<div class="clear"></div>
						<div class="circle"><span id="ibase"></span></div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="clear"></div>
		<section class="tabs">
			<input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
			<label for="tab-1" class="tab-label-1">Base</label>

			<input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
			<label for="tab-2" class="tab-label-2">Progresivo</label>
			
			<div class="clear"></div>
			
			<div id="burbujas">
				<div id="pro-chart">
					<div id="chart"></div>
				</div>
				
				<div id="base-chart">
					<div id="chart2"></div>
				</div>
			</div>
		</section>
	</div>
</div>
