// aggiungere informazioni bonifico su pagina di conferma solo per bonifico
add_action( 'woocommerce_thankyou', 'infobonifico', 8,1 );
 
function infobonifico( $order_id ) {
	
	if ('woocommerce_thankyou_COD') {
 
 	echo '<h5>Hai pagato con bonifico?</h5>
    <p><strong>Effettua il bonifico ora!</strong><br>
	Nome azienda:<br>
		Banca: <br>
		Codice filiale: <br>
		IBAN: <br>
		BIC: </p><br>';
 
}}
