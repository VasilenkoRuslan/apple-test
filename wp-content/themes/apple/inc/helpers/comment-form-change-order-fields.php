<?php
function apple_change_all_fields_order( $comment_fields ) {
//	print_r( $comment_fields );
// правила сортировки
$order = array( 'author', 'email', 'url', 'cookies', 'comment' );

// новый массив с изменённым порядком
$new_fields = array();

foreach( $order as $index ) {
$new_fields[$index] = $comment_fields[$index];
}

return $new_fields;

}
add_action( 'comment_form_fields', 'apple_change_all_fields_order', 25 );
