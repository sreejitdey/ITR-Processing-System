function getUserID()
{
	var pan = document.getElementById("pan");
	var userid = document.getElementById("userid");
	userid.value = pan.value;
}
var currentTab = 0;
showTab(currentTab);
function showTab(n)
{
	var x = document.getElementsByClassName("tab");
	x[n].style.display = "block";
	if(n == x.length-1)
		document.getElementById("registerbtn").innerHTML = "Submit";
	else
		document.getElementById("registerbtn").innerHTML = "Next";
}
function gotoNext(n)
{
	var x = document.getElementsByClassName("tab");
	if(n == 1 && !validateForm())
		return false;
	x[currentTab].style.display = "none";
	currentTab = currentTab + n;
	if(currentTab >= x.length)
	{
		document.getElementById("regform").submit();
		return false;
	}
	showTab(currentTab);
}
function validateForm()
{
	var x, y, i, valid = true;
	x = document.getElementsByClassName("tab");
	y = x[currentTab].getElementsByTagName("input");
	for(i = 0; i < y.length; i++)
	{
		if(y[i].id == "mname")
			continue;
		if(y[i].value == "")
		{
			y[i].className += " invalid";
			valid = false;
		}
	}
	if(valid)
		document.getElementsByClassName("step")[currentTab].className += " finish";
	return valid;
}
