    var username_ = document.getElementById("username");
    var name_ = document.getElementById("name");
    var surname_ = document.getElementById("surname");
    var NIF_ = document.getElementById("NIF");
    var email_= document.getElementById("email");
    var phoneNumber_ = document.getElementById("phoneNumber");
    var address_ = document.getElementById("address");
    var postalCode_ = document.getElementById("postalCode");
    var locality_ = document.getElementById("locality");
    var btnEdit_ = document.getElementById("edit-profile");
    var btnCancel_ = document.getElementById("edit-profile-cancel");

function editcss(temp){
    document.getElementById(temp).style.border="2px solid black";
    document.getElementById(temp).style.width="20%";
    document.getElementById(temp).style.padding="2px";
    document.getElementById(temp).style.marginTop="1%";
} 

function editprofile(){
    var username = document.getElementById("username");
    var name = document.getElementById("name");
    var surname = document.getElementById("surname");
    var NIF = document.getElementById("NIF");
    var email = document.getElementById("email");
    var phoneNumber = document.getElementById("phoneNumber");
    var address = document.getElementById("address");
    var postalCode = document.getElementById("postalCode");
    var locality = document.getElementById("locality");
    var btnEdit = document.getElementById("edit-profile");
    var btnCancel = document.getElementById("edit-profile-cancel");
    var btnSave = document.getElementById("edit-profile-save");

    
    username.outerHTML ="<ul contenteditable=\"true\" id=\"username\">"+ username.textContent + "</ul>";
    name.outerHTML ="<ul contenteditable=\"true\" id=\"name\">"+ name.textContent + "</ul>";
    surname.outerHTML ="<ul contenteditable=\"true\" id=\"surname\">"+ surname.textContent + "</ul>";
    NIF.outerHTML ="<ul contenteditable=\"true\" id=\"NIF\">"+ NIF.textContent + "</ul>";
    email.outerHTML ="<ul contenteditable=\"true\" id=\"email\">"+ email.textContent + "</ul>";
    phoneNumber.outerHTML ="<ul contenteditable=\"true\" id=\"phoneNumber\">"+ phoneNumber.textContent + "</ul>";
    address.outerHTML ="<ul contenteditable=\"true\" id=\"address\">"+ address.textContent + "</ul>";
    postalCode.outerHTML ="<ul contenteditable=\"true\" id=\"postalCode\">"+ postalCode.textContent + "</ul>";
    locality.outerHTML ="<ul contenteditable=\"true\" id=\"locality\">"+ locality.textContent + "</ul>";
    btnEdit.style.visibility="hidden";
    btnCancel.style.visibility="visible";
    btnSave.style.visibility="visible";
    editcss("username");
    editcss("name");
    editcss("surname");
    editcss("NIF");
    editcss("email");
    editcss("phoneNumber");
    editcss("address");
    editcss("postalCode");
    editcss("locality");

} 

function cancel(){
    var username = document.getElementById("username");
    var name = document.getElementById("name");
    var surname = document.getElementById("surname");
    var NIF = document.getElementById("NIF");
    var email = document.getElementById("email");
    var phoneNumber = document.getElementById("phoneNumber");
    var address = document.getElementById("address");
    var postalCode = document.getElementById("postalCode");
    var locality = document.getElementById("locality");
    var btnEdit = document.getElementById("edit-profile");
    var btnCancel = document.getElementById("edit-profile-cancel");
    var btnSave = document.getElementById("edit-profile-save");

    username.outerHTML ="<ul contenteditable=\"false\" id=\"username\">" + username_.textContent + "</ul>";
    name.outerHTML ="<ul contenteditable=\"false\" id=\"name\">" + name_.textContent + "</ul>";
    surname.outerHTML ="<ul contenteditable=\"false\" id=\"surname\">" + surname_.textContent + "</ul>";
    NIF.outerHTML ="<ul contenteditable=\"false\" id=\"NIF\">" + NIF_.textContent + "</ul>";
    email.outerHTML ="<ul contenteditable=\"false\" id=\"email\">" + email_.textContent + "</ul>";
    phoneNumber.outerHTML ="<ul contenteditable=\"false\" id=\"phoneNumber\">" + phoneNumber_.textContent + "</ul>";
    address.outerHTML ="<ul contenteditable=\"false\" id=\"address\">" + address_.textContent + "</ul>";
    postalCode.outerHTML ="<ul contenteditable=\"false\" id=\"postalCode\">" + postalCode_.textContent + "</ul>";
    locality.outerHTML ="<ul contenteditable=\"false\" id=\"locality\">" + locality_.textContent + "</ul>";
    btnEdit.style.visibility="visible";
    btnCancel.style.visibility="hidden";
    btnSave.style.visibility="hidden";
} 

