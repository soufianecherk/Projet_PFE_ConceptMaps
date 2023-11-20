
// const openModalButtons = document.querySelectorAll('[data-modal-target]')
// const closeModalButtons = document.querySelectorAll('[data-close-button]')
// const overlay = document.getElementById('overlay')

// openModalButtons.forEach(button => {
//   button.addEventListener('click', () => {
//     const modal = document.querySelector(button.dataset.modalTarget)
//     openModal(modal)
//   })
// })

// overlay.addEventListener('click', () => {
//   const modals = document.querySelectorAll('.modal.active')
//   modals.forEach(modal => {
//     closeModal(modal)
//   })
// })

// closeModalButtons.forEach(button => {
//   button.addEventListener('click', () => {
//     const modal = button.closest('.modal')
//     closeModal(modal)
//   })
// })

// function openModal(modal) {
//   if (modal == null) return
//   modal.classList.add('active')
//   overlay.classList.add('active')
// }

// function closeModal(modal) {
//   if (modal == null) return
//   modal.classList.remove('active')
//   overlay.classList.remove('active')
// }
// function init() {

//   // Since 2.2 you can also author concise templates with method chaining instead of GraphObject.make
//   // For details, see https://gojs.net/latest/intro/buildingObjects.html
//   const $ = go.GraphObject.make;  // for conciseness in defining templates

//   myDiagram =
//     $(go.Diagram, "myDiagramDiv",  // must name or refer to the DIV HTML element
//     {
        
//       // have mouse wheel events zoom in and out instead of scroll up and down
//       "toolManager.mouseWheelBehavior": go.ToolManager.WheelZoom,
//       initialAutoScale: go.Diagram.Uniform,
//       "linkingTool.direction": go.LinkingTool.ForwardsOnly,
//       layout: $(go.LayeredDigraphLayout, { isInitial: false, isOngoing: false, layerSpacing: 50 }),
//       "undoManager.isEnabled": true
//     },
//     {
//         initialAutoScale: go.Diagram.Uniform,  // an initial automatic zoom-to-fit
//         contentAlignment: go.Spot.Center,  // align document to the center of the viewport
//         layout:
//           $(go.ForceDirectedLayout,  // automatically spread nodes apart
//             { maxIterations: 200, defaultSpringLength: 30, defaultElectricalCharge: 100 })
//       });

//   // define each Node's appearance
//   myDiagram.nodeTemplate =
//     $(go.Node, "Auto",  // the whole node panel
//       { locationSpot: go.Spot.Center },
//       // define the node's outer shape, which will surround the TextBlock
//       $(go.Shape, "Rectangle",
//         { fill: $(go.Brush, "Linear", { 0: "rgb(254, 201, 0)", 1: "rgb(254, 162, 0)" }), stroke: "black" }),
//       $(go.TextBlock,
//         { font: "bold 10pt helvetica, bold arial, sans-serif", margin: 4 },
//         new go.Binding("text", "text"))
//     );

