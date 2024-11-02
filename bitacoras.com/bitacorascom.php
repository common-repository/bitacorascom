<?php
/*
Plugin Name: Plugin oficial de Bitacoras.com
Plugin URI: http://bitacoras.com/widgets/wordpress
Description: Integra todos los widgets y servicios disponibles para WordPress en <a href="http://bitacoras.com">Bitacoras.com</a>
Author: Bitacoras.com
Version: 1.3.2
Author URI: http://bitacoras.com
*/

/*  This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

/**
 * Genera el codigo HTML de los botones del Agregador de Bitacoras.com
 * Es compatible con el plugin "Agregador de Bitacoras.com"
 *
 * @see		http://bitacoras.com/widgets/agregador
 * @param	string	$tipo		tipo de boton: big, normal, mini, mini2 o favicon
 * @param	bool	$return		indica si deve devolverse el HTML en vez de mostrarlo
 * @return	string
 */
if(!function_exists('agregador_bitacoras_com'))
	{
	function agregador_bitacoras_com($tipo = 'normal', $return = false)
		{
		// evitamos uso incorrecto de parametros
		$tipo = in_array($tipo, array('mini', 'mini2', 'big'))? $tipo : 'normal';

		// obtiene el permalink de la anotacion
		$permalink = preg_replace('/^https?:\/\//', '', get_permalink());

		// genera el HTML
		if ($tipo == 'favicon') $html = '<a href="http://bitacoras.com/anotaciones/'.$permalink.'" title="Votar Anotacion en Bitacoras.com"><img src="http://static2.bitacoras.com/images/agregador/bitacorascom16x16.gif" alt="Votar" style="vertical-align:middle;border:0" /></a>';
		$html = '<a href="http://bitacoras.com/anotaciones/'.$permalink.'"><img src="http://widgets.bitacoras.com/votar/'.$tipo.'/'.$permalink.'" alt="votar" title="Votar esta anotacion en Bitacoras.com" style="vertical-align:middle;border:0" /></a>';

		// muestra o devuelve segun se haya indicado
		if($return) return $html;
		else echo $html;
		}
	}

/**
 * Genera el codigo HTML de la imagen del TOP Bitacoras.com para esta bitacora
 *
 * @see		http://bitacoras.com/widgets/agregador
 * @param	string	$tipo		tipo de boton
 * @param	string	$iso		codigo ISO de dos caracteres del pais
 * @param	bool	$return		indica si deve devolverse el HTML en vez de mostrarlo
 * @return	string
 */
if(!function_exists('top_bitacoras_com'))
	{
	function top_bitacoras_com($tipo = 'peq-azul', $geo = false, $return = false)
		{
		// comprueba el tipo de boton para evitar parametros incorrectos
		if(!preg_match('/^(peq|med)\-(azul|rojo|lila|gris|verde|naranja)$/', $tipo) && $tipo != 'grande') $tipo = 'peq-azul';

		// genera el modo: general o por pais
		$modo = ($geo != false && strlen($geo) == 2) ? ('geo-' . strtolower($geo)) : 'general';

		// genera el HTML
		$url = preg_replace('/^https?:\/\//', '', get_option('home'));
		$html = '<a href="http://bitacoras.com/top/bitacoras" title="Blog indexado en Bitacoras.com"><img src="http://bitacoras.com/top/bitacoras/boton/' . $modo . '/' . $tipo . '/' . $url . '" border="0" alt="TOP Bitacoras.com" /></a>';

		// muestra o devuelve segun se haya indicado
		if($return) return $html;
		else echo $html;
		}
	}

/**
 * Genera el codigo HTML de la imagen para enlazar la ficha de esta bitacora en Bitacoras.com
 *
 * @see		http://bitacoras.com/widgets/enlazate
 * @param	string	$tipo	tipo de boton: 1 o 2 (bordes redondos o bordes cuadrados)
 * @param	bool	$return		indica si deve devolverse el HTML en vez de mostrarlo
 * @return	string
 */
