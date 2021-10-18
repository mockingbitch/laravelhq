$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id,url){
    if(confirm('R u freakin sure about das?')){
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',

            data:{id},
            url:url,
            success: function (result){
                if(result.error === false){
                    alert(result.message);
                    location.reload();
                }
                else{
                    alert('Xoá không thành công, vui lòng thử lại!');
                }
            }
        })
    }
}
// Upload file
$( )
