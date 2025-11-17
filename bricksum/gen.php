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



    <h1>Bricksum</h1>

      <p>
        BrickSum is a unique tool designed for BrickMMO enthusiasts, content
        creators, and developers. This tool allows you to create different texts
        from the chosen option with the given size in the
        <strong>Number</strong> input.
      </p>

      <h2>Features</h2>
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
    
    

<script>



window.onload = function () {
  let outputDiv = document.getElementById("output");
  let copyBtn = document.getElementById("copy-btn");

  let formHandle = document.forms.myform;
  let slctOption = formHandle.form_option;

  formHandle.onsubmit = processForm;

  function processForm(event) {
    event.preventDefault();

    let num_search = formHandle.form_num;

    brickMMOLorem(num_search);
  }

  function brickMMOLorem(num_search) {
    let url = `http://bricksum.local.brickmmo.com/api/generate/${slctOption.value}/${num_search.value}`;

    fetch(url)
      .then((response) => response.json())
      .then((data) => {
        console.log("API response:", data);
        let textOutput =
          "<p>" + data.wordlist.replace(/\r/g, "</p><p>") + "</p>";
        outputDiv.innerHTML = textOutput;
      })
      .catch((error) => {
        console.error("Error when calling API:", error);
      });
  }

  copyBtn.onclick = function () {
    let range = document.createRange();
    range.selectNodeContents(outputDiv);
    let selection = window.getSelection();
    selection.removeAllRanges();
    selection.addRange(range);

    try {
      document.execCommand("copy");
      // alert("Text copied to clipboard");
    } catch (err) {
      // alert("Failed to copy text");
    }

    selection.removeAllRanges();
  };
};



</script>

<?php

include('../templates/main_footer.php');
include('../templates/debug.php');
include('../templates/html_footer.php');