function searchTutorials() {
    let input = document.getElementById('searchBar').value.toLowerCase(); //turns vals into all lowercase
    let tutorialsList = document.getElementById('tutorialsList');
    let tutorials = tutorialsList.getElementsByClassName('tutorial');
    
    for (let i = 0; i < tutorials.length; i++) {
        let title = tutorials[i].getElementsByTagName('h2')[0];
        if (title.innerHTML.toLowerCase().indexOf(input) > -1) { //checks if the headers match the input
            tutorials[i].style.display = "";
        } else {
            tutorials[i].style.display = "none";
        }
    }
}
