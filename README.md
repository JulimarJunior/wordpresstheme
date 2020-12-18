# Tema WordPress TPW

### Sobre
Tema para WordPress desenvolvido para ser utilizado pelo **TPW** em seu projeto e para estudos de programação.
> Design desenvolvido parcialmente por [ThePotatoWard](https://twitter.com/thepotatoward)

---

### Recursos
- [Bootstrap Grid 4.1.3](https://getbootstrap.com/docs/4.1/getting-started/introduction/)
- [WordPress 5.6](https://br.wordpress.org/download/)
- [jQuery 3.2.1](https://jquery.com/download/)
- [PHP 7.4.0](https://www.php.net/)
- [HTML 5](https://www.w3schools.com/html/default.asp)
- [CSS 3](https://www.w3schools.com/css/default.asp)
- [JavaScript](https://www.javascript.com/)

---

### Códigos
Alguns códigos do tema que são interessantes citar:

**Permite a adição de imagens em destaque nos artigos e edição direta de menus através do functions.php.**
```php
add_theme_support('post-thumbnails');
add_theme_support('menus');
```

**Cria de menu através do **functions.php** na ativação do tema.**

```php
// Verifica se a função já foi executada para evitar erros
if(!function_exists('theme_setup')) {
	function theme_setup() {
		// Define um nome para o menu
		$menu_name   = 'navbar-top';
		// Verifica se o menu já foi criado anteriormente
		$menu_exists = wp_get_nav_menu_object($menu_name);
		if(!$menu_exists) {
			// Cria o menu e salva seu ID
			$menu_id = wp_create_nav_menu($menu_name);
			// Adiciona item padrão ao menu criado
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title'   =>  __('Home', 'my-theme'),
				'menu-item-classes' => 'home',
				'menu-item-url'     => home_url( '/' ), 
				'menu-item-status'  => 'publish'
			));
		}
	}
}
// Adiciona a ação ao WordPress, executando a função após a configuração do tema
add_action('after_setup_theme', 'theme_setup');
```
*Agradecimentos: [Dimas A. Pante](https://www.facebook.com/dimaspante)*

**Cria um campo de edição do tema através do functions.php**
```php
// Cria a seção de edição na plataforma do WordPress
$wp_customize->add_section(
	'theme',
	array(
		'title' 	=> __('Theme', 'odin'),
		'priority' 	=> 201,
	)
);
// Cria um campo para inserção de imagem
$wp_customize->add_setting( 'logo' );
$wp_customize->add_control(
	new WP_Customize_Media_Control(
		$wp_customize,
		'logo',
		array(
			'label'     => __( 'Logo', 'odin' ),
			'section'   => 'theme',
			'mime_type' => 'image',
		)
	)
);
// Cria um campo de texto simples
$wp_customize->add_setting( 'display_name' );
$wp_customize->add_control(
	'display_name',
	array(
		'label' 	=> __('Display name', 'odin'),
		'section' 	=> 'theme',
	)
);
// Cria um campo de seleção de cor
$wp_customize->add_setting( 'primary_color' );
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_color',
		array(
			'label' 	=> __('Primary color', 'odin'),
			'section' 	=> 'theme',
			'mime_type' => 'color'
		)
	)
);
```
<p align="center">
    <img alt="Exemplo de edições" src="https://i.imgur.com/ifskSMT.png">
</p>

**Utilização dos valores inseridos nos campos personalizados nos templates**
```php
// Exibir valor inserido em um campo de texto simples ou cor
<?= get_theme_mod('display_name') ?>

// Exibir valor inserido em um campo de imagem (resgatando a mídia)
$logo = get_theme_mod('logo');
if ($logo) {
    $logo = wp_get_attachment_image($logo);
}
<?= $logo ?>
```

**Exibir itens do menu personalizado nos templates**
```php
<?php 
	// Armazena os itens do menu em uma variável
	$navbar_items = wp_get_nav_menu_items('your-links');
	// Exibe cada um dos itens do menu
	foreach ($navbar_items as $navbar_item) {
		?>
			<li><a href="<?= $navbar_item->url ?>"><?= $navbar_item->title ?></a></li>
		<?php
	}
?>
```

---
Encontre todo a documentação do **WordPress** no [Codex Brasil](https://codex.wordpress.org/P%C3%A1gina_Inicial).


**Tema ainda em desenvolvimento.**
