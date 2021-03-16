function backgroundChanger(data, row) {
    let opened = document.getElementById(data).getAttribute('aria-expanded');
    console.log(opened)

    if (opened == 'true'){
        document.querySelectorAll("tr").forEach(function ($item){
            $item.style.backgroundColor = "#FBFBFB";
        })
        document.getElementById(row).style.backgroundColor = "rgba(238,238,238,0.86)";
    }
    if (opened == 'false'){
        document.getElementById(row).style.backgroundColor = "#FBFBFB";
    }
}

function modifyQuantity() {
    document.getElementById('modifyPC').className = 'd-block btn btn-danger w-100 mt-2 is-invalid font-weight-bold';
    document.getElementById('modifyPhone').className = 'd-block btn btn-danger my-2 w-100 is-invalid font-weight-bold';
    let disableButton = document.querySelectorAll('.purchase');
    for (let i = 0; i < disableButton.length; i++) {
        disableButton[i].className += ' disabled';
    }
}