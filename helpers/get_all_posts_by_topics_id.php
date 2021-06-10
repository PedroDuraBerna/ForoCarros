<?php

$count = 0;
$t = new Topics;
$p = new Posts;
$u = new Users;

    //PAGINATION

    $filas_por_pagina = 10;

    if (isset($_GET["pag"])) {
        $pag = $_GET["pag"];
    } else {
        $pag = 1;
    }

    $empezar_desde = ($pag - 1) * $filas_por_pagina;

    $result = $p->getAll_posts_by_topics_id($t->getTopics_id_by_name($info));

    $numero_filas = $result->num_rows;

    $numero_paginas = ceil ($numero_filas/$filas_por_pagina);

    //PAGINATION

$result = $p->getAll_posts_by_topics_id_paginated($empezar_desde, $filas_por_pagina, $t->getTopics_id_by_name($info));

while ($obj = $result->fetch_object()) {
    $likes = $p->num_likes_post($obj->posts_id);
    $All_Posts[$count]["posts_likes"] = $likes->num_rows;
    $All_Posts[$count]["posts_id"] = $obj->posts_id;
    $All_Posts[$count]["posts_title"] = $obj->posts_title;
    $All_Posts[$count]["posts_text"] = $obj->posts_text;
    $All_Posts[$count]["visibility"] = $obj->visibility;
    $All_Posts[$count]["posts_date"] = $obj->posts_date;
    $All_Posts[$count]["posts_last_modification_date"] = $obj->posts_last_modification_date;
    $All_Posts[$count]["posts_visits_counter"] = $obj->posts_visits_counter;
    $All_Posts[$count]["users_name"] = $u->getUser_name_by_id($obj->users_id);
    $All_Posts[$count]["topics_name"] = $t->getTopics_name_by_id($obj->topics_id);
    $count++;
}

?>