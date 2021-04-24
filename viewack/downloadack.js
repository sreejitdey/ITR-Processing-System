function SaveAsPDF()  
{ 
    var elements = document.getElementById("formview").innerHTML;
    var page = document.body.innerHTML;
    document.body.innerHTML = "<html><head><title></title></head><body>" + elements + "</body>";
    window.print();
    document.body.innerHTML = page;
}
