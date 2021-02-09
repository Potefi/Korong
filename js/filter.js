function priceFilterMin(){
    document.getElementById('priceRangeMinLabel').innerHTML = "Minimum ár: " + document.getElementById('priceRangeMin').value + " Ft";
    document.getElementById('priceRangeMax').min = document.getElementById('priceRangeMin').value;
}
function priceFilterMax(){
    document.getElementById('priceRangeMaxLabel').innerHTML = "Maximum ár: " + document.getElementById('priceRangeMax').value + " Ft";
    document.getElementById('priceRangeMin').max = document.getElementById('priceRangeMax').value;
}
function priceFilterMinMobile(){
    document.getElementById('priceRangeMinLabelMobile').innerHTML = "Minimum ár: " + document.getElementById('priceRangeMinMobile').value + " Ft";
    document.getElementById('priceRangeMaxMobile').min = document.getElementById('priceRangeMin').value;
}
function priceFilterMaxMobile(){
    document.getElementById('priceRangeMaxLabelMobile').innerHTML = "Maximum ár: " + document.getElementById('priceRangeMaxMobile').value + " Ft";
    document.getElementById('priceRangeMinMobile').max = document.getElementById('priceRangeMaxMobile').value;
}