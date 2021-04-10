
document.addEventListener("DOMContentLoaded", checkNightMode, false);

function checkNightMode(){
  var nightMode = getCookie("nightmode");

  if (nightMode == "true") {
    nightMode = false;
    toggleNightMode();
  }

  else nightMode = false;
}

function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function dropdown(){
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.matches('.usericon')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

function toggleNightMode() {

    document.body.classList.toggle("dark-mode");
    document.getElementById("header").classList.toggle("dark-mode");

    var button = document.getElementById("nightMode");
    var logo = document.getElementById("logo");
    var dropdown = document.getElementById("drop");

    if (nightMode == false) {
      console.log("Nightmode False detected");

        elements = document.getElementsByTagName("h3");
        for (var i = 0; i < elements.length; i++) {
        elements[i].style.color="white";
        }

        elements = document.getElementsByTagName("h1");
        for (var i = 0; i < elements.length; i++) {
        elements[i].style.color="white";
        }

        elements = document.getElementsByClassName("searchbar");
        for (var i = 0; i < elements.length; i++) {
        elements[i].style.background="#1f1f1f";
        elements[i].style.color="white";
        }

        button.innerHTML = "Day Mode‏‏‎ ‎‏‏‎ ‎‏‏‎ ‎";
        logo.src = "images/lightRabbit.png";
        dropdown.src = "images/downarrowwhite.png";
        nightMode = true;
        document.cookie = "nightmode=true;";
  
        console.log("Nightmode Toggled");
    }  

    else {
      console.log("Nightmode True");

        elements = document.getElementsByTagName("h3");
        for (var i = 0; i < elements.length; i++) {
        elements[i].style.color="black";
        }

        elements = document.getElementsByTagName("h1");
        for (var i = 0; i < elements.length; i++) {
        elements[i].style.color="black";
        }

        elements = document.getElementsByClassName("searchbar");
        for (var i = 0; i < elements.length; i++) {
        elements[i].style.background="#F6F8FA";
        elements[i].style.color="black";
        }

        button.innerHTML = "Night Mode";
        logo.src = "images/rabbit.png";
        dropdown.src = "images/downarrow.png";
        nightMode = false;
        document.cookie = "nightmode=false;";
        console.log("Daymode Toggled");
    }


  }