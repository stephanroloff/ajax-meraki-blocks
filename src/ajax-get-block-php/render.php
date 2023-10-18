<?php
/**
 * Example Dynamic Block
 *
 * @package Meraki\Blocks\Dynamic
 *
 * @var array    $attributes         Block attributes.
 * @var string   $content            Block content.
 * @var WP_Block $block              Block instance.
 * @var array    $context            Block context.
 */

$wrapper_attributes = get_block_wrapper_attributes();

?>
<div <?php echo $wrapper_attributes?>>
    <p>THIS an Ajax GET Block PHP Block!</p>
    <p>Attribute: <?php echo $attributes['amountSelected']?></p>
    <button id="cargar-api">Cargar Datos desde API</button>
    <div id="resultado-carga"></div>

</div>
    

