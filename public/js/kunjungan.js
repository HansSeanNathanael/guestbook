const canvas = document.querySelector("canvas");

const signaturePad = new SignaturePad(canvas);

const inputTandaTangan = document.getElementById("input-tanda-tangan-hidden");

(function () {
    'use strict'
  
    var forms = document.querySelectorAll('.needs-validation')
  
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
  
                form.classList.add('was-validated')
            }, false)
        })
})()

function tandaTanganUndo() {
    let data = signaturePad.toData();
    if (data) {
        data.pop();
        signaturePad.fromData(data);
    }
    if (data.length == 0) {
        inputTandaTangan.value = null;
    }
}

function tandaTanganReset() {
    signaturePad.clear();
    inputTandaTangan.value = null;
}

signaturePad.addEventListener("afterUpdateStroke", () => {
    inputTandaTangan.value = signaturePad.toDataURL("image/png");
});

// signaturePad.toDataURL(); // save image as PNG
// signaturePad.toDataURL("image/jpeg"); // save image as JPEG
// signaturePad.toDataURL("image/jpeg", 0.5); // save image as JPEG with 0.5 image quality
// signaturePad.toDataURL("image/svg+xml"); // save image as SVG data url

// // Return svg string without converting to base64
// signaturePad.toSVG(); // "<svg...</svg>"
// signaturePad.toSVG({includeBackgroundColor: true}); // add background color to svg output

// // Draws signature image from data URL (mostly uses https://mdn.io/drawImage under-the-hood)
// // NOTE: This method does not populate internal data structure that represents drawn signature. Thus, after using #fromDataURL, #toData won't work properly.
// signaturePad.fromDataURL("data:image/png;base64,iVBORw0K...");