$(document).ready(function() {
    $('#gologin').click(function(){
        var formdata = $('#login').serialize();

        $.ajax({
            type:'POST',
            url: 'cek.php',
            data: formdata,
            beforeSend: function(){ $("#gologin").text('Please wait..');},
        }).done(function(data){
            if(data==200) {
                setTimeout(' window.location.href = "home.php"; ',100);
            } else {
                $("#gologin").text('Log In');
                toastr.error('Username or password is not valid!', 'Error:', {timeOut: 5000});
            }
        });
        return false;
    });
});