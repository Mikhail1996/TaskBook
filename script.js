function changePage(){
    var id = this.id;
    $.ajax({
      type: "POST",
      data: "page_num="+id,
      success: function(msg){
        location.href = '/';
      }
    });
}

$.each($('.page_button'), function(){
   this.onclick = changePage;
});

$("#create_task").click( function(event){
    var x = document.forms["newTaskForm"]["author"].value;
    if (x == "") {
        event.preventDefault();
        alert("Необходимо ввести имя");
        return false;
    }
    x = document.forms["newTaskForm"]["email"].value;
    if (x == "") {
        event.preventDefault();
        alert("Необходимо ввести E-mail");
        return false;
    }
    x = document.forms["newTaskForm"]["text"].value;
    if (x == "") {
        event.preventDefault();
        alert("Необходимо ввести текст задачи");
        return false;
    }
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    x = document.forms["newTaskForm"]["email"].value;
    if(reg.test(x) == false) {
        event.preventDefault();
        alert('E-mail некорректен');
        return false;
    }
    alert("Задача успешно добавлена!");
});