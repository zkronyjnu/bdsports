var minute=0;
var second=0;
var time;
function timer(){
    if (second==60) {
        second=0;
        minute++;
    }else{
        second++;
    }
    document.getElementById('counter').value=minute+":"+second;
}

function start(){
    time=setInterval(function(){timer()}, 1000);
    
}
function stop(){
    clearInterval(time);
    document.getElementById('counter').value=minute+":"+second;
    var Ajax=new XMLHttpRequest();
    Ajax.onreadystatechange=function(){
        if (Ajax.readyState==4&&Ajax.status==200) { 
            
        }
    }
    Ajax.open("GET", "Add", async)
}
function half_time(){
    clearInterval(time);
    document.getElementById('counter').value="Half Time";
}