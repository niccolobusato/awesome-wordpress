Modificare il file 404.php con:


### Verso la home page

```php
<?php
header("HTTP/1.1 301 Moved Permanently");
header("Location: ".get_bloginfo('url'));
exit();
?>
```


### Pagina Specifica

```php
<?php
wp_redirect( 'URL-DESTINAZIONE', 301 );
exit();
?>
```
