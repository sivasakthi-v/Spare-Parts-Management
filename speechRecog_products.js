const form = document.getElementById("search-form");
const searchBox = document.getElementById("search");
const searchBtn = document.getElementById("searchbtn");
const microphone = document.getElementById("search-mic");
const table = document.getElementById("table-result");

form.addEventListener("submit", getValue);
        function getValue(e) {
            console.log("done")
            var value = searchBox.value;
            // var value = search.value;
            var xhttp = new XMLHttpRequest();

          //on getting result
            xhttp.onreadystatechange = function() {
            
            // checking for the connnection status
            if (this.readyState == 4 && this.status == 200) {

                //reponse data
                 var data = JSON.parse(xhttp.responseText);
                 var tableValue = ``;

                 // searching the match value
                 for (let index = 0; index < data.length; index++) {
                     const element = data[index];
                     const exist = element.product_name.toLowerCase().includes(value);
                     if (exist) {
                         tableValue += `
                     <tr>
                         <td>${element.pid}</td>
                         <td>${element.product_name}</td>
                         <td>${element.product_price}</td>
                         <td>${element.product_stock}</td>
                     </tr>
                         `;
                     };
                     console.log(tableValue);
                    }
                    if (tableValue == ``) {
                        table.innerHTML= `
                        <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                    </tr>
                                    <td style="text-align: center;" colspan="10" >No Results Found</td>
                        `;
                    } else {
                        table.innerHTML = `
                        <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                    </tr>
                    ${tableValue}
                                    `;
                        }
                    }
            };


            xhttp.open("GET", "product_search.php", true);
            xhttp.send();

            e.preventDefault();
        }

        //Speech recognition
        microphone.addEventListener("click", startRecognition);
        function startRecognition() {

            var engine = window.SpeechRecognition || webkitSpeechRecognition;
            var myRecognition = new engine();
            myRecognition.continuous = false;
            myRecognition.lang = "en-US";
            myRecognition.interimResults = false;
            myRecognition.start();

            // Triggered when the result got
            myRecognition.onresult = (event) => {
                const keyword = event.results[event.resultIndex][0].transcript
                    .toLowerCase()
                    .trim();
                searchBox.value = keyword;
                searchBtn.click();
                myRecognition.stop();
            }

            // displays the error if something went wrong
            myRecognition.onerror = (error) => {
                var error = error.error;
                if (error == "Aborted") {
                    console.log("Listening already...")
                } else if (error == "no-speech") {
                    console.log("No keyword has given...")
                } else {
                    console.log("Something went wrong! Check your internet connection or Please try again!")
                }
            };
        }