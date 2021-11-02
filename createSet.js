//document.write override
document.write = function(s){
    var scripts = document.getElementsByTagName('script');
    var lastScript = scripts[scripts.length - 1];
    lastScript.insertAdjacentHTML("beforebegin", s);
}

//Button functionality
var firstbtn = document.getElementById("addBtn");
firstbtn.addEventListener("click", createCard);
var secondbtn = document.getElementById("displayBtn");
secondbtn.addEventListener("click", displayCards);

//Declare variables
var cards = new Array();
var i = 0;
var j = 0;

// define the functions
function printCard() {
   var questionLine = "<br>" + this.question + "<br>";
   var answerLine = this.answer + "<hr>";
   document.write(questionLine + answerLine);
}
function Card(question, answer) {
   this.question = question;
   this.answer = answer;
   this.printCard = printCard;
}
function createCard()
{
   //Prompt for variables
   var q = prompt("Enter Question", "");
   var a = prompt("Enter Answer", "");
   
   //Create card variables and store in array
   var card = new Card(q, a);
   cards[i] = card;
   ++i;
}
function displayCards()
{
    for (j; j < cards.length; ++j)
    {
       cards[j].printCard();
    }
}
