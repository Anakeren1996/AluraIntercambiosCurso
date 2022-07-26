<?php
$estiloPagina = 'destinos.css';
require_once 'header.php';

// AUXÍLIO PARA DEBUGAR O CÓDIGO DO FORM 
// echo '<pre>';
// $paises = get_terms(array('taxonomy' => 'paises'));
// print_r($paises);
// echo '</pre>';
?>

<form action="#" class="container-alura formulario-pesquisa-paises">
    <h2>Conheça nossos destinos</h2>
    <select name="paises" id="paises">
        <option value="">--Selecione--</option>
        <?php
        $paises = get_terms(array('taxonomy' => 'paises'));
        foreach ($paises as $pais) : ?>
            <!-- COMPARO SE ESSA VÁRIAVEL PAÍS NAME É IGUAL AO RESULTADO DE PAÍS QUE O USUÁRIO ESTÁ PESQUISANDO SE FOR IGUAL COLOCO A OPÇÃO SELECTED   -->
            <option value="<?= $pais->name ?>" <?= !empty($_GET['paises']) && $_GET['paises'] === $pais->name ? 'selected' : '' ?>><?= $pais->name ?></option>
        <?php endforeach;
        ?>
    </select>
    <input type="submit" value="Pesquisar">
</form>
<?php

// SE A CHAVE NÃO FOR VAZIA AÍ VAMOS EXECUTAR ESSE BLOCO
if (!empty($_GET['paises'])) {
    $paisSelecionado = array(array(
        'taxonomy' => 'paises',
        'field' => 'name',
        // busca o valor dessa chave países
        'terms' => $_GET['paises']
    ));
}

// variável com a customização realizada
$args = array(
    'post_type' => 'destinos',
    // responsável também por realizar as consultas entre as taxonomias
    // SE O VALOR DA CHAVE FOR VAZIO, SELECIONAR A OPÇÃO SELECIONE, ENTÃO SERÁ EXECUTADO ESSE BLOCO POST TYPE ONDE SERÁ EXIBIDO TODOS OS DESTINOS
    'tax_query' => !empty($_GET['paises']) ? $paisSelecionado : ''
);

// variável query que recebe a customização
$query = new WP_Query($args);

// digo que o have posts é vinculado a query customizada, e altero o loop do wordpress para não buscar os dados da página destino e sim buscar os dados dessa query customizada
if ($query->have_posts()) :
    echo '<main class="page-destinos">';
    echo '<ul class="lista-destinos container-alura">';
    while ($query->have_posts()) : $query->the_post();
        echo '<li class="col-md-3 destinos" >';
        the_post_thumbnail();
        the_title('<p class="titulo-destino">', '</p>');
        the_content();
        echo '</li>';
    endwhile;
    echo '</ul>';
    echo '</main>';
endif;
require_once 'footer.php';
