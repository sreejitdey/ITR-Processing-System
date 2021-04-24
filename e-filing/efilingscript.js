function calculate()
{
    var B1_i1 = parseFloat(document.getElementById("textbox1_1").value);
    var B1_i2 = parseFloat(document.getElementById("textbox1_2").value);
    var B1_i3 = parseFloat(document.getElementById("textbox1_3").value);
    var i_B1 = B1_i1 + B1_i2 + B1_i3;
    var textbox1 = document.getElementById("textbox1");
    var ii_B1 = parseFloat(document.getElementById("textbox2").value); 
    var iii_B1 = i_B1 - ii_B1;
    var textbox3 = document.getElementById("textbox3");
    var iv_B1 = 0, B1_iv1 = 0, B1_iv2 = 0, B1_iv3, v_B1 = 0, B4 = 0;
    var textbox4 = document.getElementById("textbox4");
    var textbox5 = document.getElementById("textbox5");
    var textbox8 = document.getElementById("textbox8");
    var t1 = document.getElementById("textbox1_1").value;
    B1_i1 = parseFloat(t1);
	i_B1 = B1_i1 + B1_i2 + B1_i3;
    textbox1.value = i_B1;
    var t2 = document.getElementById("textbox1_2").value;
    B1_i2 = parseFloat(t2);
	i_B1 = B1_i1 + B1_i2 + B1_i3;
    textbox1.value = i_B1;
    var t3 = document.getElementById("textbox1_3").value;
    B1_i3 = parseFloat(t3);
	i_B1 = B1_i1 + B1_i2 + B1_i3;
    textbox1.value = i_B1;
    var t1 = document.getElementById("textbox2").value;
    ii_B1 = parseFloat(t1);
    iii_B1 = i_B1 - ii_B1;
    textbox3.value = iii_B1;
    var B1_iv1 = document.getElementById("textbox1_1").value;
    var textbox4_1 = document.getElementById("textbox4_1");
    if(parseFloat(B1_iv1) >= 50000)
        iv_B1 = textbox4_1.value = 50000;
    else
        iv_B1 = textbox4_1.value = parseFloat(B1_iv1);
    B1_iv2 = parseFloat(document.getElementById("textbox4_2").value);
    if(B1_iv2 > 5000)
    {
        alert("Deduction of Entertainment allowance u/s 16(ii) can not exceed Rs. 5,000 whichever is lower in income details!");
        B1_iv2 = document.getElementById("textbox4_2").value = 0;
    }
    B1_iv3 = parseFloat(document.getElementById("textbox4_3").value);
    textbox4.value = iv_B1 + B1_iv2 + B1_iv3;
    v_B1 = iii_B1 - textbox4.value;
    if(v_B1 < 0)
        v_B1 = textbox5.value = 0;
    else
        textbox5.value = v_B1;
    var B2 = parseFloat(document.getElementById("textbox6").value);
    var B3 = parseFloat(document.getElementById("textbox7").value);
    B4 = v_B1 + B2 + B3;
    textbox8.value = B4;
    var textbox9 = document.getElementById("textbox9");
    var i_C1 = parseFloat(document.getElementById("textbox10").value);
    var ii_C1 = parseFloat(document.getElementById("textbox11").value);
    var iii_C1 = parseFloat(document.getElementById("textbox12").value);
    var C1 = textbox9.value = i_C1 + ii_C1 + iii_C1;
    var textbox13 = document.getElementById("textbox13");
    var C2 = B4 - C1;
    if(C2 > 5000000)
    {
        alert("Total income can not exceed Rs. 5,000,000!");
        C2 = textbox13.value = 5000000;        
    }
    textbox13.value = C2;
    var tax = 0, D1 = 0, D2 = 0, D3 = 0, D4 = 0;
   	if(C2 <= 250000)
       	tax = 0;
    if(C2 > 250000 && C2 <= 500000)
        tax = (C2 * 5) / 100;
    if(C2 > 500000 && C2 <= 750000)
        tax = (C2 * 10) / 100;
    if(C2 > 750000 && C2 <= 1000000)
        tax = (C2 * 15) / 100;
    if(C2 > 1000000 && C2 <= 1250000)
        tax = (C2 * 20) / 100;
    if(C2 > 1250000 && C2 <= 1500000)
        tax = (C2 * 25) / 100;
    if(C2 > 1500000)
        tax = (C2 * 30) / 100;
    var textbox14 = document.getElementById("textbox14");
    D1 = textbox14.value = tax;
    var i_D2 = parseFloat(document.getElementById("textbox16").value);
    var ii_D2 = parseFloat(document.getElementById("textbox17").value);
    var textbox15 = document.getElementById("textbox15");
    D2 = textbox15.value = i_D2 + ii_D2;
    var textbox18 = document.getElementById("textbox18");
    if(D1 >= D2)
        D3 = D1 - D2;
    else
        D3 = 0;
    textbox18.value = D3;
    var textbox19 = document.getElementById("textbox19");
    if(D1 < D2)
        D4 = D2 - D1;
    else
        D4 = 0;
    textbox19.value = D4;
}
