<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Ubuntu', sans-serif;
    }

    #main-div {
        width: 100vw;
        min-height: 100vh;
        display: grid;
        place-items: center;
        background-color: rgb(214, 235, 241);
    }

    #inner-div {
        width: 40vw;
        background-color: #fff;
        padding: 1.5rem 3rem;
        border-radius: 1.5rem;
        /* box-shadow: 0 1rem 1rem -0.7 rgba(0, 0, 0, 0.4); */
    }

    #question-text,
    #question-options,
    li {
        font-size: 1.2rem;
        margin: 1.2rem 0 1.2rem 0;
        list-style: none;
    }

    #question-text {
        font-weight: 700;
        font-size: 1.5rem;
    }

    input,
    label {
        cursor: pointer;
    }

    .action_button {
        padding: 0.8rem 1.5rem;
        outline: none;
        /* display:grid; */
        /* margin: auto; */
        border: none;
        text-transform: uppercase;
        background-color: rgb(176, 198, 204);
        color: #fff;
        font-weight: 500;

        /* grid-template-columns: auto; */
    }

    .action_button:hover {

        background-color: rgb(194, 220, 228);
        cursor: pointer;
    }

    #submit_button {
        background-color: rgb(246, 172, 172);
    }

    #submit_button:hover {
        background-color: rgb(255, 113, 113);
    }
</style>

<script defer>
    var obj, question, option1, option2, option3, option4;
    var questionIndex = 0;

    const fragment = new DocumentFragment();

    function fragmentFromString(strHTML) {
        return document.createRange().createContextualFragment(strHTML);
    }

    function questionTemplateString(obj) {
        for (questionIndex = 0; questionIndex < obj.length; questionIndex++) {
            const questionTemplate =
            `<div id="question_${questionIndex}">
                <div id="question-text">
                    ${obj[questionIndex].questionData}
                </div>

                <div id="question-options">
                    <ul>
                        <li>
                            <input type="radio" value="1" name="optionForQuestion${questionIndex}" id="optionForQuestion${questionIndex}_1" class="options">
                            <label for="optionForQuestion${questionIndex}_1" id="questionText${questionIndex}_1">${obj[questionIndex].option1}</label>
                        </li>
                        <li>
                            <input type="radio" value="2" name="optionForQuestion${questionIndex}" id="optionForQuestion${questionIndex}_2" class="options">
                            <label for="optionForQuestion${questionIndex}_2" id="questionText${questionIndex}_2">${obj[questionIndex].option2}</label>
                        </li>
                        <li>
                            <input type="radio" value="3" name="optionForQuestion${questionIndex}" id="optionForQuestion${questionIndex}_3" class="options">
                            <label for="optionForQuestion${questionIndex}_3" id="questionText${questionIndex}_3">${obj[questionIndex].option3}</label>
                        </li>
                        <li>
                            <input type="radio" value="4" name="optionForQuestion${questionIndex}" id="optionForQuestion${questionIndex}_4" class="options">
                            <label for="optionForQuestion${questionIndex}_4" id="questionText${questionIndex}_4">${obj[questionIndex].option4}</label>
                        </li>
                    </ul>
                </div>
            </div>`;

            fragment.append(fragmentFromString(questionTemplate));
        }
        document.querySelector("#question-area").appendChild(fragment)
    }

    document.addEventListener("DOMContentLoaded", function() {
        // question = document.querySelector('#question-text');
        // option1 = document.querySelector('#option1_text');
        // option2 = document.querySelector('#option2_text');
        // option3 = document.querySelector('#option3_text');
        // option4 = document.querySelector('#option4_text');
        // loadDoc();
        loadDoc();
    })


    function loadQuestion(questionIndex) {
        document.querySelector('#question-text').innerHTML = obj[questionIndex].questionData;
        document.querySelector('#option1_text').innerHTML = obj[questionIndex].option1;
        document.querySelector('#option2_text').innerHTML = obj[questionIndex].option2;
        document.querySelector('#option3_text').innerHTML = obj[questionIndex].option3;
        document.querySelector('#option4_text').innerHTML = obj[questionIndex].option4;
    }

    function loadDoc() {

        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                obj = JSON.parse(this.responseText);
                console.log("from loaddoc");
                questionTemplateString(obj);
                // console.log(obj);
                // console.log(this.responseText);
            }
        };
        xhttp.open("GET", "./../src/questions.php", true);
        // xhttp.setRequestHeader('Content-Type', 'application/json');
        xhttp.send();
    }


    function loadNext() {
        if (questionIndex < obj.length) {
            loadQuestion(questionIndex);
            questionIndex++;
        }

    }

    function loadPrevious() {
        if (questionIndex > 0) {
            questionIndex--;
            loadQuestion(questionIndex);

        }
    }

    function submitAnswer() {

    }


    function createDocNodes(obj) {
        for (index = 0; index < obj.length; index++) {

        }
    }
    // loadDoc();
</script>


<div id="main-div">
    <div id="inner-div">

    <form action="answerSubmitted.php" method="post">
    <div id="question-area">

    </div>
        <div id="button_navigation_area">

        
        <button id="previous_button" class="action_button" onclick="loadPrevious()">Previous</button>
        <button id="next_button" class="action_button" onclick="loadNext()">Next</button>
        <button id="submit_button" class="action_button" onclick="submitAnswer()">Submit</button>
        </div>

    </form>
    </div>
</div>