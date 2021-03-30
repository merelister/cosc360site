var nightMode = false;

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

    if (nightMode == false) {

        elements = document.getElementsByTagName("h3");
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
        nightMode = true;
    }   

    else {

        elements = document.getElementsByTagName("h3");
        for (var i = 0; i < elements.length; i++) {
        elements[i].style.color="black";
        }

        elements = document.getElementsByClassName("searchbar");
        for (var i = 0; i < elements.length; i++) {
        elements[i].style.background="white";
        elements[i].style.color="black";
        }

        button.innerHTML = "Night Mode";
        logo.src = "images/rabbit.png";
        nightMode = false;
    }


}