if(!function_exists('ficha_en_bitacoras_com'))
	{
	function ficha_en_bitacoras_com($tipo = '1', $return = false)
		{
		// comprueba el tipo de imagen
		$tipo = ((string) $tipo == '2') ? 'ficha2' : 'ficha';

		// genera el HTML
		$url = preg_replace('/^https?:\/\//', '', get_option('home'));
		$html = '<a href="http://bitacoras.com/bitacora/' . $url . '" title="Blog indexado en Bitacoras.com"><img src="http://static2.bitacoras.com/images/badges/' . $tipo . '.png" border="0" alt="Bitacoras.com" /></a>';

		// muestra o devuelve segun se haya indicado
		if($return) return $html;
		else echo $html;
		}
	}

/**
 * Genera el codigo HTML de la imagen para buscar referencias en Bitacoras.com
 *
 * @see		http://bitacoras.com/widgets/enlazate
 * @param	string	$tipo	tipo de boton: 1 o 2 (bordes redondos o bordes cuadrados)
 * @param	bool	$blog	indica si se deben buscar referencias al blog en vez de a la anotacion actual
 * @param	bool	$return		indica si deve devolverse el HTML en vez de mostrarlo
 * @return	string
 */
if(!function_exists('referencias_en_bitacoras_com'))
	{
	function referencias_en_bitacoras_com($tipo = '1', $blog = false, $return = false)
		{
		// comprueba el tipo de imagen
		$tipo = ((string) $tipo == '2') ? 'favicon16x16' : 'bitacoras14x14';

		// genera el HTML
		$url = ($blog == false) ? get_permalink() : get_option('home');
		$url = preg_replace('/^https?:\/\//', '', $url);
		$html = '<a href="http://bitacoras.com/buscar/' . $url . '" title="Buscar referencias en Bitacoras.com"><img src="http://static2.bitacoras.com/images/referencias/' . $tipo . '.png" alt="Bitacoras.com" /></a>';

		// muestra o devuelve segun se haya indicado
		if($return) return $html;
		else echo $html;
		}
	}

/**
 * Genera el codigo HTML de la imagen para enlazar el perfil de un usuario en Bitacoras.com
 *
 * @see		http://bitacoras.com/widgets/enlazate
 * @param	string	$alias	alias del usuario en Bitacoras.com
 * @param	string	$tipo	tipo de boton: 1 o 2 (bordes redondos o bordes cuadrados)
 * @param	bool	$return		indica si deve devolverse el HTML en vez de mostrarlo
 * @return	string
 */
if(!function_exists('perfil_en_bitacoras_com'))
	{
	function perfil_en_bitacoras_com($alias, $tipo = '1', $return = false)
		{
		// comprueba el tipo de imagen
		$tipo = ((string) $tipo == '2') ? 'perfil2' : 'perfil';

		// genera el HTML
		$html = '<a href="http://bitacoras.com/usuario/' . $alias . '" title="Mi perfil en la Red Social Bitacoras.com"><img src="http://static2.bitacoras.com/images/badges/' . $tipo . '.png" border="0" alt="Bitacoras.com" /></a>';

		// muestra o devuelve segun se haya indicado
		if($return) return $html;
		else echo $html;
		}
	}

/**
 * Genera el codigo HTML del buscador en Bitacoras.com
 *
 * @see		http://bitacoras.com/widgets/buscador/contenidos
 * @param	bool	$return		indica si deve devolverse el HTML en vez de mostrarlo
 * @return	string
 */
if(!function_exists('buscador_en_bitacoras_com'))
	{
	function buscador_en_bitacoras_com($return = false)
		{
		// genera el HTML
		$html = '<script type="text/javascript" src="http://bitacoras.com/scripts/buscador.js"></script>';

		// muestra o devuelve segun se haya indicado
		if($return) return $html;
		else echo $html;
		}
	}

/**
 * Genera el codigo HTML de Feedeliza, tomando los parametros de la configuracion
 *
 * @see		http://bitacoras.com/widgets/feedeliza
 * @param	bool	$return		indica si deve devolverse el HTML en vez de mostrarlo
 * @return	string
 */
