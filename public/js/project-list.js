const rangeInput = document.querySelectorAll(".range-input input");
const priceInput = document.querySelectorAll(".price-input input");
const progress = document.querySelector(".slider .progress");
const resultMinRange = document.querySelector('.result-minRange');
const resultMaxRange = document.querySelector('.result-maxRange');


// console.log(resultMinRange.innerText)

let priceGap = 200;

priceInput.forEach(input =>{
    input.addEventListener("input", e =>{
        //getting two range value and parsing them to number
        let minVal = parseInt(priceInput[0].value),
        maxVal = parseInt(priceInput[1].value);
        if((maxVal - minVal >= priceGap) && maxVal <= 5000){
            if(e.target.className === "input-min"){ //if active input is min input
                rangeInput[0].value = minVal;
                progress.style.left =  (minVal/rangeInput[0].max) * 100  + "%";
            }else{
                rangeInput[1].value = maxVal;
                progress.style.right = 100 - (maxVal/rangeInput[0].max) * 100  + "%";
            }
        }



    });
});


rangeInput.forEach(input =>{
    input.addEventListener("input", e =>{
        //getting two range value and parsing them to number
        let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);

        if(maxVal - minVal < priceGap){
            if(e.target.className === "range-min"){ //if active slider is min slider
                rangeInput[0].value = maxVal - priceGap;
            }else{
                rangeInput[1].value = minVal + priceGap;
            }
        }else{
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            progress.style.left =  (minVal/rangeInput[0].max) * 100  + "%";
            progress.style.right = 100 - (maxVal/rangeInput[0].max) * 100  + "%";

        }

        resultMinRange.innerText = minVal;
        resultMaxRange.innerText = maxVal;


    })
});



//For Choose
function getValue(selectedId,resultId){
    const choose = document.getElementById(selectedId);
    const result = document.getElementById(resultId);
    const value = choose.options[choose.selectedIndex].text;
    result.innerHTML = value;
    console.log(value);
}

