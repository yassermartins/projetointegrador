<?php include("conecta.php");?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Projeto Integrador</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<div id="container">


    <div id="menu">
        <h2>Menu Loja</h2>
    </div>
    <nav>
        <ul>
            <?php

            $sql    = "SELECT * FROM categoria order by id_categoria asc";
            $res    = mysqli_query($conexao, $sql) or die (alerta("Falha na Conexão  ".mysqli_error()));
            while($row = mysqli_fetch_array($res)) {
            $menu=$row['nome'];
            $id_cat=$row['id_categoria'];
            ?>

            <?php //Contar o submenu para ver se abre o submenu ou não
            $sql2    = "SELECT * FROM tipo_categoria where id_tipo_categoria='$id_cat' ";
            $res2    = mysqli_query($conexao, $sql2) or die (alerta("Falha na Conexão  ".mysqli_error()));
            $contador =  mysqli_num_rows($res2);
            // se não tiver submenu ele fecha a tag
            if($contador==0){
                echo '<li><a class="MenuBarItem" href="#">'.$menu.'</a>';
                echo "</li>";
            }else {
            echo '<li><a class="MenuBarItemSubmenu" href="#">'.$menu.'</a>';

            echo "<ul>";
            while($row2 = mysqli_fetch_array($res2)) {
                $submenu=$row2['nome'];
                ?>
                <li><a href="#"><?php echo $submenu;?></a></li>
            <?php     }?>

        </ul>
        </li>
        <?php     }}?>
        </ul>

    </nav>

</div>

</body>
</html>