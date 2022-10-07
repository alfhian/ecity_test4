$(document).ready(function(){
    $(":text").keyup(function(){
        $(this).val($(this).val().toUpperCase());
    });
    
    $("#checkAll").click(function(){
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
    });
});

function add(route) {
    window.location.href = route;
}

function detail_view(route) {
    var count = 0;
    var value = "";
    $('input[name="check"]:checked').each(function() {
        count += 1;
        value = this.value;
    });

    if(count>1) {
        alert("You can only open 1 record at a time !");
    } else {
        window.location.href = route+"/"+value;
    }
}

function edit(route) {
    var count = 0;
    var value = "";
    $('.check:checked').each(function() {
        count += 1;
        value = this.value;
    });

    if(count > 1) {
        alert("You can only Edit 1 record at a time !");
    } else if (count == 0) {
        alert("Please choose 1 record to edit !");
    } else {
        window.location.href = route+"/"+value;
    }
}

function remove(route) {
    var count = 0;
    var value = [];
    $('.check:checked').each(function() {
        count += 1;
        value.push(this.value);
    });

    if(count > 1) {
        alert("You can only Edit 1 record at a time !");
    } else if (count == 0) {
        alert("Please choose 1 record to edit !");
    } else {
        if (confirm('Are you sure you want to remove this data?')) {
            window.location.href = route+"/"+value;
        }
    }
}

function post(route) {
    var count = 0;
    var value = "";
    $('.check:checked').each(function() {
        count += 1;
        value = this.value;
    });

    if(count>1) {
        alert("You can only Post 1 record at a time !");
    } else {
        if (confirm('Are you sure you want to post this data?')) {
            window.location.href = route+"/"+value;
        }
    }
}

function cancel(menu) {
    location.href='/'+menu;
}