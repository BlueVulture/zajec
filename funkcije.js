function formCheck(forma) {

    if (forma.email.value == '') {
        forma.email.style.background = "red";
        forma.email.focus();
        return false;
    }

    if (forma.pass.value.length < 5) {
        forma.pass.style.background = "red";
        forma.pass.focus();
        document.getElementById("error").innerHTML = "Geslo mora biti dolgo vsaj 5 znakov";
        return false;
    }
}

function skrij() {
    //alert("lfhl");
    document.getElementById("error").innerHTML = "";
}

//document.getElementById("auction").addEventListener("check", displayDate);

function check() {
    if(document.getElementById("auction").checked)
    {
      document.getElementById("price").innerHTML = "Izklicna cena:";
    }
    else
    {
      document.getElementById("price").innerHTML = "Cena:";
    }
}
