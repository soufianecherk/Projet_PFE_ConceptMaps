
function save() {
    //writes the json file in the text area "mysavedmodel"
    document.getElementById("form_map_json").value = myDiagram.model.toJson();
    myDiagram.isModified = false;
    document.getElementById("SubmitButton").click();
    //saves the changes in the local storage
    localStorage.setItem('myObj', JSON.stringify(myDiagram.model.toJson()));
  }
