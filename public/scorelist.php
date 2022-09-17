<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Score List of Students</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

</head>


<body>
    <script>
        var obj;
        const fragment = new DocumentFragment();

        function fragmentFromString(strHTML) {
            return document.createRange().createContextualFragment(strHTML);
        }


        document.addEventListener("DOMContentLoaded", function() {
            loadDoc();
        })

        function questionTemplateString(obj) {
            for (studentIndex = 0; studentIndex < obj.length; studentIndex++) {
                const scorelistTemplate =
                    `
                <tr class="odd">
                <td>${obj[studentIndex].userId}</td>
                <td>${obj[studentIndex].score}</td>
                </tr>
                `;

                fragment.append(fragmentFromString(scorelistTemplate));
            }
            document.querySelector("#score-list").appendChild(fragment);
        }


        function createList(obj) {
            for (studentIndex = 0; studentIndex < obj.length; studentIndex++) {
                $('#score-list').append(`<tr class="odd">
                <td class="sorting_1">${obj[studentIndex].userId}</td>
                <td>${obj[studentIndex].score}</td>
            </tr>`)
            }
        }

        function loadDoc() {

            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    obj = JSON.parse(this.responseText);
                    // questionTemplateString(obj);
                    createList(obj);
                }
            };
            xhttp.open("GET", "./../src/scorelistget.php", true);
            // xhttp.setRequestHeader('Content-Type', 'application/json');
            xhttp.send();
        }
    </script>

<div class="position-relative p-3">
    <div class="position-absolute translate-middle start-50 top-20 fs-3 m-3">Score list</div>
</div>

<div class="mx-5 mt-5">
<table class="table">
  <thead>
    <tr>
      <th scope="col">User Name</th>
      <th scope="col">Score</th>
    </tr>
  </thead>
  <tbody id="score-list">
  </tbody>
</table>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</body>

</html>