
let redInput = document.querySelector('.red');
let greenInput = document.querySelector('.green');
let blueInput = document.querySelector('.blue');
let windowBlock = document.querySelector('.window');

function changeColor() {
    windowBlock.innerHTML = `rgb(${redInput.value},${greenInput.value},${blueInput.value})`;
    windowBlock.style.backgroundColor = `rgb(${redInput.value},${greenInput.value},${blueInput.value})`;
}

redInput.addEventListener('input', changeColor);
greenInput.addEventListener('input', changeColor);
blueInput.addEventListener('input', changeColor);