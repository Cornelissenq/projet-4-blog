<?php
$title = 'Sommaire';

ob_start();

?>

<div class = "row">

<?php 

while ($post = $posts->fetch())
{
?>
    <div class = "col-lg-3 post summar"><a href="index.php?action=post&amp;id=<?= $post['id'] ?>" class="summary">
        <p class= "numberChapter"> <?= $post['id'] ?></p>
        <p class= "title"> <?= $post['title'] ?> </p>
    </a></div>


<?php
}
?>
</div>

<?php 

$content = ob_get_clean();

require('template.php')
?>