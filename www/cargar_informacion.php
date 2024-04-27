<?php
//   require_once "/usr/local/lib/php/vendor/autoload.php";

//   $loader = new \Twig\Loader\FilesystemLoader('templates');
//   $twig = new \Twig\Environment($loader);
  
  function rellenarEscalada(){
    $argumentos = [];
    $argumentos['nombre'] = "Escalada";
    $argumentos['fecha'] = "2024-06-03";
    $argumentos['precio'] = "59.99€";
    $argumentos['contenido'] = "La escalada es una actividad deportiva que consiste en subir por paredes de roca, montañas o estructuras artificiales. Se puede practicar en interiores o exteriores. La escalada en roca se realiza en paredes naturales, mientras que la escalada en hielo se realiza en cascadas de hielo. La escalada en bloque se realiza en bloques de roca de pequeño tamaño. La escalada deportiva se realiza en paredes artificiales y la escalada en solitario se realiza sin compañero de cuerda. La escalada en grandes paredes se realiza en paredes de gran altura y la escalada en psicobloc se realiza sobre el agua.";
    $argumentos['imagen1'] = "img/escalada.jpg";
    $argumentos['pie_imagen1'] = "Escalador profesional";
    $argumentos['imagen2'] = "img/escalada2.jpg";
    $argumentos['pie_imagen2'] = "Prácticas de escalad";

    $argumentos['materiales'] = ["Ropa cómoda", "Zapatillas de escalada", "Cuerda", "Arnes", "Descensor", "8 cintas exprés", "2 mosquetones de seguridad", "2 cordinos", "Casco", "Magnesio"];
    $argumentos['dificultad'] = "3/5";
    $argumentos['duracion'] = "3 horas";
    $argumentos['edad_minima'] = "12 años";
    $argumentos['enlaces'] = ["https://www.pasoclave.com/tipos-escalada-diferencias-estilos-materiales/", "https://www.barrabes.com/blog/consejos/2-10965/indispensables-escalada-deportiva-material-obligatorio"];

    $argumentos['imprimir'] = "imprimir.php?ev=1";

    return $argumentos;
  }

  function rellenarEsqui(){
    $argumentos = [];
    $argumentos['nombre'] = "Esqui";
    $argumentos['fecha'] = "2024-06-04";
    $argumentos['precio'] = "79.99€";
    $argumentos['contenido'] = "El esquí es un deporte de invierno que consiste en deslizarse sobre la nieve utilizando esquís. Se puede practicar en diferentes modalidades como el esquí alpino, el esquí de fondo, el esquí de travesía y el esquí acrobático. El esquí alpino se realiza en pistas preparadas y se caracteriza por descensos rápidos y giros pronunciados. El esquí de fondo se practica en terrenos planos y ondulados, y es una actividad de resistencia. El esquí de travesía implica ascender y descender montañas utilizando esquís y puede ser una experiencia de aventura. El esquí acrobático incluye saltos y trucos en el aire. Para practicar esquí se necesitan equipos como esquís, botas, bastones y ropa adecuada. Es un deporte emocionante y divertido que puede ser disfrutado por personas de todas las edades.";
    $argumentos['imagen1'] = "img/esqui.jpg";
    $argumentos['pie_imagen1'] = "Esquiador profesional";
    $argumentos['imagen2'] = "img/esqui2.jpeg";
    $argumentos['pie_imagen2'] = "Material de esquí";

    $argumentos['materiales'] = ["Esquís", "Botas de esquí", "Bastones", "Casco", "Gafas de sol", "Guantes", "Ropa térmica", "Chaqueta impermeable", "Pantalones de esquí", "Gorro"];
    $argumentos['dificultad'] = "4/5";
    $argumentos['duracion'] = "4 horas";
    $argumentos['edad_minima'] = "10 años";
    $argumentos['enlaces'] = ["https://www.esqui.com/blog/material-esqui/", "https://www.nevasport.com/material-esqui/"];

    $argumentos['imprimir'] = "imprimir.php?ev=2";

    return $argumentos;
  }

  function rellenarSenderismo(){
    $argumentos = [];
    $argumentos['nombre'] = "Senderismo";
    $argumentos['fecha'] = "2024-06-05";
    $argumentos['precio'] = "39.99€";
    $argumentos['contenido'] = "El senderismo es una actividad al aire libre que consiste en caminar por senderos y rutas en la naturaleza. Se puede practicar en montañas, bosques, valles, costas y otros entornos naturales. El senderismo es una actividad relajante y saludable que permite disfrutar de la naturaleza y el aire libre. Para practicar senderismo se necesitan equipos como calzado cómodo, ropa adecuada, mochila, bastones de senderismo, cantimplora, comida y botiquín de primeros auxilios. El senderismo es una actividad apta para personas de todas las edades y niveles de condición física.";
    $argumentos['imagen1'] = "img/senderismo.jpg";
    $argumentos['pie_imagen1'] = "Ruta en parque natural";
    $argumentos['imagen2'] = "img/senderismo2.jpg";
    $argumentos['pie_imagen2'] = "Ruta de senderismo con barranco";

    $argumentos['materiales'] = ["Calzado cómodo", "Ropa adecuada", "Mochila", "Bastones de senderismo", "Cantimplora", "Comida", "Botiquín de primeros auxilios", "Protector solar", "Gorra", "Gafas de sol"];
    $argumentos['dificultad'] = "2/5";
    $argumentos['duracion'] = "2 horas";
    $argumentos['edad_minima'] = "8 años";
    $argumentos['enlaces'] = ["https://www.senderismo.net/material-senderismo/", "https://www.senderosyveredas.com/que-llevar-para-hacer-senderismo/"];

    $argumentos['imprimir'] = "imprimir.php?ev=3";

    return $argumentos;
  }

  function rellenarSnowboard(){
    $argumentos = [];
    $argumentos['nombre'] = "Snowboard";
    $argumentos['fecha'] = "2024-06-06";
    $argumentos['precio'] = "69.99€";
    $argumentos['contenido'] = "El snowboard es un deporte de invierno que consiste en deslizarse sobre la nieve utilizando una tabla de snowboard. Se puede practicar en diferentes modalidades como el snowboard alpino, el snowboard freestyle y el snowboard freeride. El snowboard alpino se realiza en pistas preparadas y se caracteriza por descensos rápidos y giros pronunciados. El snowboard freestyle incluye saltos, trucos y acrobacias en el snowpark. El snowboard freeride implica descensos fuera de pista y en terrenos naturales. Para practicar snowboard se necesitan equipos como tabla de snowboard, botas de snowboard, fijaciones, casco, gafas de sol, guantes, ropa térmica, chaqueta impermeable, pantalones de snowboard y protecciones. El snowboard es un deporte emocionante y desafiante que puede ser disfrutado por personas de todas las edades.";
    $argumentos['imagen1'] = "img/snowboard.jpg";
    $argumentos['pie_imagen1'] = "Snowboarder profesional";
    $argumentos['imagen2'] = "img/snowboard2.jpg";
    $argumentos['pie_imagen2'] = "Curso de snowboard";

    $argumentos['materiales'] = ["Tabla de snowboard", "Botas de snowboard", "Fijaciones", "Casco", "Gafas de sol", "Guantes", "Ropa térmica", "Chaqueta impermeable", "Pantalones de snowboard", "Protecciones"];
    $argumentos['dificultad'] = "4/5";
    $argumentos['duracion'] = "4 horas";
    $argumentos['edad_minima'] = "10 años";
    $argumentos['enlaces'] = ["https://www.snowboard.es/material-snowboard/", "https://www.nevasport.com/material-snowboard/"];

    $argumentos['imprimir'] = "imprimir.php?ev=4";


    return $argumentos;
  }

  function rellenarRafting(){
    $argumentos = [];
    $argumentos['nombre'] = "Rafting en aguas bravas";
    $argumentos['fecha'] = "2024-06-07";
    $argumentos['precio'] = "49.99€";
    $argumentos['contenido'] = "El rafting es un deporte acuático que consiste en descender ríos en balsas inflables. Se puede practicar en diferentes niveles de dificultad, desde aguas tranquilas hasta rápidos extremos. El rafting es una actividad emocionante y desafiante que requiere trabajo en equipo y coordinación. Para practicar rafting se necesitan equipos como balsa inflable, remos, casco, chaleco salvavidas, traje de neopreno, botas de agua y cuerda de seguridad. El rafting es una actividad apta para personas de todas las edades y niveles de condición física.";
    $argumentos['imagen1'] = "img/rafting.jpg";
    $argumentos['pie_imagen1'] = "Descenso de rafting en aguas bravas";
    $argumentos['imagen2'] = "img/rafting2.jpeg";
    $argumentos['pie_imagen2'] = "Descenso de rafting en familia";

    $argumentos['materiales'] = ["Balsa inflable", "Remos", "Casco", "Chaleco salvavidas", "Traje de neopreno", "Botas de agua", "Cuerda de seguridad", "Gafas de sol", "Protector solar", "Gorro"];
    $argumentos['dificultad'] = "3/5";
    $argumentos['duracion'] = "3 horas";
    $argumentos['edad_minima'] = "12 años";
    $argumentos['enlaces'] = ["https://www.rafting.es/material-para-rafting/", "https://www.rafting.es/consejos-para-principiantes-en-rafting/"];

    $argumentos['imprimir'] = "imprimir.php?ev=5";


    return $argumentos;
  }

  function rellenarDescensoBici(){
    $argumentos = [];
    $argumentos['nombre'] = "Descenso en bicicleta de montaña";
    $argumentos['fecha'] = "2024-06-08";
    $argumentos['precio'] = "69.99€";
    $argumentos['contenido'] = "El descenso en bicicleta de montaña es una actividad deportiva que consiste en descender por senderos y caminos de montaña en bicicleta. Se puede practicar en diferentes tipos de terreno, desde pistas forestales hasta senderos técnicos y empinados. El descenso en bicicleta de montaña es una actividad emocionante y desafiante que requiere habilidad y concentración. Para practicar descenso en bicicleta de montaña se necesitan equipos como bicicleta de montaña, casco, guantes, gafas de sol, ropa adecuada, protecciones y botiquín de primeros auxilios. El descenso en bicicleta de montaña es una actividad apta para personas con experiencia en ciclismo de montaña y un buen nivel de condición física.";
    $argumentos['imagen1'] = "img/descenso.jpg";
    $argumentos['pie_imagen1'] = "Descenso en bicicleta de montaña con barranco";
    $argumentos['imagen2'] = "img/descenso2.jpg";
    $argumentos['pie_imagen2'] = "Descenso en bicicleta de montaña";

    $argumentos['materiales'] = ["Bicicleta de montaña", "Casco", "Guantes", "Gafas de sol", "Ropa adecuada", "Protecciones", "Botiquín de primeros auxilios", "Protector solar", "Gorro", "Cantimplora"];
    $argumentos['dificultad'] = "4/5";
    $argumentos['duracion'] = "4 horas";
    $argumentos['edad_minima'] = "14 años";
    $argumentos['enlaces'] = ["https://www.bicicletas.com/material-descenso-bici/", "https://www.bicicletas.com/consejos-descenso-bici/"];

    $argumentos['imprimir'] = "imprimir.php?ev=6";


    return $argumentos;
  }

  function rellenarParapente(){
    $argumentos = [];
    $argumentos['nombre'] = "Parapente";
    $argumentos['fecha'] = "2024-06-09";
    $argumentos['precio'] = "89.99€";
    $argumentos['contenido'] = "El parapente es un deporte aéreo que consiste en volar en parapente, una aeronave ligera y flexible. Se puede practicar en diferentes lugares como montañas, colinas, acantilados y playas. El parapente es una actividad emocionante y relajante que permite disfrutar de vistas panorámicas y la sensación de libertad. Para practicar parapente se necesitan equipos como parapente, arnés, casco, radio, altímetro, GPS, ropa adecuada y calzado cómodo. El parapente es una actividad apta para personas de todas las edades y niveles de condición física.";
    $argumentos['imagen1'] = "img/parapente.jpg";
    $argumentos['pie_imagen1'] = "Parapente en playa";
    $argumentos['imagen2'] = "img/parapente2.jpg";
    $argumentos['pie_imagen2'] = "Parapente en montaña";

    $argumentos['materiales'] = ["Parapente", "Arnés", "Casco", "Radio", "Altímetro", "GPS", "Ropa adecuada", "Calzado cómodo", "Gafas de sol", "Protector solar"];
    $argumentos['dificultad'] = "3/5";
    $argumentos['duracion'] = "3 horas";
    $argumentos['edad_minima'] = "16 años";
    $argumentos['enlaces'] = ["https://www.parapente.com/material-parapente/", "https://www.parapente.com/consejos-parapente/"];

    $argumentos['imprimir'] = "imprimir.php?ev=7";


    return $argumentos;
  }

  function rellenarCamping(){
    $argumentos = [];
    $argumentos['nombre'] = "Camping y noche de estrellas";
    $argumentos['fecha'] = "2024-06-10";
    $argumentos['precio'] = "29.99€";
    $argumentos['contenido'] = "El camping es una actividad al aire libre que consiste en acampar en la naturaleza. Se puede practicar en diferentes lugares como montañas, bosques, valles, costas y ríos. El camping es una actividad relajante y divertida que permite disfrutar de la naturaleza y el aire libre. La noche de estrellas es una actividad que consiste en observar las estrellas y los astros en el cielo nocturno. Es una experiencia mágica y fascinante que permite contemplar la inmensidad del universo.";
    $argumentos['imagen1'] = "img/camping.jpg";
    $argumentos['pie_imagen1'] = "Camping en montaña con noche de estrellas";
    $argumentos['imagen2'] = "img/camping2.jpg";
    $argumentos['pie_imagen2'] = "Durmiendo bajo las estrellas";

    $argumentos['materiales'] = ["Tienda de campaña", "Saco de dormir", "Colchoneta", "Linterna", "Comida", "Agua", "Ropa de abrigo", "Protector solar", "Gorro", "Botiquín de primeros auxilios"];
    $argumentos['dificultad'] = "1/5";
    $argumentos['duracion'] = "1 día";
    $argumentos['edad_minima'] = "6 años";
    $argumentos['enlaces'] = ["https://www.camping.es/material-camping/", "https://www.camping.es/consejos-camping/"];

    $argumentos['imprimir'] = "imprimir.php?ev=8";
    
    return $argumentos;
  }

  function rellenarAvistamientoAves(){
    $argumentos = [];
    $argumentos['nombre'] = "Avistamiento de aves";
    $argumentos['fecha'] = "2024-06-11";
    $argumentos['precio'] = "19.99€";
    $argumentos['contenido'] = "El avistamiento de aves es una actividad de observación de aves en su hábitat natural. Se puede practicar en diferentes lugares como bosques, humedales, ríos, lagos y montañas. El avistamiento de aves es una actividad relajante y educativa que permite conocer la diversidad de aves que habitan en un lugar. Para practicar avistamiento de aves se necesitan equipos como prismáticos, guía de aves, cuaderno de campo, cámara fotográfica, ropa adecuada y calzado cómodo. El avistamiento de aves es una actividad apta para personas de todas las edades y niveles de experiencia.";
    $argumentos['imagen1'] = "img/aves.jpg";
    $argumentos['pie_imagen1'] = "Observación de aves en migración";
    $argumentos['imagen2'] = "img/aves2.jpg";
    $argumentos['pie_imagen2'] = "Aves en su hábitat natural";

    $argumentos['materiales'] = ["Prismáticos", "Guía de aves", "Cuaderno de campo", "Cámara fotográfica", "Ropa adecuada", "Calzado cómodo", "Gorro", "Protector solar", "Agua", "Comida"];
    $argumentos['dificultad'] = "1/5";
    $argumentos['duracion'] = "1 día";
    $argumentos['edad_minima'] = "6 años";
    $argumentos['enlaces'] = ["https://www.aves.net/material-avistamiento-aves/", "https://www.aves.net/consejos-avistamiento-aves/"];

    $argumentos['imprimir'] = "imprimir.php?ev=9";


    return $argumentos;
  }
  
  function gestionarParametros(){
    $argumentos = [];
  
  
    if (isset($_GET['ev'])) {
        if ($_GET['ev'] == 1) {
        $argumentos = rellenarEscalada();
        } else if ($_GET['ev'] == 2) {
        $argumentos = rellenarEsqui();
        } else if ($_GET['ev'] == 3) {
        $argumentos = rellenarSenderismo();
        } else if ($_GET['ev'] == 4) {
        $argumentos = rellenarSnowboard();
        } else if ($_GET['ev'] == 5) {
        $argumentos = rellenarRafting();
        } else if ($_GET['ev'] == 6) {
        $argumentos = rellenarDescensoBici();
        } else if ($_GET['ev'] == 7) {
        $argumentos = rellenarParapente();
        } else if ($_GET['ev'] == 8) {
        $argumentos = rellenarCamping();
        } else if ($_GET['ev'] == 9) {
        $argumentos = rellenarAvistamientoAves();
        } else {
        $argumentos = rellenarEscalada();       
        }
    } else {
        $argumentos = rellenarEscalada();
    }

    return $argumentos;
  }
  
  
?>
