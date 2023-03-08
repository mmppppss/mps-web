<?php
require("./assets/connect.php");
$url = htmlentities($_SERVER['REQUEST_URI']);

$res = pg_query($connect, "SELECT titulo,descripcion FROM articulos WHERE enlace='$url';");
$row = pg_fetch_row($res);

?>


<!DOCTYPE html>
<html>
<head>
  <title> <?php if ($row) {
    echo $row[0];
  } ?> | mmppppss</title>
  <meta name="description" content="<?php echo $row[1]; ?>">
  <link rel="stylesheet" href="assets/style.css" type="text/css" media="all" />
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />


</head>
<body class="">

  <!-- inicio del nav -->

  <div class="panel" id="panel">
    <!--<button onclick="togglePanel()"><h3>-</h3></button>-->
    <div class="container">
      <div class="tree">
        <ul>
          <li>
            <span>  <i class="fa fa-folder-open"></i><a href="http://localhost:8080/">/index</a> </span>
          </li>
          <li>
            <span>  <i class="fa fa-folder-open"></i> / </span>
            <ul>
              <li>
                <span><i class="fa fa-folder-open"></i> Carpeta 1/</span>
                <ul>
                  <li>
                    <span><i class="fa fa-file"></i> Archivo 1</span>
                  </li>
                  <li>
                    <span><i class="fa fa-file"></i> Archivo 2</span>
                  </li>
                </ul>
              </li>
              <li>
                <span><i class="fa fa-folder-open"></i> Articulos/</span>
                <ul>
                  <?php
                  $categorias = ['otros', 'noticias', 'programacion', 'hacking'];
                  foreach ($categorias as $categoria) {
                    $res = pg_query($connect, "SELECT * FROM articulos WHERE categoria='$categoria';");
                    ?>
                    <li><span><i class="fa fa-folder-open">></i><?php echo $categoria; ?>/</span>
                      <ul>
                        <?php
                        while ($row = pg_fetch_row($res)) {
                          ?>
                          <li>
                            <span><i class="fa fa-file"></i> <a href="http://localhost:8080<?php echo $row[4]; ?>"><?php echo $row[1] ?></a></span>
                          </li>
                          <?php
                        }
                        ?>
                      </ul>
                    </li>
                    <?php
                  }

                  ?>

                </ul>
              </li>
            </ul>
          </li>
        </ul>

      </div>
      <div>
        <label>Seleccione un tema:</label>
        <select id="theme">
          <option value="gruvbox">Gruvbox</option>
          <option value="dracula">Dracula</option>
          <option value="monokay">Monokay</option>
          <option value="solarised-dark">Solarised Dark</option>
        </select>
      </div>
    </div>
  </div>
  <div class="void">
    esto es un bloque vacio que ni se muestra pero tiene uso xd
  </div>
  <div class="menu">
    <img onclick="togglePanel()" src="assets/cookie.png" alt="" width="60px"><span onclick="togglePanel()" class="more">+</span>
    <h1>mmppppss</h1>
  </div>

  <!-- fin del nav -->


  <!-- todo el contenido  -->
  <?php

  if ($url == "/" || $url == "/index.php") {


    ?>
    <div class="sugest">
      <img src="" alt="" class="view">
      <a href="#"><h1 class="title">holaaaa</h1></a>
      <p>
        descripción :)
      </p>
    </div>

    <div>
      <p>
        holaaaaaa
      </p>
      <form>
        <label>Nombre de usuario:</label>
        <input type="text" name="username" />
        <br />
        <label>Mensaje:</label>
        <textarea name="message"></textarea>
        <br />
        <button type="submit">Enviar</button>
      </form>
    </div>
    <?php
  } else {
    $res = pg_query($connect, "SELECT * FROM articulos WHERE enlace='$url';");
    $row = pg_fetch_row($res);
    if ($row > 0) {
      ?>
      <div class="article">
        <img src="$row[7]" alt="imagen">
        <h1 class="title"><?php echo $row[1]; ?></h1>
        <p>
          <span class="categoría">Categoría: <?php echo $row[2]; ?></span>
          <span class="fecha">Fecha: <?php echo $row[6]; ?></span>
          <span class="autor">Autor: <?php echo $row[5]; ?></span>
        </p>
        <div class="contenido">
          <?php echo $row[3]; ?>
        </div>
      </div>
      <?php
    } else {
      echo("error 404");
    }
  }
  ?>
  <!-- fin contenido -->

  <footer>
    <p class="copy">
      &copy;<span class="autor">mmppppss</span><span class="anio">2023</span>
    </p>
  </footer>
  <script src="assets/script.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>