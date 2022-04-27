function showDiv(select){
    if(select.value== 'Dog'){
        document.getElementById('catSymptom').style.display = "none";
        document.getElementById('dogSymptom').style.display = "block";
    } else if(select.value== 'Cat'){
        document.getElementById('catSymptom').style.display = "block";
        document.getElementById('dogSymptom').style.display = "none";
    }
}
