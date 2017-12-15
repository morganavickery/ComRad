$(document).ready(function () {
    populateDropdown();

});

// var targetProject;
var addressStr;

function submitMeetup() {
    var meetupDate = document.getElementById('datepicker').value;
    var targetProject = $("#chooseProject").val();
    console.log(addressStr);
    console.log(meetupDate)
    console.log(targetProject);
    // PROJECT ID AND ADDRESSSTR ARE ALREADY SAVED

    // ajax to the php
    var dataString='meetup_date='+meetupDate+'&meetup_location='+addressStr+'&meetup_project='+targetProject;
    console.log(dataString);
    $.ajax({
        type:"POST",
        url:"./includes/createMeetup.php",
        data: dataString,
        cache:false,
        success: function(result){   
            console.log(result);
            // alert(result); 
            // alert(result);
            if(result=="success"){
                // console.log("response form php");
                // alert that you have created a project
                // alert("You have succesfully added a task!");
                // // clear all the fields
                // $("#createTaskForm :input").each(function(){
                //     $(this).val('');
                // });

                //will want to call function to display the upcoming meetups
                alert("You have successfully created a meetup!");
                displayMeetups();

                //on success update meetings
            }else {
                console.log("failing");
                alert("One or more of the fields is empty.")
            }
            
        
        }
    });   
}


// display meetups below

function displayMeetups() {
    
    $.ajax({
        url: './includes/getMeetups.php',
        data: "",
        dataType: "json",

    }).done(function (json) {

        // json=JSON.parse(json);
        
        console.log("The json is ".json);
        $("#displayAllMeetups").empty();

        var row1= document.createElement("tr");
        var th_pname=document.createElement('th');
        var th_date= document.createElement('th');
        var th_loc=document.createElement("th");

        th_date.innerHTML="Date";
        th_pname.innerHTML="Project Name";
        th_loc.innerHTML="Location";


        row1.appendChild(th_date);
        row1.appendChild(th_pname);
        row1.appendChild(th_loc);

        $("#displayAllMeetups").append(row1);

        jsonlength = json.length;
        for (var i = 0; i < jsonlength; i++) {
            console.log(json[i].project_name);

            var pname = json[i].project_name;
            var date = json[i].date;
            var location = json[i].location;

            var row = document.createElement("tr");
            var td_pname = document.createElement('td');
            var td_date = document.createElement('td');
            var td_location = document.createElement('td');

            td_pname.innerHTML = pname;
            td_date.innerHTML = date;
            td_location.innerHTML = location;

            row.appendChild(td_date);
            row.appendChild(td_pname);
            row.appendChild(td_location);

            //CHANGE TO WHERE THIS NEEDS TO BE DISPLAYED
            $("#displayAllMeetups").append(row);
        }
    });
};

displayMeetups();
    

function retrieveProject(id, name) {
    console.log("HELLOOO");
    console.log("ID: " + id);
    targetProject = id;

    var listItem = document.createElement('button');
    var text = document.createTextNode(name);
    listItem.appendChild(text);
    $("#selectedProject").empty();
    $("#selectedProject").append(listItem);
}

function populateDropdown() {
    $.ajax({
        url: './includes/getProjects.php',
        data: "",
        dataType: "json",

    }).done(function (json) {
        jsonlength = json.length;
        json.forEach(function (c) {
            // console.log("~~~~~~~~~~~~~~~~~~");
            // console.log(c.project_id);
            // console.log(c.project_name);
            // var name = c.project_name;
            // var listItem = document.createElement('button');
            // var text = document.createTextNode(name);
            // listItem.appendChild(text);
            // console.log("1");
            // listItem.onclick = function () {
            //     retrieveProject(c.project_id, c.project_name);
            // }
            // console.log("2");
            $("#chooseProject").append(
                $('<option></option>').val(c.project_name).html(c.project_name)
            );
            // console.log("3");
        })
    });
}

//GOOGLE MAPS API
var selectedLocation;
var marker;
var geocoder;
var infowindow;
var map;
var markers = [];

function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(35.9121, -79.0512),
        zoom: 15
    };
    map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    marker = new google.maps.Marker({
        position: mapProp.center,
        map: map
    });
    geocoder = new google.maps.Geocoder;
    infowindow = new google.maps.InfoWindow;
    infowindow.setContent("The Old Well");
    infowindow.open(map, marker);
    console.log("TAG: TRYING TO CREATE MAP");
    google.maps.event.addListener(map, 'click', function (event) {
        deleteMarkers();
        // infowindow.set(null);
        selectedLocation = event.latLng;
        console.log("TAG: LAT:" + selectedLocation.lat() + " LONG:" + selectedLocation.lng());
        console.log("TAG: latlng: " + selectedLocation);
        geocodeMarker(geocoder, map, selectedLocation);
        // placeMarker(map, event.latLng);        
    });
}

function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

function geocodeMarker(geocoder, map, inputLocation) {
    var latlngArray = [inputLocation.lat(), inputLocation.lng()];
    var latlng = {
        lat: parseFloat(latlngArray[0]),
        lng: parseFloat(latlngArray[1])
    };
    geocoder.geocode({ 'location': latlng }, function (results, status) {
        console.log("TAG: INSIDE GEOCODE");
        console.log(results[0].address_components);
        var address = results[0].address_components;
        addressStr = address[0].short_name;
        for (i = 1; i < address.length; i++) {
            if (i == 2) {
                addressStr = addressStr + ". " + address[i].short_name;
            } else if (i == 4) {
                addressStr = addressStr + " " + address[i].short_name;
            } else {
                addressStr = addressStr + " " + address[i].short_name;
            }
        }
        console.log("ADDRESSSTR: " + addressStr);
        marker = new google.maps.Marker({
            position: inputLocation,
            map: map
        });
        markers.push(marker);
        console.log("TAG: MARKER PLACED");

        infowindow.setContent('Address: ' + addressStr);
        console.log(infowindow.content);
        infowindow.open(map, marker);
        console.log("TAG: INFOWINDOW PLACED");
    });

}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

function clearMarkers() {
    setMapOnAll(null);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
    clearMarkers();
    markers = [];
}

