<?php include('inc/head.php');

if (isset($_POST["contenu"])) {
    $fichier = "./files/" . $_POST['file'];
    $file = fopen($fichier, "w");
    fwrite($file, $_POST['contenu']);
    fclose($file);
}
?>


    C'est ici que tu vas devoir afficher le contenu de tes repertoires et fichiers.<br/>
<hr>
<h5> Voici la liste des répertoires </h5>

<?php 
$dir=opendir("./files");
while($file=readdir($dir)) {
    if (!in_array($file, array(".",".."))) {
        echo $file." ";
    }
}
?> 
<hr>
<h4> Voici la liste des fichiers par répertoires </h4>
<br/>
<h5>Roswell</h5>
<?php
$path = "./files/roswell";
?> <a href="./deletefolder.php?delete=<?=$path?>">SUPPRIMER dossier Roswell</a> 
<?php
echo '<br/>';
echo '<br/>';
?>
<?php 
$dir=opendir("./files/roswell");
while($file=readdir($dir)) {
    if (!in_array($file, array(".",".."))) {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if ($ext == "txt" || $ext == "html") {
            echo '<a href="?f='."roswell/".$file.'">';
            echo $file." ";
            echo '</a>';
            $path = "./files/test/" . $file;
            ?> <a href="./deletefile.php?delete=<?=$path?>">SUPPRIMER</a> <?php
            echo '<br/>';
        } else {
            echo $file. " ";
            echo '</a>';
            $path = "./files/test/" . $file;
            ?> <a href="./deletefile.php?delete=<?=$path?>">SUPPRIMER</a> <?php
            echo '<br/>';
        }
    }
}
?>

<hr>
<h5>Uk</h5>
<?php
$path = "./files/uk";
?> <a href="./deletefolder.php?delete=<?=$path?>">SUPPRIMER dossier Uk</a> <?php
echo '<br/>';
echo '<br/>';
?>
<?php 
$dir=opendir("./files/uk");
while($file=readdir($dir)) {
    if (!in_array($file, array(".",".."))) {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if ($ext == "txt" || $ext == "html") {
            echo '<a href="?f='."uk/".$file.'">';
            echo $file." ";
            echo '</a>';
            $path = "./files/test/" . $file;
            ?> <a href="./deletefile.php?delete=<?=$path?>">SUPPRIMER</a> <?php
        } else {
            echo $file. " ";
            $path = "./files/test/" . $file;
            ?> <a href="./deletefile.php?delete=<?=$path?>">SUPPRIMER</a> <?php
            echo '<br/>';
        }
    }
}
?>

<hr>
<h5>Test</h5>
<?php
$path = "./files/test";
?> <a href="./deletefolder.php?delete=<?=$path?>">SUPPRIMER dossier Test (seulement si le dossier est vide)</a> <?php
echo '<br/>';
echo '<br/>';
?>
<?php 
$dir=opendir("./files/test");
while($file=readdir($dir)) {
    if (!in_array($file, array(".",".."))) {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if ($ext == "txt" || $ext == "html") {
            echo '<a href="?f='."test/".$file.'">';
            echo $file." ";
            $path = "./files/test/" . $file;
            ?> <a href="./deletefile.php?delete=<?=$path?>">SUPPRIMER</a> <?php
        } else {
            echo $file. " ";
            $path = "test/" . $file;
            ?> <a href="./deletefile.php?delete=<?=$path?>">SUPPRIMER</a> <?php
            echo '<br/>';
        }
    }
}
?>

<?php 
if (isset($_GET['f'])) {
    $fichier = "./files/".$_GET['f'];
    $contenu = file_get_contents($fichier);
}
?>

<hr>

<h4> Modifier vos fichiers </h4>
<form method="POST" action="index.php">
    <textarea name="contenu" style="width:100%; height:200px">
        <?= $contenu; ?>
    </textarea>
    <input type="submit" value="Send">
    <input type="hidden" name="file" value="<?=$_GET['f'];?>">
</form>

<?php include('inc/foot.php'); ?>