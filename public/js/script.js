function gallery(photos){
    $.each(photos, function(key, value){
    var img = document.createElement('img');
    img.src = "obrazki/"+value;
    img.alt = value;
    $(img).addClass("photo");
    $(img).css("display", "none");

    $('#main').append(img);
    $(img).fadeIn("slow");
    img.addEventListener("click", function(){
            modalPhoto(this.src);
            $("#modal").modal();
    });
    });
    

}
function modalPhoto(src){
    $(".modal-content").empty();
    var photo = document.createElement("img");
    photo.src = src;
    $(photo).addClass("img-fluid");
    $(".modal-content").append(photo);
}
function show(){
    $("div").each(function(){
       $( this ).fadeIn("slow"); 
    });
}
function mail(e){
    e.preventDefault();
    $.ajax({
        url:            'http://localhost/detailing/public/email',
        method:         'put',
        contentType:    'application/json',
        data:           {
            name:   $("#name").val(),
            email:  $("#email").val(),
            text:   $("#text").val()
        }
    })
    .done(function (res){
        $('.toast').toast('show');
    });
    return false;
}

