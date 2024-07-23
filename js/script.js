window.onload = function() {

    let outputDiv = document.getElementById('output');
    let copyBtn = document.getElementById('copy-btn');

    let formHandle = document.forms.myform;
    let slctOption = formHandle.form_option;

    formHandle.onsubmit = processForm;

    function processForm(event) {
        event.preventDefault();

        let num_search = formHandle.form_num;

        brickMMOLorem(num_search)

    }

    function brickMMOLorem(num_search){

        let url = `https://console.brickmmo.com/api/bricksum/generate/${slctOption.value}/${num_search.value}`; 

        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("API response:", data);
                let textOutput = '<p>'+ data.wordlist.replace(/\r/g, '</p><p>')+ '</p>';
                outputDiv.innerHTML = textOutput;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error when calling API:", textStatus, errorThrown);
            }
        });
    }

    copyBtn.onclick = function() {
        let range = document.createRange();
        range.selectNodeContents(outputDiv);
        let selection = window.getSelection();
        selection.removeAllRanges();
        selection.addRange(range);

        try {
            document.execCommand('copy');
            alert('Text copied to clipboard');
        } catch (err) {
            alert('Failed to copy text');
        }

        selection.removeAllRanges();
    };

};