if(!function_exists('feedeliza'))
	{
	function feedeliza($return = false) {
		$url = 'http://bitacoras.com/feedeliza';
		$val = get_option('bitscom_social_busqueda');
		if ($val != '') {
		  $url .= '/busqueda/'.$val;
		} else {
		  $val = get_option('bitscom_social_canal');
		  if ($val != '') {
			$url .= '/canal/'.$val;
		  } else {
			$val = get_option('bitscom_social_micomunidad');
			if ($val != '') {
			  $url .= '/micomunidad/'.$val;
			} else {
			  $val = get_option('bitscom_social_usuario');
			  if ($val != '') {
				$url .= '/usuario/'.$val;
			  } else {
				$val = get_option('bitscom_social_pais');
				$url .= '/geo/'.$val;
				$val = get_option('bitscom_social_ciudad');
				if ($val != '') {
				  $url .= '/ciudad/'.$val;
				}
			  }
			}
		  }
		}
		$params = '';
		$val = get_option('bitscom_social_elementos');
		if ($val != '') {
		  $params .= '/elementos/'.$val;
		}
		$val = get_option('bitscom_social_ancho');
		if ($val != '') {
		  $params .= '/ancho/'.$val;
		}
		$val = get_option('bitscom_social_blog');
		if ($val != '') {
		  $params .= '/blog/'.$val;
		}
		$val = get_option('bitscom_social_fondo');
		if ($val != '') {
		  $params .= '/fondo/'.$val;
		}
		$val = get_option('bitscom_social_titulo');
		if ($val != '') {
		  $params .= '/titulo/'.$val;
		}
		$val = get_option('bitscom_social_texto');
		if ($val != '') {
		  $params .= '/texto/'.$val;
		}
		$val = get_option('bitscom_social_enlaces');
		if ($val != '') {
		  $params .= '/enlaces/'.$val;
		}

		$html = '<script src="'.$url.$params.'" type="text/javascript" charset="utf-8"></script>';

		// muestra o devuelve segun se haya indicado
		if($return) return $html;
		else echo $html;
	}

	function bitacoras_com_write_plugin_submenu() {

		if (isset($_POST["bitacoras_com_form"])) {
			check_admin_referer('bitacoras_com_feedeliza_plugin');
			bitacoras_com_setup_feedeliza_plugin();
		}

	  $numelem = array(1,2,3,4,5);

	  $paises = array();
	  $paises['ar'] = 'Argentina';
	  $paises['bo'] = 'Bolivia';
	  $paises['ch'] = 'Chile';
	  $paises['co'] = 'Colombia';
	  $paises['cr'] = 'Costa Rica';
	  $paises['cu'] = 'Cuba';
	  $paises['ec'] = 'Ecuador';
	  $paises['us'] = 'EE.UU.';
	  $paises['sv'] = 'El Salvador';

	  $paises['es'] = 'Espa&ntilde;a';
	  $paises['gt'] = 'Guatemala';
	  $paises['hn'] = 'Honduras';
	  $paises['mx'] = 'Mexico';
	  $paises['ni'] = 'Nicaragua';
	  $paises['pa'] = 'Panama';
	  $paises['py'] = 'Paraguay';
	  $paises['pe'] = 'Peru';
	  $paises['pt'] = 'Portugal';

	  $paises['pr'] = 'Puerto Rico';
	  $paises['do'] = 'Republica Dominicana';
	  $paises['uy'] = 'Uruguay';
	  $paises['ve'] = 'Venezuela';


		?>
		<style type="text/css">
		 label {display: block;}
		 small {padding: 0px 5px; color: #666;}
		 .left {float: left; padding: 0px 20px 0px 0px;}
		 .clear {clear: both;}
		 .block {width: 300px; }
		</style>
		<div class="wrap">
			<h2>Feedeliza con Bitacoras.com</h2>
			<fieldset class="options">
				<div>
				<form name="form" method="post">
				<input type="hidden" name="bitacoras_com_form" value="1" />
				<div class="block left">
				<h3>Busqueda</h3>
					  <p>Indica una busqueda en Bitacoras.com para que se puedan a&ntilde;adir los ultimos posts que coincidan con los terminos.</p>
					<fieldset>
				<label for="bitscom_social_busqueda">Terminos <small>Fernando Alonso</small></label>
					<input type="text" class="text" name="bitscom_social_busqueda" id="bitscom_social_busqueda" value="<?php echo (get_option("bitscom_social_busqueda") != "")? get_option("bitscom_social_busqueda"): ''; ?>" />
					</fieldset>
		  </div>
				<div class="block left">
				<h3>Canal</h3>
					  <p>Indica un canal o canales para mostrar las ultimas entradas. Podran ser los que desees, separadas por espacios.</p>
					<fieldset>
				<label for="bitscom_social_canal">Canal <small>tecnologia internet</small></label>
					<input type="text" class="text" name="bitscom_social_canal" id="bitscom_social_canal" value="<?php echo (get_option("bitscom_social_canal") != "")? get_option("bitscom_social_canal"): ''; ?>" />
					</fieldset>
		  </div>
				<div class="block left">
				<h3>Mi comunidad</h3>
					  <p>Indica cual es tu usuario para que se puedan a&ntilde;adir los ultimos posts de tu comunidad.</p>
					<fieldset>
				<label for="bitscom_social_micomunidad">Alias <small>http://bitacoras.com/usuario/<em>[alias]</em></small></label>
					<input type="text" class="text" name="bitscom_social_micomunidad" id="bitscom_social_micomunidad" value="<?php echo (get_option("bitscom_social_micomunidad") != "")? get_option("bitscom_social_micomunidad"): ''; ?>" />
					</fieldset>
		  </div>
				<div class="block left">
				<h3>Usuario</h3>
					  <p>Indica cual es tu usuario para que se puedan a&ntilde;adir los ultimos posts de tus blogs registrados en Bitacoras.com.</p>
					<fieldset>
				<label for="bitscom_social_usuario">Alias <small>http://bitacoras.com/usuario/<em>[alias]</em></small></label>
					<input type="text" class="text" name="bitscom_social_usuario" id="bitscom_social_usuario" value="<?php echo (get_option("bitscom_social_usuario") != "")? get_option("bitscom_social_usuario"): ''; ?>" />
					</fieldset>
		  </div>
				<div class="block left">
				<h3>Geo</h3>
	<p>Selecciona un pais e indica una ciudad (opcional) para poder a&ntilde;adir las ultimas entradas de esa localizacion.</p>
					<fieldset>
							<label for="bitscom_social_ciudad">Ciudad</label>
						<input type="text" class="text" name="bitscom_social_ciudad" id="bitscom_social_ciudad" value="<?php echo (get_option("bitscom_social_ciudad") != "")? get_option("bitscom_social_ciudad"): ''; ?>" />
							<label for="bitscom_social_pais">Pais</label>
							<select name="bitscom_social_pais">
	<?php
	  $bitscom_social_pais = get_option('bitscom_social_pais');
	  foreach ($paises as $pais=>$nombre) {
		echo '<option value="'.$pais.'" '.($pais == $bitscom_social_pais?' selected="selected" ':'').'>'.$nombre.'</option>';
	  }
	?>
					  </select><br />
					</fieldset>
		  </div>
		  <div class="clear"></div>
			  <p><small>Debera indicar el apartado Geo, Mi comunidad, Usuario, Busqueda o Canal.</small></p>
						<div class="clear"></div>
					  <h3>Colores</h3>
					<fieldset>
					  <div class="left">
				<label for="bitscom_social_blog">Enlace al blog <small>por defecto 666</small> </label>
						<input type="text" class="text" name="bitscom_social_blog" id="bitscom_social_blog" size="6" value="<?php echo (get_option("bitscom_social_blog") != "")? get_option("bitscom_social_blog"): ''; ?>" />
				  <label for="bitscom_social_fondo">Fondo <small>por defecto 333</small> </label>
						<input type="text" class="text" name="bitscom_social_fondo" id="bitscom_social_fondo" size="6" value="<?php echo (get_option("bitscom_social_fondo") != "")? get_option("bitscom_social_fondo"): ''; ?>" />
				  <label for="bitscom_social_texto">Texto <small>por defecto CCC</small> </label>
						<input type="text" class="text" name="bitscom_social_texto" id="bitscom_social_texto" size="6" value="<?php echo (get_option("bitscom_social_texto") != "")? get_option("bitscom_social_texto"): ''; ?>" />
				</div>
					  <div class="left">
				  <label for="bitscom_social_titulo">Titulo <small>por defecto FFF</small> </label>
						<input type="text" class="text" name="bitscom_social_titulo" id="bitscom_social_titulo" size="6" value="<?php echo (get_option("bitscom_social_titulo") != "")? get_option("bitscom_social_titulo"): ''; ?>" />
				  <label for="bitscom_social_enlaces">Enlaces <small>por defecto FC9800</small> </label>
						<input type="text" class="text" name="bitscom_social_enlaces" id="bitscom_social_enlaces" size="6" value="<?php echo (get_option("bitscom_social_enlaces") != "")? get_option("bitscom_social_enlaces"): ''; ?>" />
				</div>
				<div class="clear"></div>
					  <h3>Otros</h3>
					<fieldset>
				<label for="bitscom_social_elementos">Nº de elementos <small>max. 5</small></label>
				<select name="bitscom_social_elementos" id="bitscom_social_elementos">
	<?php
	  $bitscom_social_elementos = get_option('bitscom_social_elementos');
	  foreach ($numelem as $val) {
		echo '<option value="'.$val.'" '.($val == $bitscom_social_elementos?' selected="selected" ':'').'>'.$val.'</option>';
	  }
	?>
				</select>
				<label for="bitscom_social_ancho">Ancho <small>en pixels (ej. 300)</small></label>
					<input type="text" class="text" name="bitscom_social_ancho" id="bitscom_social_ancho" size="6" value="<?php echo (get_option("bitscom_social_ancho") != "")? get_option("bitscom_social_ancho"): ''; ?>" />
					</fieldset>
					</fieldset>
				<p class="submit"><input type="submit" name="Update" value="Actualizar &raquo;" />
				<?php wp_nonce_field('bitacoras_com_feedeliza_plugin'); ?>
				</p>
			</fieldset>
		</div>
		<?php
	}

	function bitacoras_com_add_plugin_submenu() {
		if (function_exists('add_submenu_page')) {
			add_submenu_page('plugins.php', 'Feedeliza', 'Feedeliza', 1, __FILE__, 'bitacoras_com_write_plugin_submenu');
		}
	}
	function bitacoras_com_setup_feedeliza_plugin() {
		update_option("bitscom_social_ciudad", stripslashes(isset($_POST["bitscom_social_ciudad"])? $_POST["bitscom_social_ciudad"]: ''));
		update_option("bitscom_social_pais", stripslashes(isset($_POST["bitscom_social_pais"])? $_POST["bitscom_social_pais"]: ''));
		update_option("bitscom_social_canal", stripslashes(isset($_POST["bitscom_social_canal"])? $_POST["bitscom_social_canal"]: ''));
		update_option("bitscom_social_micomunidad", stripslashes(isset($_POST["bitscom_social_micomunidad"])? $_POST["bitscom_social_micomunidad"]: ''));
		update_option("bitscom_social_usuario", stripslashes(isset($_POST["bitscom_social_usuario"])? $_POST["bitscom_social_usuario"]: ''));
		update_option("bitscom_social_busqueda", stripslashes(isset($_POST["bitscom_social_busqueda"])? $_POST["bitscom_social_busqueda"]: ''));
		update_option("bitscom_social_blog", stripslashes(isset($_POST["bitscom_social_blog"])? $_POST["bitscom_social_blog"]: ''));
		update_option("bitscom_social_fondo", stripslashes(isset($_POST["bitscom_social_fondo"])? $_POST["bitscom_social_fondo"]: ''));
		update_option("bitscom_social_texto", stripslashes(isset($_POST["bitscom_social_texto"])? $_POST["bitscom_social_texto"]: ''));
		update_option("bitscom_social_titulo", stripslashes(isset($_POST["bitscom_social_titulo"])? $_POST["bitscom_social_titulo"]: ''));
		update_option("bitscom_social_enlaces", stripslashes(isset($_POST["bitscom_social_enlaces"])? $_POST["bitscom_social_enlaces"]: ''));
		update_option("bitscom_social_elementos", stripslashes(isset($_POST["bitscom_social_elementos"])? $_POST["bitscom_social_elementos"]: ''));
		update_option("bitscom_social_ancho", stripslashes(isset($_POST["bitscom_social_ancho"])? $_POST["bitscom_social_ancho"]: ''));
	}


	add_action('admin_menu', 'bitacoras_com_add_plugin_submenu');
	}