document.addEventListener('DOMContentLoaded', () => {
    Dropzone.options.formupload2 = {
    maxFiles: 1,
    accept: function(file, done) {
        console.log(file);
        done();
    },
    init: function() {
        this.on("maxfilesexceeded", function(file){
            alert("No more files please!");
        });
    }
};

});

