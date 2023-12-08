// profile image drag and drop
const dropArea = document.querySelector(".form-drag-area");
let dropText = document.querySelector(".description");
const browseButton = document.querySelector(".form-upload");
let inputPath = document.querySelector("#profile_image");

let file; //this is a global variable and we'll use it inside multiple functions



//browse options and upload options
browseButton.onClick = () => {
      inputPath.click(); //if user click on the button then the input also clicked
};

//if user leave the drag area
inputPath.addEventListener("change", function () {
      file = this.files[0];
      showImage(); //calling function
});

//if user drag over the dropArea
dropArea.addEventListener("dragover", (event) => {
      event.preventDefault(); //preventing from default behaviour
      dropArea.classList.add("active");
      dropText.textContent = "Release to Upload File";
});

//if user leave dragged File from dropArea
dropArea.addEventListener("dragleave", () => {
      dropArea.classList.remove("active");
      dropText.textContent = "Drag & Drop to Upload File";
});

//if user drop File on dropArea
dropArea.addEventListener("drop", (event) => {
      event.preventDefault(); //preventing from default behaviour
      file = event.dataTransfer.files[0];
      let list = new DataTransfer();
      list.items.add(file);
      inputPath.files = list.files;

      showImage(); //calling function
      dropArea.classList.remove("active");
});

function showImage() {
      let fileType = file.type;

      let validExtensions = ["image/jpeg", "image/jpg", "image/png"];

      if(validExtensions.includes(fileType)){
            let fileReader = new FileReader(); //creating new FileReader object

            fileReader.onload = () => {
                  let fileURL = fileReader.result; //passing user file source in fileURL variable

                  document.querySelector("#profile_image_placeholder").setAttribute("src", fileURL); //adding that file source in src attribute of img tag
            }
            fileReader.readAsDataURL(file);

            let validate = document.querySelector(".profile-image-validation");
      }
      else{
            alert("This is not an Image File!");
            dropArea.classList.remove("active");
            dropText.textContent = "Drag & Drop to Upload File";
      }
}