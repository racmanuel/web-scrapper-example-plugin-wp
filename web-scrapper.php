<?php
/**
 * Plugin Name:       Web Scrapper
 * Description:       Example of Web Scrapping using Simple HTML DOM in Wordpress with Shortcode. Use the Shortcode [scrapper].
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Manuel Ramírez Coronel
 * Author URI:        https://github.com/racmanuel
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

include_once 'simple_html_dom.php';

function web_scrapper(){

    /**
     * URL de Pruebas
     * 
     */
    $url = 'http://www.---.com/accesorios?sort=pd.name&order=ASC&limit=300';

    /**
     * Obtenemos con Simple HTML DOM la URL
     */
    $html = file_get_html($url);

    /**
     * Ciclo para Obtener el SKU del Producto
     * 
     * Usamos find() para selecionar el div del SKU; 
     */
    foreach($html->find('div[class=caption]>h5>a') as $sku_product){
        echo $sku_product->plaintext . '<br>';
    }
    /**
     * Ciclo para Obtener el Titulo del Producto
     * 
     * Usamos find() para selecionar el div del SKU; 
     */
    foreach($html->find('div[class=caption]>h4>a') as $title_product){
        echo $title_product->plaintext . '<br>';
    }
    /**
     * Ciclo para Obtener la imagen del Producto
     * 
     * Usamos find() para selecionar el div del SKU; 
     */
    foreach ($html->find('div[class=product-thumb]>div[class=image]>a>img') as $image_product) {
        ?>
        <img src="<?php echo $image_product->src ?>" alt="">
        <?php
    }
    ?>
<?php
}

add_shortcode( 'scrapper', 'web_scrapper' );