document.getElementById("password").addEventListener('keyup', authenticate,false);
document.getElementById("submitBtn").addEventListener("click", deleteUser, false);
// document.getElementById("deleteBtn").addEventListener("click", deleteUser, false);
$('#gainaccessBtn').on('click',function(){
    $('#gainaccess').trigger('submit');
});
function deleteUser(){
    document.getElementById("deleteCustomerForm").submit();
}

function authenticate() {
    var val = document.getElementById("password").value;
    // console.log(val);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        dataType: 'html',
        url: '/checkPass/' + val,
        success: function(data){
            console.log(data);
            if(data == 1){
                document.getElementById("password").classList.add("border-primary");
                document.getElementById("password").classList.remove("border-primary");
                document.getElementById("submitBtn").disabled = false;
            }if(data == 0){
                document.getElementById("submitBtn").disabled = true;
                document.getElementById("password").classList.remove("border-primary");
                document.getElementById("password").classList.add("border-danger");
            }
        },
        error: function(jqXHR, ajaxOptions, thrownError){
            document.getElementById("submitBtn").disabled = true;
            document.getElementById("password").classList.remove("border-danger");
        }
    });
}