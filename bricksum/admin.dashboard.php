<?php

security_check();
admin_check();

define('APP_NAME', 'Bricksum');

define('PAGE_TITLE', 'Dashboard');
define('PAGE_SELECTED_SECTION', 'admin-content');
define('PAGE_SELECTED_SUB_PAGE', '/admin/dashboard');

include('../templates/html_header.php');
include('../templates/nav_header.php');
include('../templates/nav_slideout.php');
include('../templates/nav_sidebar.php');
include('../templates/main_header.php');

include('../templates/message.php');

$bricksum_wordlist = setting_fetch('BRICKSUM_WORDLIST', 'comma_2_array');
$bricksum_paragraphs_generated = setting_fetch('BRICKSUM_PARAGRAPHS_GENERATED');
$bricksum_sentences_generated = setting_fetch('BRICKSUM_SENTENCES_GENERATED');
$bricksum_words_generated = setting_fetch('BRICKSUM_WORDS_GENERATED');

?>


<!-- CONTENT -->

<h1 class="w3-margin-top w3-margin-bottom">
    <img
        src="https://cdn.brickmmo.com/icons@1.0.0/bricksum.png"
        height="50"
        style="vertical-align: top"
    />
    Bricksum
</h1>

<hr>

<p>
    Paragraphs Generated: <span class="w3-tag w3-blue"><?=$bricksum_paragraphs_generated?></span> | 
    Sentences Generated: <span class="w3-tag w3-blue"><?=$bricksum_sentences_generated?></span> | 
    Words Generated: <span class="w3-tag w3-blue"><?=$bricksum_words_generated?></span>
</p>

<hr />

<h2>Bricksum Word List</h2>

<div class="w3-container w3-border w3-padding-16 w3-margin-bottom">

    <?php foreach($bricksum_wordlist as $word): ?>
        <span class="w3-tag w3-green w3-round w3-margin-bottom w3-padding">
            <?=$word?>
        </span>
    <?php endforeach; ?>
    
</div>

<a
    href="/admin/words"
    class="w3-button w3-white w3-border"
>
    <i class="fa-solid fa-pen-to-square fa-padding-right"></i> Modify Word List
</a>

<?php

include('../templates/main_footer.php');
include('../templates/debug.php');
include('../templates/html_footer.php');
