
document.addEventListener('DOMContentLoaded', () => {

    // Dropzone
    Dropzone.options.formupload2 = {
        maxFiles: 1,
        accept: function(file, done) {
            done();
        },
        init: function() {
            this.on("maxfilesexceeded", function(file){
                alert("No more files please!");
            });
        }
    };

    // Wysiwyg
    let optionsCkEditor = {
        language : 'fr',
    }
    CKEDITOR.replace( 'about', optionsCkEditor );
    CKEDITOR.replace( 'description', optionsCkEditor );


    // Input type file and preview
    let readURL = (inputId, previewId) => {

        let input = document.getElementById(inputId);
        let preview = document.getElementById(previewId);

        if (input.files && input.files[0]) {

            let reader = new FileReader();

            reader.onload = function (e) {
                console.log(preview);
                preview.style.backgroundImage = "url("+ e.target.result + ")";
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    let inputAvatar = document.getElementById("avatar");
    inputAvatar.addEventListener('change', () => {
        readURL("avatar", "previewAvatar");
    });




});
