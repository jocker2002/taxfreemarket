$(document).ready(function() {

    function BlackOrWhite(hexcolor) {
        hexcolor = hexcolor.replace("#", "");
        var r = parseInt(hexcolor.substr(0, 2), 16);
        var g = parseInt(hexcolor.substr(2, 2), 16);
        var b = parseInt(hexcolor.substr(4, 2), 16);
        var yiq = (r * 299 + g * 587 + b * 114) / 1000;
        return yiq >= 128 ? "black" : "white";
    }

    $(".google-color-palette").on("click", function() {

        var color_hex = $(this).attr("value")
        var color_name = $(this).attr("id")

        $(this).closest(".expand-box").siblings(".color-result").css("background-color", color_hex);
        $(this).closest(".expand-box").siblings(".color-result").children(".color-result-hex").text(color_hex);
        $(this).closest(".expand-box").siblings(".color-result").children(".color-result-name").text(", " + color_name);

        if (BlackOrWhite(color_hex) == "black") {
            $(this).closest(".expand-box").siblings(".color-result").children("span").css("color", "black");
            $(this).closest(".expand-box").siblings(".color-result").removeClass("white");
            $(this).closest(".expand-box").siblings(".color-result").addClass("black");
        } else {
            $(this).closest(".expand-box").siblings(".color-result").children("span").css("color", "white");
            $(this).closest(".expand-box").siblings(".color-result").removeClass("black");
            $(this).closest(".expand-box").siblings(".color-result").addClass("white");
        }

    });

});

//#### Color Picker ####
//When "Custom" is clicked is goes to the color menu.
/*
document
    .getElementById("col-pick-button")
    .addEventListener("click", function() {
        document.getElementById("col-picker").focus();
        document.getElementById("col-picker").value = "#ffffff";
        document.getElementById("col-picker").click();
    });

//Check when color picker is used.
document
    .getElementById("col-picker")
    .addEventListener("change", watchColorPicker);

function watchColorPicker(e) {
    //Uncheck radio button.
    let checked =
        document.querySelector('input[name="GoogleColorPalette"]:checked') !==
        null;
    if (checked) {
        document.querySelector(
            'input[name="GoogleColorPalette"]:checked'
        ).checked = false;
    }
    //Get the selected hex color
    let col_value = event.target.value;
    //Determin if dark or light color
    // https://codepen.io/andreaswik/pen/YjJqpK
*/

//Change color
// colorSelected(col_value, "Custom", text_col);
/*
}
*/
//#### Color Radio Buttons ####
//Get the value of the checked button.
/*
function radioClick() {
    let value = this.value;
    let id = this.id;
    let text_col = this.style.color;

    colorSelected(value, id, text_col);
}

document
    .querySelectorAll("input.google-color-palette")
    .forEach(button => {
        button.addEventListener("click", radioClick);
    });

//#### Dislplay Color ####
function colorSelected(value, id, text_col) {
    //get the id
    document.getElementById("color-result-hex").textContent = value;
    document.getElementById("color-result-name").textContent = ", " + id;

    const result = document.getElementById("color-result");
    result.style.color = text_col;
    result.style.backgroundColor = value;
    //add color val
}
*/