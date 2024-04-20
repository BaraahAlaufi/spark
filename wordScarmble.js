let words = [
    {   word: "speed",
        hint: "A crucial factor in Formula 1 racing"},
    {   word: "racecar",
        hint: "The vehicle used in F1 races"},
    {   word: "poduim",
        hint: "Where the top three finishers stand after a race"},
    {   word: "driver",
        hint: "The person behind the wheel"},
    {   word: "world champion",
        hint: "The ultimate goal for every F1 driver"},
    {   word: "pitstop",
        hint: "Where cars get serviced during a race"},
    {   word: "engine",
        hint: "The powerful heart of an F1 car"},
    {   word: "tyres",
        hint: "The rubber that grips the track"},
    {   word: "aerodynamic",
        hint: "Crucial for downforce"},
    {   word: "laptime",
        hint: "The time it takes to complete one lap"},
    {   word: "grid",
        hint: "The starting lineup for a race"},
    {   word: "safetycar",
        hint: "Deployed during accidents or adverse conditions"},
    {   word: "poleposition",
        hint: "The top spot on the starting grid"},
    {   word: "DRS",
        hint: "A System used for overtaking"},
    {   word: "gearbox",
        hint: "Transmits power from the engine to the wheels"},
    {   word: "fuel",
        hint: "What keeps the cars running"},
    {   word: "helmet",
        hint: "Protects the driver's head"},
    {   word: "suspension",
        hint: "Keeps the car stable over bumps"},
    {   word: "downforce",
        hint: "Generated by wings for better grip"},
    {   word: "vettel",
        hint: "A famous F1 driver"},
    {   word: "hammertime",
        hint: "Associated with Lewis Hamilton’s dominance"},
    {   word: "schumacher",
        hint: "Legendary F1 driver"},
    {   word: "silverarrows",
        hint: "Nickname for Mercedes-AMG F1 team"},
    {   word: "monaco",
        hint: "Iconic street circuit race"},
    {   word: "sainz",
        hint: "Jobless F1 driver"},
    {   word: "overtake",
        hint: "Passing another car during a race"},
    {   word: "understeer",
        hint: "When the front tires lose grip, causing the car to push wide in corners"}
]

//selecting elements from the document
const wordText = document.querySelector(".word");
const hintText = document.querySelector(".hint span");
const timeText = document.querySelector(".time b");
const inputField = document.querySelector("input");
const refreshButton = document.querySelector(".refresh-word");
const checkButton = document.querySelector(".check-word");

//variables
let correctWord;
let timer;

//countdown timer
function initTimer(maxTime) {
    clearInterval(timer); //clear prev timer
    timer = setInterval(() => {
        if (maxTime > 0) {
            maxTime--; //decrease the remaining time
            timeText.innerText = maxTime;//update the time
        } else {
            //time is up
            //display alert and start a new game
            alert(`Time off! ${correctWord.toUpperCase()} was the correct word`);
            initGame();
        }
    }, 1000);//update every second
}

//initialize the game for new round
function initGame() {
    initTimer(30);//set initial timer to 30 seconds
    const randomObj = words[Math.floor(Math.random() * words.length)]; //get a random word and hint
    const wordArray = randomObj.word.split("");//split the word letters into an array
    //shuffle the letters
    for (let i = wordArray.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [wordArray[i], wordArray[j]] = [wordArray[j], wordArray[i]];
    }
    wordText.innerText = wordArray.join("");//display the srcambled word
    hintText.innerText = randomObj.hint;//display the hint
    correctWord = randomObj.word.toLowerCase();//store the correct  word
    inputField.value = "";//cleat the input feild
    inputField.setAttribute("maxlength", correctWord.length);//set the maximum input length
}

//check user's input
function checkWord() {
    const userWord = inputField.value.toLowerCase();
    if (!userWord) {
        alert("Please enter the word to check!");//if there is no input
    } else if (userWord !== correctWord) {
        alert(`Oops! ${userWord} is not the correct word`);//incorrect answer
    } else {
        alert(`Congrats! ${correctWord.toUpperCase()} is the correct word`);//correct answer
        initGame();//start a new round
    }
}

refreshButton.addEventListener("click", initGame);//refresh the word
checkButton.addEventListener("click", checkWord);//check input

initGame();//initialize a game
