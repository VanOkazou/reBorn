
document.addEventListener('DOMContentLoaded', () => {

    // Dropzone
    Dropzone.options.formGalleryProject = {
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

    const aboutTextarea = document.querySelector('textarea.about');
    if(document.body.contains(aboutTextarea))
        CKEDITOR.replace( 'about', optionsCkEditor );

    const descriptionTextarea = document.querySelector('textarea.description');
    if(document.body.contains(descriptionTextarea))
        CKEDITOR.replace( 'description', optionsCkEditor );


    // Input type file and preview
    let readURL = (inputId, previewId) => {

        let input = document.getElementById(inputId);
        let preview = document.getElementById(previewId);

        if (input.files && input.files[0]) {

            let reader = new FileReader();

            reader.onload = function (e) {
                preview.style.backgroundImage = "url("+ e.target.result + ")";
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    let inputAvatar = document.getElementById("avatar");
    if(document.body.contains(inputAvatar))
        inputAvatar.addEventListener('change', () => {
            readURL("avatar", "previewAvatar");
        });

    let inputBgimg = document.getElementById("bgimg");
    if(document.body.contains(inputBgimg))
        inputBgimg.addEventListener('change', () => {
            readURL("bgimg", "previewBgImg");
        });

    let inputUne = document.getElementById("une");
    if(document.body.contains(inputUne))
        inputUne.addEventListener('change', () => {
            readURL("une", "previewUne");
    });

    // EVENTS
    // Delete projects
    [].forEach.call(document.querySelectorAll('.delete-project'), btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();

            e = e || window.event;
            let src = e.target || e.srcElement;

            while("undefined" === src.getAttribute('data-id') || !(src.getAttribute('data-id'))) {
                src = src.parentElement;
            }

            let idproject = src.getAttribute('data-id');
            let token = src.getAttribute('data-token');

            var httpRequest = new XMLHttpRequest()
            httpRequest.onreadystatechange = function (data) {
                document.getElementById('project-'+idproject).style.display = 'none';
            }
            httpRequest.open('DELETE', 'projects/'+idproject )
            httpRequest.send()

        });
    });

    // Delete attachment
    [].forEach.call(document.querySelectorAll('.delete-attachment'), btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();

            e = e || window.event;
            let src = e.target || e.srcElement;

            while("undefined" === src.getAttribute('data-id') || !(src.getAttribute('data-id'))) {
                src = src.parentElement;
            }

            let id = src.getAttribute('data-id');
            let token = src.getAttribute('data-token');
            let url = src.getAttribute('data-url');

            var httpRequest = new XMLHttpRequest()
            httpRequest.onreadystatechange = function (data) {
                document.getElementById('attach-'+id).style.display = 'none';
            }
            httpRequest.open('POST', url )
            httpRequest.send()

        });
    });

    // PAGE TECHNOS
    // Click on preview
    const previewsIconTechno = document.querySelectorAll('.previewTechno');
    if(previewsIconTechno) {
        [].forEach.call(previewsIconTechno, elt => {
            elt.addEventListener('click', () => {
                let input = elt.dataset.input
                document.getElementById(input).click()
            })
        })
    }

    // Change image
    const inputsIconTechno = document.querySelectorAll('.inputIconTechno')
    if(inputsIconTechno) {
        [].forEach.call(inputsIconTechno, elt => {
            elt.addEventListener('change', () => {
                let reader = new FileReader();
                let techno = elt.id
                let previewId = 'preview-' + techno

                reader.onload = function (e) {
                    document.getElementById(previewId).setAttribute('src', e.target.result)
                }

                reader.readAsDataURL(elt.files[0]);
            })
        })
    }

    // Delete technos
    [].forEach.call(document.querySelectorAll('.delete-techno'), btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();

            e = e || window.event;
            let src = e.target || e.srcElement;

            while("undefined" === src.getAttribute('data-id') || !(src.getAttribute('data-id'))) {
                src = src.parentElement;
            }

            let idtechno = src.getAttribute('data-id');
            let token = src.getAttribute('data-token');

            var httpRequest = new XMLHttpRequest();
            httpRequest.onreadystatechange = function (data) {
                document.getElementById('form-techno-'+idtechno).style.display = 'none';
            }
            httpRequest.open('DELETE', 'technos/' + idtechno );
            httpRequest.send();
        });
    });

    // Add techno User
    let btnAddUserTechno = document.getElementById('btnAddUserTechno');
    if(document.body.contains(btnAddUserTechno)) {
        btnAddUserTechno.addEventListener('click', e => {
            e.preventDefault();

            e = e || window.event;
            let src = e.target || e.srcElement;

            let errormsg = document.getElementById('error-add-techno');
            let listUserTechnos = document.getElementById('list-technos-user');
            let inputTechno = document.getElementById('inputTechno');
            let idTechno = inputTechno.value;
            let labelTechno = inputTechno.options[inputTechno.selectedIndex].innerHTML;
            let versionTechno = document.getElementById('inputVersion').value;
            let percentTechno = document.getElementById('inputPercent').value;

            let httpRequest = new XMLHttpRequest()
            httpRequest.onreadystatechange = function (data) {
                if (data.target.readyState === 4) {
                    if (data.target.status === 200) {
                        let li = document.createElement("li");
                        li.setAttribute("class", "row");
                        li.setAttribute("id", "techno-"+idTechno);

                        let html = `<div class="col-xs-3">
                                        Techno : <input type="text" disabled value="${labelTechno}" />
                                    </div>
                                    <div class="col-xs-3">
                                        Version : <input type="text" disabled value="${versionTechno}" />
                                    </div>
                                    <div class="col-xs-3">
                                        <input type="text" disabled value="${percentTechno}" /> %
                                    </div>
                                    <div class="col-xs-3 text-right">
                                        Refresh
                                    </div>`;

                        li.innerHTML = html;
                        listUserTechnos.appendChild(li);

                        document.getElementById('no-techno').style.display = 'none';

                    } else {
                        errormsg.innerHTML = 'Error, check fields please !'
                    }
                }
            }
            httpRequest.open('POST', '/iamanevangelist/techno-user/add/'+idTechno+'/'+versionTechno+'/'+percentTechno)
            httpRequest.send()
        });
    }


    // Delete techno User
    [].forEach.call(document.querySelectorAll('.delete-techno-user'), btn => {
        btn.addEventListener('click', e => {
        e.preventDefault();

        e = e || window.event;
        let src = e.target || e.srcElement;

        while("undefined" === src.getAttribute('data-id-techno') || !(src.getAttribute('data-id-techno'))) {
            src = src.parentElement;
        }

        let idtechno = src.getAttribute('data-id-techno');
        let token = src.getAttribute('data-token');

        let httpRequest = new XMLHttpRequest()
        httpRequest.onreadystatechange = function (data) {
            document.getElementById('techno-'+idtechno).style.display = 'none';
        }
        httpRequest.open('POST', '/iamanevangelist/techno-user/delete/' + idtechno )
        httpRequest.send()

        })
    })
});
