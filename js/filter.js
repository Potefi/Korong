function priceFilterMin(){
    document.getElementById('priceRangeMinLabel').innerHTML = "Minimum ár: " + document.getElementById('priceRangeMin').value + " Ft";
    document.getElementById('priceRangeMax').min = document.getElementById('priceRangeMin').value;
}
function priceFilterMax(){
    document.getElementById('priceRangeMaxLabel').innerHTML = "Maximum ár: " + document.getElementById('priceRangeMax').value + " Ft";
    document.getElementById('priceRangeMin').max = document.getElementById('priceRangeMax').value;
}