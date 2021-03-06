function backgroundChanger(data, row){
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