//   // replace the default Link template in the linkTemplateMap
//   myDiagram.linkTemplate =
//     $(go.Link,  // the whole link panel
//       $(go.Shape,  // the link shape
//         { stroke: "black" }),
//       $(go.Shape,  // the arrowhead
//         { toArrow: "standard", stroke: null }),
//       $(go.Panel, "Auto",
//         $(go.Shape,  // the label background, which becomes transparent around the edges
//           {
//             fill: $(go.Brush, "Radial", { 0: "rgb(240, 240, 240)", 0.3: "rgb(240, 240, 240)", 1: "rgba(240, 240, 240, 0)" }),
//             stroke: null
//           }),
//         $(go.TextBlock,  // the label text
//           {
//             textAlign: "center",
//             font: "10pt helvetica, arial, sans-serif",
//             stroke: "#555555",
//             margin: 4
//           },
//           new go.Binding("text", "text"))
//       )
//     );
function init() {

  // Since 2.2 you can also author concise templates with method chaining instead of GraphObject.make
  // For details, see https://gojs.net/latest/intro/buildingObjects.html
  const $ = go.GraphObject.make;  // for conciseness in defining templates

  var whitegrad = $(go.Brush, "Linear", { 0: "#F0F8FF", 1: "#F5FAFE" });

  var bigfont = "bold 13pt Helvetica, Arial, sans-serif";
  var smallfont = "bold 11pt Helvetica, Arial, sans-serif";


  myDiagram =
    $(go.Diagram, "myDiagramDiv",
      {
        initialAutoScale: go.Diagram.Uniform,  // an initial automatic zoom-to-fit
        contentAlignment: go.Spot.Center,  // align document to the center of the viewport
        layout:
        $(go.ForceDirectedLayout,  // automatically spread nodes apart
        { maxIterations: 200, defaultSpringLength: 30, defaultElectricalCharge: 100 })
      });

      myDiagram.grid.visible = true;
  
  var defaultAdornment =
    $(go.Adornment, "Spot",
      $(go.Panel, "Auto",
        $(go.Shape, { fill: null, stroke: "dodgerblue", strokeWidth: 4 }),
        $(go.Placeholder)),
        );
        
        // define the Node template
        myDiagram.nodeTemplate =
    $(go.Node, "Auto",
      { selectionAdornmentTemplate: defaultAdornment },
      new go.Binding("location", "loc", go.Point.parse).makeTwoWay(go.Point.stringify),
      // define the node's outer shape, which will surround the TextBlock
      $(go.Shape, "Rectangle",
        {
          fill: whitegrad, stroke: "black",
          portId: "",  cursor: "pointer",
          toEndSegmentLength: 50, fromEndSegmentLength: 40
        }),
        $(go.TextBlock, "Concept",
        {
          margin: 6,
          font: bigfont

        },
        new go.Binding("text", "text").makeTwoWay()));



        // clicking the button of a default node inserts a new node to the right of the selected node,
        // and adds a link to that new node
        function addNodeAndLink(e, obj) {
          var modal = document.getElementById("myModal");
          modal.style.display = "block";

    //       var adorn = obj.part;
    // if (adorn === null) return;
    // e.handled = true;
    // var diagram = adorn.diagram;
    // diagram.startTransaction("Add State");
    // // get the node data for which the user clicked the button
    // var fromNode = adorn.adornedPart;
    // var fromData = fromNode.data;
    // // create a new "State" data object, positioned off to the right of the adorned Node
    // var toData = { text: "concept" };
    // var p = fromNode.location;
    // toData.loc = p.x + 200 + " " + p.y;  // the "loc" property is a string, not a Point object
    // // add the new node data to the model
    // var model = diagram.model;
    // model.addNodeData(toData);
    // // create a link data from the old node data to the new node data
    // var linkdata = { text :'omar'};
    // linkdata[model.linkFromKeyProperty] = model.getKeyForNodeData(fromData);
    // linkdata[model.linkToKeyProperty] = model.getKeyForNodeData(toData);
    // // and add the link data to the model
    // model.addLinkData(linkdata);
    // // select the new Node
    // var newnode = diagram.findNodeForData(toData);
    // diagram.select(newnode);
    // diagram.commitTransaction("Add State");
  }

  myDiagram.linkTemplate =
  $(go.Link,  // the whole link panel
      $(go.Shape,  // the link shape
        { stroke: "black" }),
        $(go.Shape,  // the arrowhead
        { toArrow: "standard", stroke: null }),
      $(go.Panel, "Auto",
      $(go.Shape,  // the label background, which becomes transparent around the edges
      {
        fill: $(go.Brush, "Radial", { 0: "rgb(240, 240, 240)", 0.3: "rgb(240, 240, 240)", 1: "rgba(240, 240, 240, 0)" }),
        stroke: null
          }),
          $(go.TextBlock, "lien", // the label text
          {
          // editable: true,
          //   isMultiline: false,
            textAlign: "center",
            font: "10pt helvetica, arial, sans-serif",
            stroke: "#555555",
            margin: 4
          },
          new go.Binding("text", "text").makeTwoWay())));
          
    //       myDiagram.linkTemplateMap.add("Comment",
    // $(go.Link, { selectable: false },
    //   $(go.Shape, { strokeWidth: 2, stroke: "darkgreen" })));
      
      
      var palette =
      $(go.Palette, "myPaletteDiv",  // create a new Palette in the HTML DIV element
      {
        // share the template map with the Palette
        nodeTemplateMap: myDiagram.nodeTemplateMap,
        autoScale: go.Diagram.Uniform  // everything always fits in viewport
      });
      
      palette.model.nodeDataArray = [
        {}, // default node
      ];


      // read in the JSON-format data from the "mySavedModel" element
  load();
  layout();
}

function layout() {
  myDiagram.layoutDiagram(true);
}

function Nodes(newText){
  let toData = { text : newText };
  let model = myDiagram.model;
  model.addNodeData(toData);
}
// Show the diagram's model in JSON format
function save() {
  //writes the json file in the text area "mySavedModel"
  document.getElementById("mySavedModel").value = myDiagram.model.toJson();
  document.getElementById("update_map_json").value = myDiagram.model.toJson();

  myDiagram.isModified = false;
  //saves the changes in the local storage
  localStorage.setItem('myObj', JSON.stringify(document.getElementById("mySavedModel").value));
  localStorage.setItem('myObj', JSON.stringify(document.getElementById("update_map_json").value));
}

//telecharger le fichier sous format json
function download(content, fileName, contentType) {
const a = document.createElement("a");
const file = new Blob([content], { type: contentType });
a.href = URL.createObjectURL(file);
a.download = fileName;
a.click();
}

function onDownload(){

//  download(JSON.stringify(myDiagram.model.toJson()), "title.json", "text/plain");
saveFile()
}
async function saveFile() {
// create a new handle
const newHandle = await window.showSaveFilePicker();
// create a FileSystemWritableFileStream to write to
const writableStream = await newHandle.createWritable();
imgBlob = JSON.stringify(myDiagram.model.toJson());
// write our file
await writableStream.write(imgBlob);
// close the file and write the contents to disk.
await writableStream.close();
}
window.addEventListener('DOMContentLoaded', init);

function load() {
  // myDiagram.model = go.Model.fromJson(JSON.parse(fr.onload));
  
  
  //using local storage
  myDiagram.model = go.Model.fromJson(localStorage.getItem('myObj'));
//from the json table
myDiagram.model = go.Model.fromJson(document.getElementById("mySavedModel").value);
myDiagram.model = go.Model.fromJson(document.getElementById("update_map_json").value);
}
localStorage.setItem('myObj', document.getElementById("mySavedModel").value);