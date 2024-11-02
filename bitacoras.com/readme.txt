=== Plugin oficial de Bitacoras.com ===
Contributors: bitacoras.com
Tags: top, ranking, tag
Requires at least: 2.7.0
Tested up to: 2.7.1
Stable Tag: 1.3.2

Plugin oficial de Bitacoras.com que reune en un unico plugin todos los widgets para WordPress de Bitacoras.com

== Description ==

<p>Nuestro plugin añade funciones específicas para poder integrar nuestros widgets
de forma fácil. A continuación se detallan las funciones, que deberéis añadir
en vuestras plantillas. Todas las funciones <strong>muestran</strong> el HTML,
pero si se indica como último parametro <em>FALSE</em> devolverán el HTML sin mostrarlo.</p>

<h2>agregador_bitacoras_com()</h2>
<p>Genera el código HTML de los <a href="http://bitacoras.com/widgets/agregador">botones del agregador</a>,
para integrar las imágenes en las anotaciones. Recibe un parámetro:</p>

<ul>
	<li><strong>$tipo</strong>: tipo de botón (big, normal, mini, mini2 o favicon)</li>
</ul>

<h2>top_bitacoras_com()</h2>
<p>Genera el código HTML de la imagen del <a href="http://bitacoras.com/widgets/top/bitacoras">TOP Bitacoras</a>,
Recibe dos parámetros:</p>

<ul>
	<li><strong>$tipo</strong>: tipo de botón (grande, peq-azul, peq-rojo, peq-lila, peq-gris, peq-verde, peq-naranja,
	med-azul, med-rojo, med-lila, med-gris, med-verde o med-naranja)</li>
	<li><strong>$geo</strong>: opcional, código ISO en caso de querer la posición por país
</li></ul>

<h2>ficha_en_bitacoras_com()</h2>
<p>Genera el código HTML la imagen del <a href="http://bitacoras.com/widgets/enlazate">widget Enlázate</a>,
que enlaza <strong>la ficha de tu bitácora en Bitacoras.com</strong>. Recibe un parámetro:</p>

<ul>
	<li><strong>$tipo</strong>: tipo de botón (1 o 2)</li>
</ul>

<h2>referencias_en_bitacoras_com()</h2>
<p>Genera el código HTML la imagen del <a href="http://bitacoras.com/widgets/referencias">widget Referencias</a>,
que enlaza la <strong>búsqueda de referencias a tu blog en Bitacoras.com</strong>. Recibe un parámetro:</p>

<ul>
	<li><strong>$tipo</strong>: tipo de botón (1 o 2)</li>
</ul>

<h2>perfil_en_bitacoras_com()</h2>
<p>Genera el código HTML la imagen del <a href="http://bitacoras.com/widgets/enlazate">widget Enlázate</a>,
que enlaza <strong>la ficha de tu bitácora en Bitacoras.com</strong>. Recibe un parámetro.</p>

<ul>
	<li><strong>$alias</strong>: tu nombre de usuario en Bitacoras.com</li>
	<li><strong>$tipo</strong>: tipo de botón (1 o 2)</li>
</ul>

<h2>buscador_en_bitacoras_com()</h2>
<p>Genera el código HTML del <a href="http://bitacoras.com/widgets/buscador/contenidos">widget Buscador</a>,
que crea una <strong>caja de búsqueda de contenidos en Bitacoras.com</strong>. No recibe ningún parámetro:</p>

<h2>feedeliza()</h2>
<p>Genera el código HTML para integrar <a href="http://bitacoras.com/widgets/feedeliza">Feedeliza</a>.
No recibe ningún parámetro, ya que la configuración se realiza a través del panel de control,
en <strong><em>Plugins » Feedeliza</em></strong></p>


== Installation ==

To install, simple extract the ZIP into your 'wp-content/plugins/' directory.
Once extracted, you must activate the plugin within the WordPress Site Admin 'Plugins' section
