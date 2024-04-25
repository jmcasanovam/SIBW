<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);
  
  // $nombreEvento = "Nombre por defecto";
  // $fechaEvento = "Fecha por defecto";
  
  // if ($_GET['ev'] == 1) {
  //   $nombreEvento = "Evento 1";
  //   $fechaEvento = "Miércoles";
  // } else if ($_GET['ev'] == 2) {
  //   $nombreEvento = "Evento 2";
  //   $fechaEvento = "Jueves";    
  // }
  
  
  
  // echo $twig->render('evento.html', ['nombre' => $nombreEvento, 'fecha' => $fechaEvento]);

  $argumentos = [];
  $argumentos['nombre'] = "Escalada";
  $argumentos['fecha'] = "03/06/2024";
  $argumentos['precio'] = "59.99€";
  $argumentos['contenido'] = "La escalada es una actividad deportiva que consiste en subir por paredes de roca, montañas o estructuras artificiales. Se puede practicar en interiores o exteriores. La escalada en roca se realiza en paredes naturales, mientras que la escalada en hielo se realiza en cascadas de hielo. La escalada en bloque se realiza en bloques de roca de pequeño tamaño. La escalada deportiva se realiza en paredes artificiales y la escalada en solitario se realiza sin compañero de cuerda. La escalada en grandes paredes se realiza en paredes de gran altura y la escalada en psicobloc se realiza sobre el agua.";
  // $argumentos['imagen1'] = "img/escalada.jpg";
  // $argumentos['imagen2'] = "img/escalada2.jpg";
  echo $twig->render('actividad.html', $argumentos);
?>
