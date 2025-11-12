<?php

define('APP_NAME', 'QR Codes');
define('PAGE_TITLE', 'Dashboard');
define('PAGE_SELECTED_SECTION', '');
define('PAGE_SELECTED_SUB_PAGE', '');

include('../templates/html_header.php');
include('../templates/nav_header.php');
include('../templates/nav_slideout.php');
include('../templates/nav_sidebar.php');
include('../templates/main_header.php');

include('../templates/message.php');

?>


    <header id="header">
      <div id="icon">
        <img src="https://cdn.brickmmo.com/icons@1.0.0/bricksum.png" alt="Bricksum-icon" />
      </div>
      <h1>BrickSum</h1>
    </header>

    <main id="main">
      <p>
        BrickSum is a unique tool designed for BrickMMO enthusiasts, content
        creators, and developers. This tool allows you to create different texts
        from the chosen option with the given size in the
        <strong>Number</strong> input.
      </p>

      <h3>Features</h3>
      <ol>
        <li>Generate custom Lorem Ipsum text using BrickMMO thememed words</li>
        <li>Specify the number of words, sentences, or paragraphs</li>
        <li>Easily copy the generated text to your clipboard</li>
      </ol>

      <form name="myform">
        <span>
          <input type="number" id="num" name="form_num" min="1" value="5" />
        </span>
        <select name="form_option" id="dropdown">
          <option value="words">Words</option>
          <option value="sentences">Sentences</option>
          <option value="paragraphs" selected>Paragraphs</option>
        </select>
        <div class="btn">
          <button type="submit" id="generate-btn">
            Generate Text <i class="fa fa-plus"></i>
          </button>
          <button type="button" id="copy-btn">
            Copy <i class="fa fa-regular fa-copy"></i>
          </button>
        </div>
      </form>
      <div id="output"></div>
    </main>
    <footer id="footer" class="w3-border-top w3-margin-top w3-center">
        <div class="copyright">
            <p>&copy; <a href="https://brickmmo.com">BrickMMO</a> | 2024 | All rights reserved</p>
            <p>
            LEGO, the LEGO logo and the Minifigure are trademarks of the LEGO
            Group.
            </p>
        </div>
    </footer>
  
<?php

include('../templates/main_footer.php');
include('../templates/debug.php');
include('../templates/html_footer.php');