
//using jquery

$(document).ready(function() {//the document must be loaded in order to execute the functions

$("#name h1").click(function(){
var result = Math.floor((Math.random() * 4) + 1);//random no between 1 and 4
if (result == 4){$(this).html("Drizzy");}
if (result == 3){$(this).html("Drake Gens");}
if (result == 2){$(this).html("Mr. Gens");}
if (result == 1){$(this).html("Drake Michael Gens");}

});

$("#education h1").click(function(){
var result = Math.floor((Math.random() * 3) + 1);//This functionality is similar to above, randomly selecting a new heading
if (result == 1){$(this).html("Education");}
if (result == 2){$(this).html("Academic Experience");}
if (result == 3){$(this).html("I Love Learning");}


});

$("#techskills h1").click(function(){
var result = Math.floor((Math.random() * 3) + 1);
if (result == 1){$(this).html("Programming Frequently in...");}
if (result == 2){$(this).html("Technical Skills");}
if (result == 3){$(this).html("If CS student then...");}


});

$("#experience h1").click(function(){
var result = Math.floor((Math.random() * 3) + 1);
if (result == 1){$(this).html("Jobs");}
if (result == 2){$(this).html("Experience");}
if (result == 3){$(this).html("Paid More Than Minimum Wage");}


});


$("#awards h1").click(function(){
var result = Math.floor((Math.random() * 3) + 1);
if (result == 1){$(this).html("Proud of..");}
if (result == 2){$(this).html("I did it..");}
if (result == 3){$(this).html("Awards");}


});

$("#involvement h1").click(function(){
var result = Math.floor((Math.random() * 3) + 1);
if (result == 1){$(this).html("Extracurriculars");}
if (result == 2){$(this).html("Involvement");}
if (result == 3){$(this).html("Outside of Class");}


});


});

function loadSchedule() {// this function is executed when the button is clicked

var ajax = new XMLHttpRequest();//using ajax

ajax.onreadystatechange = function() {

if (ajax.readyState == 4 && ajax.status == 200) {//magic numbers that AJAX uses
$("#schedule").html(ajax.responseText);
}
};
ajax.open("GET", "schedule.txt", true);
ajax.send();//sending info back from the server
}
