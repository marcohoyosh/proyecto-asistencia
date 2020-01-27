function User(name,age,action){
    this.action=action;
    this.name=name;
    this.age=age;
}
Users.prototype.Adduser= function(){
    console.log(this.name+""+this.age);
    $.ajax({
        type:"POST",
        url:this.action,
        data:{ name: this.name, age: this.age },
        success: function (response){
            if(response ==1){
                alert("Datos insertados!!!!");
            }
        }
    });
}
Users.prototype.searUser= function(){
    $post(this.action, {nameSearch: this.name}, function(response){
        $("#resultSerach").html(response);
    });
}