var cadreInscription=document.getElementById("cadreInscription");
var cadreConnexion=document.getElementById("cadreConnection");
var btnInscription=document.getElementsByClassName("inscription-btn");
var btnConnexion=document.getElementsByClassName("connexion-btn");
var closeInscriptionBtn=document.getElementById("closeInscrireCadre");
var closeConnexionBtn=document.getElementById("closeConnecterCadre");
var closeDocumentBtn=document.getElementById("closeCadreDocument");
var cadreDocument=document.getElementById("cadreDocument");
var uploadDocumentBtn=document.getElementsByClassName("uploadDocumentBtn");

var connexionHidden = true;
var inscriptionHidden = true;
var cadreDocumentHidden = true;
for ( let j=0; j<btnInscription.length;j++) {
    btnInscription[j].onclick = function () {
        if (inscriptionHidden===true){
            inscriptionHidden=false;
            cadreInscription.style.display="block";
        }
    };
};

for ( let j=0; j<btnConnexion.length;j++) {
    btnConnexion[j].onclick = function () {
        if (connexionHidden===true){
            connexionHidden=false;
            cadreConnexion.style.display="block";
        }
    };
};

for ( let j=0; j<uploadDocumentBtn.length;j++) {
    uploadDocumentBtn[j].onclick = function () {
        if (cadreDocumentHidden===true){
            cadreDocumentHidden=false;
            cadreDocument.style.display="block";
        }
    };
};


closeConnexionBtn.onclick = function () {
    if (connexionHidden===false){
        connexionHidden=true;
        cadreConnexion.style.display="none";
    }
};

closeInscriptionBtn.onclick = function () {
    if (inscriptionHidden===false){
        inscriptionHidden=true;
        cadreInscription.style.display="none";
    }
};

closeDocumentBtn.onclick=function(){
    if (cadreDocumentHidden===false){
        cadreDocumentHidden=true;
        cadreDocument.style.display="none";
    }
};

$(window).scroll(function() {
    if ($(window).scrollTop() > 140) {
        $('.menu').addClass('floatingNav');
    } else {
        $('.menu').removeClass('floatingNav');
    }
});

$(document).ready(function() {
    $("#upload_doc").click(function() {
        var name = $("#filename").val();
        console.log(name);
       // var ext = name.split()
        if (name == '') {
            alert("Insertion Failed Some Fields are Blank....!!");
        } else {
// Returns successful data submission message when the entered information is stored in database.
            $.post("../../Controller/file_uploader.php", {
                name1: name
            }, function(data) {
                alert(data);
                $('#form')[0].reset(); // To reset form fields
            });
        }
    });
});






