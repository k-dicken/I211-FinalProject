/*
 * Author: Kylee Dicken
 * Date: Apr 11, 2022
 */

/*
 * This script contains AJAX methods
 */
var xmlHttp;
var numSuggest = 0;  //total number of suggestions
var activeSuggest = -1;  //suggestion currently being selected
var searchBoxObj, searchData;
var activesuggestionBoxObj;

//this function creates a XMLHttpRequest object. It should work with most types of browsers.
function createXmlHttpRequestObject() {
    // create a XMLHttpRequest object compatible to most browsers
    if (window.ActiveXObject) {
        return new ActiveXObject("Microsoft.XMLHTTP");
    } else if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
    } else {
        alert("Error creating the XMLHttpRequest object.");
        return false;
    }
}

//initial actions to take when the page load
window.onload = function () {
    //create an XMLHttpRequest object by calling the createXmlHttpRequestObject function
    xmlHttp = createXmlHttpRequestObject();
};

function getSearchType(type) {
    //DOM objects
    searchBoxObj = document.getElementById('searchtextbox' + type);
    searchData = searchBoxObj.getAttribute("data-searchtype");

    activesuggestionBoxObj = document.getElementById('suggestionDiv' + type);
    console.log(activesuggestionBoxObj);
}

window.onclick = function () {
    activesuggestionBoxObj.style.display = 'none';
};

//set and send XMLHttp request. The parameter is the search term
function suggest(query) {
    //if the search term is empty, clear the suggestion box.
    if (query === "") {
        activesuggestionBoxObj.innerHTML = "";
        return;
    }

    //proceed only if the search term isn't empty
    // open an asynchronous request to the server.
    xmlHttp.open("GET", base_url + "flight/suggest/" + searchData  + "/" + query, true);

    //handle server's responses
    xmlHttp.onreadystatechange = function () {
        // proceed only if the transaction has completed and the transaction completed successfully
        if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
            // extract the JSON received from the server
            var suggest = JSON.parse(xmlHttp.responseText);

            // display suggestions in a div block
            displaySuggest(suggest);
        }
    };

    // make the request
    xmlHttp.send(null);
}

/* This function populates the suggestion box with spans containing all the titles
 * The parameter of the function is a JSON object
 * */
function displaySuggest(suggest) {
    //clean version of the suggestions with no repeats
    let cleanSuggest = [];

    for (i = 0; i < suggest.length; i++) {
        let repeatCount = 0;

        for (c = 0; c < cleanSuggest.length; c++) {
            if (cleanSuggest[c] == suggest[i]) {
                repeatCount++;
            }
        }

        if (repeatCount < 1) {
            cleanSuggest.push(suggest[i]);
        }
    }

    numSuggest = cleanSuggest.length;
    activeSuggest = -1;
    if (numSuggest === 0) {
        //hide all suggestions
        activesuggestionBoxObj.style.display = 'none';
        return false;
    }

    var divContent = "";
    //retreive the suggestions from the JSON doc and create a new span for each title
    for (i = 0; i < cleanSuggest.length; i++) {
        divContent += "<span id=s_" + i + " onclick='clickSuggest(this)'>" + cleanSuggest[i] + "</span><br>";
    }

    //display the spans in the div block
    activesuggestionBoxObj.innerHTML = divContent;
    activesuggestionBoxObj.style.display = 'block';
    activesuggestionBoxObj.style.padding = '4px 6px';
}

//This function handles keyup event. The function is called for every keystroke.
function handleKeyUp(e) {
    // get the key event for different browsers
    e = (!e) ? window.event : e;

    /* if the keystroke is not up arrow or down arrow key,
     * call the suggest function and pass the content of the search box
     */
    if (e.keyCode !== 38 && e.keyCode !== 40) {
        suggest(e.target.value);
        return;
    }

    //if the up arrow key is pressed
    if (e.keyCode === 38 && activeSuggest > 0) {
        //add code here to handle up arrow key. e.g. select the previous item
        activeSuggestObj.style.backgroundColor = "#FFF";
        activeSuggest--;
        activeSuggestObj = document.getElementById("s_" + activeSuggest);
        activeSuggestObj.style.backgroundColor = "#F5DEB3";
        searchBoxObj.value = activeSuggestObj.innerHTML;
        return;
    }

    //if the down arrow key is pressed
    if (e.keyCode === 40 && activeSuggest < numSuggest - 1) {
        //add code here to handle down arrow key, e.g. select the next item

        if(typeof(activeSuggestObj) != "undefined") {
            activeSuggestObj.style.backgroundColor = "#FFF";
        }
        activeSuggest++;
        activeSuggestObj = document.getElementById("s_" + activeSuggest);
        activeSuggestObj.style.backgroundColor = "#F5DEB3";
        searchBoxObj.value = activeSuggestObj.innerHTML;
    }
}

//when a suggestion is clicked, fill the search box with the suggestion and then hide the suggestion list
function clickSuggest(suggest) {
    //display the suggestion in the search box
    searchBoxObj.value = suggest.innerHTML;

    //hide all suggestions
    activesuggestionBoxObj.style.display = 'none';
}