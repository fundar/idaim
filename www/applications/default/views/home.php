<div id="message">
	<div id="message-content">
		<h2>"El IDAIM mide la calidad de las leyes de transparencia de los Estados
en relaci&oacute;n al artículo 6° Constitucional y a las mejores pr&aacute;cticas en la materia."</h2>
		<div class="clear"></div>
		<a href="<?php echo get("webURL") . "/docs/docto_ranking.pdf";?>" title="Descarga el ranking final"   class="downloads ranking-download">Descarga el ranking final</a>
		<a href="<?php echo get("webURL") . "/docs/docto_basededatos.pdf";?>" title="Descarga la base de datos del IDAIM" class="downloads indice-download">Descarga la base de datos del IDAIM</a>
	</div>
</div>

<div id="results-graph">
	<div id="results-graph-content">
		<div id="buttons-ranking">
			<h2>Ranking general de las entidades</h2>
			<div class="clear"></div>
			<div id="rk-but-base" class="button-active"><span>&Iacute;ndice base</span></div>
			<div class="clear"></div>
			<div id="rk-but-pro"  class="button-inactive"><span>&Iacute;ndice progresivo</span></div>
		</div>
		
		<div id="container-r"></div>
		
		<div id="container-result">
			<div id="cont-bar">
				<span class="text-bar">Alta transparencia</span>
					<div id="bar-colors">
						<span class="color color1"></span>
						<span class="color color2"></span>
						<span class="color color3"></span>
						<span class="color color4"></span>
						<span class="color color5"></span>
					</div>
				<span class="text-bar">Baja transparencia</span>
			</div>
			
			<div id="interval-rank"></div>
			<div id="rank-estados"></div>
		</div>
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
			<a id="button-download-nacional" class="button-download" href="/" title="Descargar Ficha Nacional">
				<span>Descargar Ficha</span>
			</a>
			
			<a id="button-download-nacional-des" class="button-download-des" href="/" title="Descargar evaluación desagregada">
				<span>Descargar evaluaci&oacute;n desagregada</span>
			</a>
		</div>
				
			<div class="clear"></div>
				
			<div id="resultados-estado">
				<div id="desc-estado">
					<div id="nname-estado">Nacional</div>
					<div id="mapan" class="estado img-estados">
						
					</div>
				</div>
				
				<div id="indice-estado">
					<div id="indice-pro">
						<div class="name">&Iacute;ndice progresivo</div>
						<div class="clear"></div>
						<div class="circlen"><span id="niprogresivo">6.1</span></div>
					</div>
					
					<div id="indice-base">
						<div class="name">&Iacute;ndice base</div>
						<div class="clear"></div>
						<div class="circlen"><span id="nibase">7.1</span></div>
					</div>
				</div>
			</div>
		
		
		<div class="clear"></div>

		<div id="burbujas">
			<div id="buttons">
				<div id="button-base-n" class="button-active"><span>&Iacute;ndice base</span></div>
				<div id="button-pro-n"  class="button-inactive"><span>&Iacute;ndice progresivo</span></div>
			</div>
			
			<div id="npro-chart">
				<div id="nchart"></div>
				
				<div id="info-pro">
					<div id="value-pron">
						<span></span>
					</div>
					
					<div class="clear"></div>
					
					<div id="value-namepn"></div>
				</div>
			</div>
			
			<div id="nbase-chart">
				<div id="nchart2"></div>
				
				<div id="info-base">
					<div id="value-basen">
						<span></span>
					</div>
					
					<div class="clear"></div>
					
					<div id="value-namen"></div>
				</div>
			</div>
			
			<div class="clear"></div>
			
			<div id="buttons-more">
				<a href="<?php echo get("webURL") . "/docs/docto_metodologia.pdf";?>" title="Metodología">Metodolog&iacute;a</a>
				<a href="<?php echo get("webURL") . "/docs/docto_guiadeinterpretacion.pdf";?>" title="Guía de interpretación">Gu&iacute;a de interpretaci&oacute;n</a>
			</div>
		</div>
	</div>
</div>

<div class="clear"></div>

<div id="results-estatal">
	<div id="results-estatal-content">
		<div id="top-resutls">
			<a id="button-download"  class="button-download" href="/" title="Descargar Ficha del estado">
				<span>Descargar Ficha</span>
			</a>
			
			<a id="button-download-des" class="button-download-des" href="/" title="Descargar evaluación desagregada">
				<span>Descargar evaluaci&oacute;n desagregada</span>
			</a>
			
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

		<div id="burbujas">
			<div id="buttons">
				<div id="button-base" class="button-active"><span>&Iacute;ndice base</span></div>
				<div id="button-pro"  class="button-inactive"><span>&Iacute;ndice progresivo</span></div>
			</div>
			<div id="pro-chart">
				<div id="chart"></div>
				
				<div id="info-pro">
					<div id="value-pro">
						<span></span>
					</div>
					
					<div class="clear"></div>
					
					<div id="value-namep"></div>
				</div>
			</div>
			
			<div id="base-chart">
				<div id="chart2"></div>
				
				<div id="info-base">
					<div id="value-base">
						<span></span>
					</div>
					
					<div class="clear"></div>
					
					<div id="value-name"></div>
				</div>
			</div>
			
			<div class="clear"></div>
			
			<div id="buttons-more">
				<a href="<?php echo get("webURL") . "/docs/docto_metodologia.pdf";?>" title="Metodología">Metodolog&iacute;a</a>
				<a href="<?php echo get("webURL") . "/docs/docto_guiadeinterpretacion.pdf";?>" title="Guía de interpretación">Gu&iacute;a de interpretaci&oacute;n</a>
			</div>
		</div>
	</div>
</div>
