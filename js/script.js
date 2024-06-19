window.onload = function() {
    var formHandle = document.forms.myform;
    formHandle.onsubmit = processForm;

    var inputElement = document.getElementById('usertxt');
    var outputDiv = document.getElementById('output');
    var copyBtn = document.getElementById('copy-btn');

    // Initialize Tagify on the input element
    var tagify = new Tagify(inputElement);

    function processForm(event) {
        event.preventDefault(); // Prevent form submission

        var inputWords = tagify.value.map(item => item.value); // Get tags as an array of strings
        var numPara = parseInt(formHandle.numpara.value, 10);
        var numWords = parseInt(formHandle.numwords.value, 10);

        var loremIpsumText = generateLoremText(numPara, numWords, inputWords);
        outputDiv.innerHTML = loremIpsumText;
    }

    function generateLoremText(numPara, numWords, userWordsArray) {
        var loremText = '';
        var words = ["roof", "chimney", "window", "door", "frame", "gate", "ramp", "slide", "ladder", "rail",
            "handle", "hinge", "bracket", "connector", "clip", "hook", "ring", "hub", "gear", "wheel",
            "tire", "axle", "shaft", "pin", "bushing", "cam", "pulley", "chain", "belt", "gearbox",
            "knob", "lever", "switch", "turntable", "socket", "antenna", "mast", "flag", "flap", "wing"
        ];
        words = words.concat(userWordsArray);

        for (var i = 0; i < numPara; i++) {
            var paragraph = '';
            for (var j = 0; j < numWords; j++) {
                var randomWord = words[Math.floor(Math.random() * words.length)];
                paragraph += randomWord + ' ';
            }
            loremText += '<p>' + paragraph.trim() + '</p>';
        }
        return loremText;
    }

    copyBtn.onclick = function() {
        var range = document.createRange();
        range.selectNodeContents(outputDiv);
        var selection = window.getSelection();
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

