function nav_index(){
    $.ajax({
        url: "index.php",
        success: function(data) {
            $("div#mainPage").html(data);
        }
    });
}

function nav_journal(){
    $.ajax({
        url: "src/journal.php",
        success: function(data) {
            $("div#mainPage").html(data);
        }
    });
}

function nav_entry_form(){
    $.ajax({
        url: "src/entry_form.php",
        success: function(data) {
            $("div#mainPage").html(data);
        }
    });
}

function nav_playground(){
    $.ajax({
        url: "src/playground.php",
        success: function(data) {
            $("div#mainPage").html(data);
        }
    });
}

function nav_world_traveller(){
    $.ajax({
        url: "src/world_traveller.php",
        success: function(data) {
            $("div#mainPage").html(data);
        }
    });
}

function nav_color_picker(){
    $.ajax({
        url: "src/color_picker.php",
        success: function(data) {
            $("div#mainPage").html(data);
        }
    });
}

function nav_blank(){
    $.ajax({
        url: "src/blank.php",
        success: function(data) {
            $("div#mainPage").html(data);
        }
    });
}


/*
function myFunction() {
    var x = document.getElementById("myLinks");
    if (x.style.display === "block") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }
  }
  */