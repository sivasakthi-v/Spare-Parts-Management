class Grouping{
    constructor (filename,tableCode,divisor){
        this.filename = filename;
        this.tableCode = tableCode;
        this.divisor = divisor;
        this.form = document.getElementById("search-form");
        this.searchBox = document.getElementById("search");
        this.searchBtn = document.getElementById("searchbtn");
        this.microphone = document.getElementById("search-mic");
        this.table = document.getElementById("table-result");

    }

    getData = (e) =>{
        
       
            console.log("done")
            var value = this.searchBox.value;
            // var value = search.value;
            var xhttp = new XMLHttpRequest();

          //on getting result
            xhttp.onreadystatechange = function() {
            
            // checking for the connnection status
            if (this.readyState == 4 && this.status == 200) {

                //reponse data
                 var data = JSON.parse(xhttp.responseText);

                 // searching the match value
                 for (let index = 0; index < data.length; index++) {
                     const element = data[index];
                     const exist = element[this.divisor].toLowerCase().includes(value);
                     if (exist) {
                         this.table.innerHTML = `${this.tableCode}`;
                     };
                 }
                }
            };
            xhttp.open("GET", this.filename, true);
            xhttp.send();

            //prevent redirect
            // e.preventDefault();


    }
}