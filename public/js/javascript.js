$("#submit").click(function(){
    var output = $("#output");
    var type = $("#type").val(); 
    var star = $("input[name='star']").val();
    var data = {
        type: type,
        star: star
    }
    
    if(!$.isNumeric(star)){
        return alert("Value must be numeric !");
    }

    $.ajax({
        url: "api/countingstars",
        type: "post",
        dataType: "html",
        data: data,
        success: function (result) {
            output.html(result);
        },
        error: function (error) {
            alert(error);
        }
    })
});

$("#submit2").click(function(){
    var output = $("#output");
    var nominal = $("#nominal").val(); 
    var data = {
        nominal: nominal
    }
    
    if(!$.isNumeric(nominal)){
        return alert("Value must be numeric !");
    }

    $.ajax({
        url: "api/rupiah",
        type: "post",
        dataType: "json",
        data: data,
        success: function (result) {
            output.html(result['rupiah']+result['terbilang']);
        },
        error: function (error) {
            alert(error);
        }
    })
});